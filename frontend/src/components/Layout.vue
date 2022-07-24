<template>
   <div class="content__item-side">
      <div
         class="content__item-side-1 pt-5 d-flex bg-light justify-content-between bg-grey"
      ></div>
      <div
         class="content__item__side d-flex bg-light justify-content-between bg-grey"
      >
         <div class="side__2 bg-light w-50 p-2">
            <div
               v-for="todo in todos"
               :key="todo"
               class="todoApp w-100 d-flex border pt-2"
            >
               <div class="icons__item">
                  <span>=</span>
               </div>
               <div class="item__content">
                  <h6>{{ todo.title }}</h6>
                  <span>{{ todo.notes }}</span>
                  <div class="tags__task d-flex">
                     <div class="btn-front-back">
                        <div
                           class="btn-front"
                           v-for="tag in todo.tags"
                           :key="tag"
                        >
                           <span
                              ><i class="fa-solid fa-circle"></i>
                              {{ tag.tag }}</span
                           >
                        </div>
                     </div>
                  </div>
               </div>
               <div class="items_icon d-flex">
                  <i class="fa-solid fa-circle-exclamation"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-trash"></i>
                  <i class="fa-solid fa-ellipsis-vertical"></i>
               </div>
            </div>
         </div>
         <div class="side__3 bg-light w-50">
            <div class="todo__forms">
               <div class="todo__done d-flex align-items-center">
                  <label>
                     <input type="checkbox" data-ng-model="example.check" />
                     <span class="box"></span>
                     Mark as Done
                  </label>
                  <div class="items_icon d-flex">
                     <i class="fa-solid fa-circle-exclamation"></i>
                     <i class="fa-solid fa-star"></i>
                     <i class="fa-solid fa-trash"></i>
                     <i class="fa-solisd fa-ellipsis-vertical"></i>
                  </div>
               </div>

               <form class="row g-3">
                  <div class="title__todo">
                     <textarea placeholder="Title *"></textarea>
                  </div>
                  <div class="col-md-6">
                     <input type="date" placeholder="Start Date*" />
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <input type="date" placeholder="Due Date*" />
                  </div>

                  <div class="title__todo">
                     <textarea placeholder="Notes *"></textarea>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
import {onMounted, ref, watchEffect} from "vue";
import axios from "@/config/axios";
import {useRoute} from "vue-router";
export default {
   setup() {
      const route = useRoute();
      const todos = ref(null);

      const getTodos = () => {
         const filter = route.params.filter;

         const paramsData = {
            done: filter == "done" ? true : false,
            today: filter == "today" ? true : false,
            scheduled: filter == "scheduled" ? true : false,
            priority: filter == "priority" ? true : false,
            filter: filter == "search" ? route.params.search : false,
         };
         axios.get("/todo", {params: paramsData}).then((res) => {
            console.log("todo", res);
            todos.value = res.data;
         });
      };

      onMounted(() => {
         watchEffect(() => {
            if (route.params.filter) {
               getTodos();
            }
         });
      });
      return {
         todos,
      };
   },
};
</script>
