require('./bootstrap');

import {createApp} from 'vue';
import store from './store'
import {library} from "@fortawesome/fontawesome-svg-core";
import {
    faUser,
    faEnvelopeSquare,
    faPhone,
    faEdit,
    faTrash
} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import IndexPage from './components/IndexPage';

library.add(
    faUser,
    faEnvelopeSquare,
    faPhone,
    faEdit,
    faTrash
);

const app = createApp({})
    .use(store)
    .component("font-awesome-icon", FontAwesomeIcon)
    .component('index-page', IndexPage)
    .mount('#app');
