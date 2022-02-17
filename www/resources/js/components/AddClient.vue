<template>
    <div class="client-add-form">
        <h2>New CLIENT</h2>
        <div>
            <font-awesome-icon icon="user"/>
            <input type="text" v-model="client.name" placeholder="Name">
        </div>
        <div>
            <font-awesome-icon icon="envelope-square"/>
            <input type="email" v-model="client.email" placeholder="E-mail">
        </div>
        <div>
            <font-awesome-icon icon="phone"/>
            <input type="text" v-model="client.phone" placeholder="Phone">
        </div>
        <button type="submit" v-on:click="addClient()">Add</button>
    </div>
</template>

<script>
import {ref} from 'vue';
import {useStore} from 'vuex';

export default {
    name: "AddClient",
    setup() {
        const store = useStore();
        const client = ref({
            name: '',
            email: '',
            phone: ''
        });

        const addClient = () => {
            store.dispatch('addClient', client.value);
        }

        return {
            client,
            addClient
        }
    }
}
</script>

<style scoped>

</style>
