import { createStore } from "vuex";
import axios from "axios";

export default createStore({
    state: {
        user: null,
        isAuthenticated: false,
        loading: false,
        error: null,
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
            state.isAuthenticated = !!user;
        },
        setLoading(state, loading) {
            state.loading = loading;
        },
        setError(state, error) {
            state.error = error;
        },
        clearError(state) {
            state.error = null;
        },
    },
    actions: {
        async fetchUser({ commit }) {
            commit("setLoading", true);
            try {
                const token = localStorage.getItem("token");
                if (!token) {
                    commit("setUser", null);
                    return;
                }

                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${token}`;
                const response = await axios.get("/api/user");
                commit("setUser", response.data);
            } catch (error) {
                commit("setUser", null);
                localStorage.removeItem("token");
                commit("setError", "Session expired. Please login again.");
            } finally {
                commit("setLoading", false);
            }
        },
        async login({ commit }, credentials) {
            commit("setLoading", true);
            commit("clearError");
            try {
                const response = await axios.post("/api/login", credentials);
                localStorage.setItem("token", response.data.access_token);
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${response.data.access_token}`;
                commit("setUser", response.data.user);
                return response;
            } catch (error) {
                let errorMessage = "Login failed. Please try again.";
                if (
                    error.response &&
                    error.response.data &&
                    error.response.data.message
                ) {
                    errorMessage = error.response.data.message;
                }
                commit("setError", errorMessage);
                throw error;
            } finally {
                commit("setLoading", false);
            }
        },
        async register({ commit }, userData) {
            commit("setLoading", true);
            commit("clearError");
            try {
                const response = await axios.post("/api/register", userData);
                localStorage.setItem("token", response.data.access_token);
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${response.data.access_token}`;
                commit("setUser", response.data.user);
                return response;
            } catch (error) {
                let errorMessage = "Registration failed. Please try again.";
                if (
                    error.response &&
                    error.response.data &&
                    error.response.data.errors
                ) {
                    const errors = error.response.data.errors;
                    errorMessage = Object.values(errors)[0][0];
                }
                commit("setError", errorMessage);
                throw error;
            } finally {
                commit("setLoading", false);
            }
        },
        logout({ commit }) {
            return new Promise((resolve) => {
                localStorage.removeItem("token");
                delete axios.defaults.headers.common["Authorization"];
                commit("setUser", null);
                resolve();
            });
        },
    },
    getters: {
        isAuthenticated: (state) => state.isAuthenticated,
        user: (state) => state.user,
        loading: (state) => state.loading,
        error: (state) => state.error,
    },
});
