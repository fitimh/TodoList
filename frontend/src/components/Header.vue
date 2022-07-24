<template>
   <header class="header__bar">
      <nav class="navbar navbar__item-1">
         <div class="nav__item d-flex w-100">
            <div class="logo__item">
               <span><i class="fa-solid fa-check"></i></span>
               <label class="form-check-label" for="flexCheckDefault">
                  To-do
               </label>
            </div>
            <div class="search w-100 d-flex">
               <i class="fa-solid fa-magnifying-glass"></i>
               <input
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search..."
                  id="search__bar"
                  aria-label="Search"
                  v-on:keyup.enter="search"
               />
            </div>
         </div>
      </nav>
   </header>
</template>
<script>
import {useRouter} from "vue-router";
export default {
   setup() {
      const router = useRouter();
      const search = (e) => {
         const value = e.target.value;
         if (value) {
            router.push({
               name: "todo",
               params: {filter: "search", search: value},
            });
         }
      };

      return {
         search,
      };
   },
};
</script>
