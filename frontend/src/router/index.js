import {createRouter, createWebHistory} from "vue-router";

import store from "../store";
import TodoView from "@/modules/Todo/todo.vue";

const router = createRouter({
   history: createWebHistory(),
   
   routes: [
      {
         path: "/",
         component: TodoView,
         name: "todo",
      },
      // {
      //    path: "/:pathMatch(.*)*", // 404 page
      //    component: Error404,
      //    name: "error404",
      // },
      {
         path: "/:filter?/:search?",
         component: TodoView,
         name: "todo",
      },
   ],
});

export default router;
