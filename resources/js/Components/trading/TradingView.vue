<template>
  <div class="trading-view-container">
    <div class="row">
      <div class="col-md-9">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3>{{ selectedPair.baseCurrency.symbol }}/{{ selectedPair.quoteCurrency.symbol }}</h3>
            <div class="trading-pair-selector">
              <select v-model="selectedPairId" class="form-control" @change="changeTradingPair">
                <option v-for="pair in tradingPairs" :key="pair.id" :value="pair.id">
                  {{ pair.baseCurrency.symbol }}/{{ pair.quoteCurrency.symbol }}
                </option>
              </select>
            </div>
          </div>
          <div class="card-body">
            <div class="price-chart" style="height: 400px;">
              <!-- Price chart will be rendered here -->
              <div v-if="loading" class="text-center my-5">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading chart...</span>
                </div>
              </div>
              <div v-else-if="error" class="alert alert-danger">
                {{ error }}
              </div>
              <div v-else id="price-chart-container" style="width: 100%; height: 100%;"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Place Order</h4>
              </div>
              <div class="card-body">
                <div class="order-type-tabs">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" :class="{ active: orderForm.type === 'market' }" @click="orderForm.type = 'market'">Market</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" :class="{ active: orderForm.type === 'limit' }" @click="orderForm.type = 'limit'">Limit</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" :class="{ active: orderForm.type === 'stop' }" @click="orderForm.type = 'stop'">Stop</a>
                    </li>
                  </ul>
                </div>

                <div class="order-side-selector mt-3 mb-3">
                  <div class="btn-group w-100">
                    <button
                      type="button"
                      class="btn"
                      :class="orderForm.side === 'buy' ? 'btn-success' : 'btn-outline-success'"
                      @click="orderForm.side = 'buy'"
                    >
                      Buy
                    </button>
                    <button
                      type="button"
                      class="btn"
                      :class="orderForm.side === 'sell' ? 'btn-danger' : 'btn-outline-danger'"
                      @click="orderForm.side = 'sell'"
                    >
                      Sell
                    </button>
                  </div>
                </div>

                <form @submit.prevent="placeOrder">
                  <div class="form-group">
                    <label>Amount ({{ selectedPair.baseCurrency.symbol }})</label>
                    <input
                      type="number"
                      v-model="orderForm.amount"
                      class="form-control"
                      :min="selectedPair.min_order_size"
                      :max="selectedPair.max_order_size || null"
                      step="0.00000001"
                      required
                    >
                    <small class="form-text text-muted">
                      Min: {{ selectedPair.min_order_size }} {{ selectedPair.baseCurrency.symbol }}
                      <span v-if="selectedPair.max_order_size">
                        | Max: {{ selectedPair.max_order_size }} {{ selectedPair.baseCurrency.symbol }}
                      </span>
                    </small>
                  </div>

                  <div v-if="orderForm.type === 'limit' || orderForm.type === 'stop'" class="form-group">
                    <label>Price ({{ selectedPair.quoteCurrency.symbol }})</label>
                    <input
                      type="number"
                      v-model="orderForm.price"
                      class="form-control"
                      step="0.00000001"
                      required
                    >
                  </div>

                  <div v-if="orderForm.type === 'stop'" class="form-group">
                    <label>Stop Price ({{ selectedPair.quoteCurrency.symbol }})</label>
                    <input
                      type="number"
                      v-model="orderForm.stop_price"
                      class="form-control"
                      step="0.00000001"
                      required
                    >
                  </div>

                  <div class="form-group">
                    <label>Total ({{ selectedPair.quoteCurrency.symbol }})</label>
                    <input
                      type="number"
                      :value="calculateTotal"
                      class="form-control"
                      readonly
                    >
                  </div>

                  <button
                    type="submit"
                    class="btn btn-block"
                    :class="orderForm.side === 'buy' ? 'btn-success' : 'btn-danger'"
                    :disabled="placingOrder"
                  >
                    <span v-if="placingOrder">
                      <i class="fas fa-spinner fa-spin"></i> Processing...
                    </span>
                    <span v-else>
                      {{ orderForm.side === 'buy' ? 'Buy' : 'Sell' }} {{ selectedPair.baseCurrency.symbol }}
                    </span>
                  </button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Order Book</h4>
              </div>
              <div class="card-body p-0">
                <div v-if="loadingOrderBook" class="text-center my-5">
                  <div class="spinner-border" role="status">
                    <span class="sr-only">Loading order book...</span>
                  </div>
                </div>
                <div v-else-if="orderBookError" class="alert alert-danger m-3">
                  {{ orderBookError }}
                </div>
                <div v-else>
                  <div class="order-book">
                    <div class="order-book-header d-flex">
                      <div class="col-4">Price</div>
                      <div class="col-4">Amount</div>
                      <div class="col-4">Total</div>
                    </div>

                    <div class="asks">
                      <div v-for="(ask, index) in orderBook.asks" :key="'ask-'+index" class="order-row d-flex text-danger">
                        <div class="col-4">{{ formatPrice(ask.price) }}</div>
                        <div class="col-4">{{ formatAmount(ask.amount) }}</div>
                        <div class="col-4">{{ formatTotal(ask.price * ask.amount) }}</div>
                      </div>
                    </div>

                    <div class="current-price py-2 text-center">
                      <span class="h5">{{ formatPrice(currentPrice) }} {{ selectedPair.quoteCurrency.symbol }}</span>
                    </div>

                    <div class="bids">
                      <div v-for="(bid, index) in orderBook.bids" :key="'bid-'+index" class="order-row d-flex text-success">
                        <div class="col-4">{{ formatPrice(bid.price) }}</div>
                        <div class="col-4">{{ formatAmount(bid.amount) }}</div>
                        <div class="col-4">{{ formatTotal(bid.price * bid.amount) }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-header">
            <h4>Active Orders</h4>
          </div>
          <div class="card-body p-0">
            <div v-if="loadingActiveOrders" class="text-center my-5">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading orders...</span>
              </div>
            </div>
            <div v-else-if="activeOrdersError" class="alert alert-danger m-3">
              {{ activeOrdersError }}
            </div>
            <div v-else-if="activeOrders.length === 0" class="text-center py-4">
              No active orders
            </div>
            <div v-else class="active-orders-list">
              <div v-for="order in activeOrders" :key="order.id" class="order-item p-3 border-bottom">
                <div class="d-flex justify-content-between">
                  <span :class="order.side === 'buy' ? 'text-success' : 'text-danger'">
                    {{ order.side.toUpperCase() }}
                  </span>
                  <span class="badge" :class="getOrderTypeBadgeClass(order.type)">
                    {{ order.type }}
                  </span>
                </div>
                <div class="mt-2">
                  <small>
                    {{ order.amount }} {{ order.tradingPair.baseCurrency.symbol }}
                    @ {{ order.price }} {{ order.tradingPair.quoteCurrency.symbol }}
                  </small>
                </div>
                <div class="mt-2 d-flex justify-content-between align-items-center">
                  <small class="text-muted">{{ formatDate(order.created_at) }}</small>
                  <button
                    class="btn btn-sm btn-outline-danger"
                    @click="cancelOrder(order.id)"
                    :disabled="cancellingOrder === order.id"
                  >
                    <span v-if="cancellingOrder === order.id">
                      <i class="fas fa-spinner fa-spin"></i>
                    </span>
                    <span v-else>Cancel</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <router-link to="/orders" class="btn btn-link">View All Orders</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TradingView',
  data() {
    return {
      tradingPairs: [],
      selectedPairId: null,
      selectedPair: {
        baseCurrency: { symbol: '' },
        quoteCurrency: { symbol: '' },
        min_order_size: 0,
        max_order_size: null
      },
      orderForm: {
        type: 'market',
        side: 'buy',
        amount: '',
        price: '',
        stop_price: ''
      },
      currentPrice: 0,
      orderBook: {
        asks: [],
        bids: []
      },
      activeOrders: [],
      loading: true,
      error: null,
      loadingOrderBook: true,
      orderBookError: null,
      loadingActiveOrders: true,
      activeOrdersError: null,
      placingOrder: false,
      cancellingOrder: null
    }
  },
  computed: {
    calculateTotal() {
      if (!this.orderForm.amount) return 0;

      if (this.orderForm.type === 'market') {
        return this.orderForm.amount * this.currentPrice;
      } else {
        return this.orderForm.amount * (this.orderForm.price || 0);
      }
    }
  },
  async created() {
    try {
      await this.fetchTradingPairs();

      // Set default trading pair
      if (this.tradingPairs.length > 0) {
        this.selectedPairId = this.tradingPairs[0].id;
        this.selectedPair = this.tradingPairs[0];

        await Promise.all([
          this.fetchOrderBook(),
          this.fetchActiveOrders()
        ]);

        // Initialize price chart
        this.initPriceChart();
      }
    } catch (error) {
      console.error('Error initializing trading view:', error);
    } finally {
      this.loading = false;
    }
  },
  methods: {
    async fetchTradingPairs() {
      try {
        const response = await axios.get('/api/trading/pairs');
        this.tradingPairs = response.data;
      } catch (error) {
        this.handleError(error, 'Failed to load trading pairs');
      }
    },

    async fetchOrderBook() {
      this.loadingOrderBook = true;
      this.orderBookError = null;

      try {
        const response = await axios.get(`/api/trading/order-book/${this.selectedPairId}`);
        this.orderBook = {
          asks: response.data.asks,
          bids: response.data.bids
        };

        // Set current price as the lowest ask price or highest bid price
        if (this.orderBook.asks.length > 0) {
          this.currentPrice = this.orderBook.asks[0].price;
        } else if (this.orderBook.bids.length > 0) {
          this.currentPrice = this.orderBook.bids[0].price;
        }
      } catch (error) {
        this.handleError(error, 'Failed to load order book', 'orderBookError');
      } finally {
        this.loadingOrderBook = false;
      }
    },

    async fetchActiveOrders() {
      this.loadingActiveOrders = true;
      this.activeOrdersError = null;

      try {
        const response = await axios.get('/api/trading/orders/active');
        this.activeOrders = response.data.data;
      } catch (error) {
        this.handleError(error, 'Failed to load active orders', 'activeOrdersError');
      } finally {
        this.loadingActiveOrders = false;
      }
    },

    async changeTradingPair() {
      this.loading = true;
      this.error = null;

      try {
        // Find selected pair
        this.selectedPair = this.tradingPairs.find(pair => pair.id === this.selectedPairId);

        await Promise.all([
          this.fetchOrderBook(),
          this.fetchActiveOrders()
        ]);

        // Update price chart
        this.updatePriceChart();
      } catch (error) {
        this.handleError(error, 'Failed to change trading pair');
      } finally {
        this.loading = false;
      }
    },

    initPriceChart() {
      // This would use a charting library like TradingView or Chart.js
      // For now, we'll just simulate it
      console.log('Initializing price chart for', this.selectedPair.baseCurrency.symbol + '/' + this.selectedPair.quoteCurrency.symbol);
    },

    updatePriceChart() {
      // This would update the chart with new data
      console.log('Updating price chart for', this.selectedPair.baseCurrency.symbol + '/' + this.selectedPair.quoteCurrency.symbol);
    },

    async placeOrder() {
      this.placingOrder = true;

      try {
        const orderData = {
          trading_pair_id: this.selectedPairId,
          type: this.orderForm.type,
          side: this.orderForm.side,
          amount: this.orderForm.amount
        };

        if (this.orderForm.type === 'limit' || this.orderForm.type === 'stop') {
          orderData.price = this.orderForm.price;
        }

        if (this.orderForm.type === 'stop') {
          orderData.stop_price = this.orderForm.stop_price;
        }

        const response = await axios.post('/api/trading/orders', orderData);

        // Show success message
        this.$toast.success('Order placed successfully');

        // Reset form
        this.orderForm.amount = '';
        this.orderForm.price = '';
        this.orderForm
(Content truncated due to size limit. Use line ranges to read in chunks)
