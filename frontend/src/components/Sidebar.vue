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
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple active"
                        aria-current="true"
                     >
                        <i class="fa-solid fa-bars"></i>
                        <span>All</span>
                     </a>
                  </div>

                  <div class="title__item-1">
                     <h6>Filters</h6>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-exclamation"></i>

                        <span>Priority</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-clock"></i>
                        <span>Scheduled</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-calendar"></i>
                        <span>Today</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-2 ripple"
                     >
                        <i class="fa-solid fa-check"></i>
                        <span>Done</span>
                     </a>
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
