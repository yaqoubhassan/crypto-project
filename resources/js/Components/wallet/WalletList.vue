<template>
  <div class="wallet-list-container">
    <h2>My Wallets</h2>

    <div v-if="loading" class="text-center my-5">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div v-else-if="error" class="alert alert-danger">
      {{ error }}
    </div>

    <div v-else>
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create New Wallet</h5>
              <form @submit.prevent="createWallet">
                <div class="form-group">
                  <label for="currency">Select Currency</label>
                  <select
                    id="currency"
                    v-model="newWallet.currency_id"
                    class="form-control"
                    required
                  >
                    <option value="" disabled>Select a currency</option>
                    <option
                      v-for="currency in availableCurrencies"
                      :key="currency.id"
                      :value="currency.id"
                    >
                      {{ currency.name }} ({{ currency.symbol }})
                    </option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" :disabled="creatingWallet">
                  <span v-if="creatingWallet">
                    <i class="fas fa-spinner fa-spin"></i> Creating...
                  </span>
                  <span v-else>Create Wallet</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div v-if="wallets.length === 0" class="alert alert-info">
        You don't have any wallets yet. Create one to get started.
      </div>

      <div v-else class="row">
        <div v-for="wallet in wallets" :key="wallet.id" class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <img
                  v-if="wallet.currency.logo"
                  :src="wallet.currency.logo"
                  :alt="wallet.currency.symbol"
                  class="currency-logo mr-2"
                />
                <span>{{ wallet.currency.name }} ({{ wallet.currency.symbol }})</span>
              </div>
              <span
                class="badge"
                :class="
                  wallet.currency.type === 'crypto' ? 'badge-primary' : 'badge-success'
                "
              >
                {{ wallet.currency.type }}
              </span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Balance</h5>
              <p class="card-text balance">
                {{ formatBalance(wallet.balance, wallet.currency.decimal_places) }}
                {{ wallet.currency.symbol }}
              </p>

              <div class="wallet-actions">
                <router-link
                  :to="{ name: 'wallet-detail', params: { id: wallet.id } }"
                  class="btn btn-outline-primary btn-sm mr-2"
                >
                  View Details
                </router-link>
                <router-link
                  v-if="wallet.currency.type === 'crypto'"
                  :to="{ name: 'deposit', params: { id: wallet.id } }"
                  class="btn btn-outline-success btn-sm mr-2"
                >
                  Deposit
                </router-link>
                <router-link
                  :to="{ name: 'withdraw', params: { id: wallet.id } }"
                  class="btn btn-outline-warning btn-sm"
                >
                  Withdraw
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WalletList",
  data() {
    return {
      wallets: [],
      availableCurrencies: [],
      newWallet: {
        currency_id: "",
      },
      loading: true,
      creatingWallet: false,
      error: null,
    };
  },
  async created() {
    try {
      await this.fetchWallets();
      await this.fetchAvailableCurrencies();
    } catch (error) {
      console.error("Error initializing wallet list:", error);
    } finally {
      this.loading = false;
    }
  },
  methods: {
    async fetchWallets() {
      try {
        const response = await axios.get("/api/wallets");
        this.wallets = response.data;
      } catch (error) {
        this.handleError(error, "Failed to load wallets");
      }
    },

    async fetchAvailableCurrencies() {
      try {
        const response = await axios.get("/api/currencies");

        // Filter out currencies that user already has wallets for
        const existingCurrencyIds = this.wallets.map((wallet) => wallet.currency_id);
        this.availableCurrencies = response.data.filter(
          (currency) => !existingCurrencyIds.includes(currency.id) && currency.is_active
        );
      } catch (error) {
        this.handleError(error, "Failed to load available currencies");
      }
    },

    async createWallet() {
      if (!this.newWallet.currency_id) return;

      this.creatingWallet = true;

      try {
        const response = await axios.post("/api/wallets", this.newWallet);

        // Add the new wallet to the list
        this.wallets.push(response.data.wallet);

        // Reset form
        this.newWallet.currency_id = "";

        // Update available currencies
        await this.fetchAvailableCurrencies();

        // Show success message
        this.$toast.success("Wallet created successfully");
      } catch (error) {
        this.handleError(error, "Failed to create wallet");
      } finally {
        this.creatingWallet = false;
      }
    },

    formatBalance(balance, decimalPlaces) {
      return parseFloat(balance).toFixed(decimalPlaces);
    },

    handleError(error, defaultMessage) {
      if (error.response && error.response.data && error.response.data.message) {
        this.error = error.response.data.message;
      } else {
        this.error = defaultMessage;
      }
      console.error(this.error, error);
    },
  },
};
</script>

<style scoped>
.wallet-list-container {
  padding: 20px;
}

.currency-logo {
  width: 24px;
  height: 24px;
  object-fit: contain;
}

.balance {
  font-size: 1.5rem;
  font-weight: bold;
}

.wallet-actions {
  margin-top: 20px;
}
</style>
