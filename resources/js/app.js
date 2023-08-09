import './bootstrap';
import "bootstrap";



import { createApp } from 'vue';
import JerseyDesigner from '@/components/JerseyDesigner.vue';
import Welcome from '@/components/ExampleComponent.vue';

const app = createApp({});
app.component('jerseydesigner', JerseyDesigner);
app.component('welcome', Welcome);
app.mount('#app');
