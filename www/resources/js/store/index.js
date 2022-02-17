import {createStore} from 'vuex';
import axios from 'axios';

const BACKEND_URL = `http://${self.location.hostname}`;
const API_URL = `${BACKEND_URL}/api/v1/`;

const errorAlert = (error) => {
    alert(error);
    console.error(error);
}

export default createStore({
    state: {
        clients: []
    },
    getters: {
        getClients: state => {
            return state.clients;
        }
    },
    mutations: {
        FETCH_CLIENTS(state, clients) {
            state.clients = clients;
        },
        DELETE_CLIENT(state, {id}) {
            let removeIndex = state.clients.map(client => client.id).indexOf(id);
            state.clients.splice(removeIndex, 1);
        },
    },
    actions: {
        async fetchClients({commit}) {
            await axios.get(`${API_URL}clients/`).then(
                (response) => commit("FETCH_CLIENTS", response.data.data),
                (error) => errorAlert(error)
            );
        },
        async deleteClient({commit}, {id}) {
            await axios.delete(`${API_URL}clients/${id}/del`).then(
                (response) => {
                    if (response.data.success) {
                        commit("DELETE_CLIENT", {id});
                    } else {
                        errorAlert(response.data.message);
                    }
                },
                (error) => errorAlert(error)
            );
        },
        async updateClient({commit}, client) {
            await axios.patch(
                `${API_URL}clients/${client.id}/update`,
                client
            ).then(
                (response) => {
                    if (response.data.success) {
                        console.log(`Updated`)
                    } else {
                        errorAlert(response.data.message);
                    }
                },
                (error) => errorAlert(error)
            );
        },
        async addClient({commit}, client) {
            await axios.put(
                `${API_URL}clients/add`,
                client
            ).then(
                (response) => {
                    if (response.data.success) {
                        alert('success!');
                        this.dispatch("fetchClients");
                    } else {
                        errorAlert(response.data.message);
                    }
                },
                (error) => errorAlert(error)
            );
        },
    },
    modules: {}
})
