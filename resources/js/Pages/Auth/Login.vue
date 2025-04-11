<template>
  <div class="login-container">
    <div class="card">
      <div class="card-header">
        <h2>Login to Your Account</h2>
      </div>
      <div class="card-body">
        <div v-if="error" class="alert alert-danger">
          {{ error }}
        </div>
        <form @submit.prevent="login">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input
              type="email"
              id="email"
              v-model="form.email"
              class="form-control"
              required
              placeholder="Enter your email"
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              v-model="form.password"
              class="form-control"
              required
              placeholder="Enter your password"
            />
          </div>
          <div class="form-group form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="remember"
              v-model="form.remember"
            />
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary btn-block" :disabled="loading">
            <span v-if="loading">
              <i class="fas fa-spinner fa-spin"></i> Logging in...
            </span>
            <span v-else>Login</span>
          </button>
        </form>
        <div class="mt-3 text-center">
          <router-link to="/forgot-password">Forgot Password?</router-link>
        </div>
        <div class="mt-3 text-center">
          Don't have an account? <router-link to="/register">Register</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
        remember: false,
      },
      loading: false,
      error: null,
    };
  },
  methods: {
    async login() {
      this.loading = true;
      this.error = null;

      try {
        // Call API endpoint for login
        const response = await axios.post("/api/login", this.form);

        // Store token in localStorage
        localStorage.setItem("token", response.data.access_token);

        // Set axios default header for future requests
        axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${response.data.access_token}`;

        // Store user in Vuex store
        this.$store.commit("setUser", response.data.user);

        // Redirect to dashboard
        this.$router.push("/dashboard");
      } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
          this.error = error.response.data.message;
        } else {
          this.error = "An error occurred during login. Please try again.";
        }
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
  padding: 20px;
}

.card {
  width: 100%;
  max-width: 400px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #f8f9fa;
  padding: 20px;
  text-align: center;
}

.card-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.btn-block {
  width: 100%;
  margin-top: 10px;
}
</style>
