import {createApp} from "vue";
import App from "./App.vue";
import store from "./store";
import router from "./router";
import VueNotificationList from "@dafcoe/vue-notification";

createApp(App).use(VueNotificationList).use(store).use(router).mount("#app");
