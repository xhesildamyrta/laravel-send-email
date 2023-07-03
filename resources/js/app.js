import './bootstrap';

import { createApp } from 'vue';
import Welcome from './components/Welcome.vue';

const app = createApp({
    Welcome,

});

app.component('welcome', Welcome);

app.mount("#app");