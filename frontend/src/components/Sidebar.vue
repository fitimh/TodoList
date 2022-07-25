<template>
   <div class="sidebar__item">
      <div class="side__1 w-25">
         <div class="btn-add">
            <button>Add to do</button>
         </div>
         <nav
            id="sidebarMenu"
            class="collapse d-lg-block sidebar collapse bg-white"
         >
            <div class="position-sticky">
               <div class="list-group list-group-flush mx-3 mt-4">
                  <div class="all-btn">
                     <router-link
                        :to="{name: 'todo'}"
                        class="list-group-item list-group-item-action py-2 ripple" :class="{ 'active': !$route.params.filter }"
                        aria-current="true"
                     >
                        <i class="fa-solid fa-bars"></i>
                        <span>All</span>
                     </router-link>
                  </div>

                  <div class="title__item-1">
                     <h6>Filters</h6>
                     <router-link
                        :to="{name: 'todo', params: {filter: 'priority'}}"
                        class="list-group-item list-group-item-action py-2 ripple" :class="{ 'active': $route.params.filter == 'priority' }"
                     >
                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>Priority</span>
                     </router-link>
                     <router-link
                        :to="{name: 'todo', params: {filter: 'scheduled'}}"
                        class="list-group-item list-group-item-action py-2 ripple" :class="{ 'active': $route.params.filter == 'scheduled' }"
                     >
                        <i class="fa-solid fa-clock"></i>
                        <span>Scheduled</span>
                     </router-link>
                     <router-link
                        :to="{name: 'todo', params: {filter: 'today'}}"
                        class="list-group-item list-group-item-action py-2 ripple" :class="{ 'active': $route.params.filter == 'today' }"
                     >
                        <i class="fa-solid fa-calendar"></i>
                        <span>Today</span>
                     </router-link>
                     <router-link
                        :to="{name: 'todo', params: {filter: 'done'}}"
                        class="list-group-item list-group-item-action py-2 ripple" :class="{ 'active': $route.params.filter == 'done' }"
                     >
                        <i class="fa-solid fa-check"></i>
                        <span>Done</span>
                     </router-link>
                  </div>
                  <div class="title__item-2">
                     <div class="d-flex justify-content-between">
                        <h6>TAGS</h6>
                        <span class="add">+</span>
                     </div>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-square-caret-right"></i>
                        <span>Backend</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-square-caret-right"></i>
                        <span>Frontend</span>
                     </a>
                  </div>
               </div>
            </div>
         </nav>
      </div>
   </div>
</template>
