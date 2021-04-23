import Vue from "vue";
import Vuex from "vuex";

require("./bootstrap");

require("alpinejs");

// window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponents").default
);
Vue.component(
    "product-add",
    require("./components/products/ProductAdd").default
);
Vue.component(
    "product-edit",
    require("./components/products/ProductEdit").default
);

import store from "./store";
const app = new Vue({
    el: "#app",
    store
});
