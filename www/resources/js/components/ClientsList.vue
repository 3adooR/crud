<template>
    <button type="submit" v-if="!showAddForm" v-on:click="displayAddForm()">Add new client</button>
    <button type="submit" v-else v-on:click="displayAddForm()">Show clients list</button>
    <AddClient v-if="showAddForm"/>
    <div v-else v-for="client in clients" v-bind:key="client.id" class="client">
        <div>
            <font-awesome-icon icon="user"/>
            <input type="text" v-model="client.name" placeholder="Name">

            <font-awesome-icon icon="envelope-square"/>
            <input type="email" v-model="client.email" placeholder="E-mail">

            <font-awesome-icon icon="phone"/>
            <input type="text" v-model="client.phone" placeholder="Phone">
        </div>
        <div class="actions">
            <font-awesome-icon icon="edit" v-on:click="updateClient(client.id)"/>
            <font-awesome-icon icon="trash" v-on:click="deleteClient(client.id)"/>
        </div>
    </div>
</template>

<script>
import {useStore} from 'vuex';
import {ref, computed} from 'vue';
import AddClient from './AddClient';

export default {
    name: "ClientsList",
    created() {
        this.$store.dispatch("fetchClients", {self: this});
    },
    setup() {
        const store = useStore();
        const clients = computed(() => store.getters.getClients);
        const showAddForm = ref(false);

        const getClient = (id) => {
            return clients.value.find(client => client.id === id);
        }

        const updateClient = (id) => {
            store.dispatch('updateClient', getClient(id));
        }

        const deleteClient = (id) => {
            store.dispatch('deleteClient', {id});
        }

        const displayAddForm = () => {
            showAddForm.value = !showAddForm.value;
        }

        return {
            clients,
            showAddForm,
            displayAddForm,
            updateClient,
            deleteClient
        }
    },
    components: {
        AddClient
    }
}
</script>
