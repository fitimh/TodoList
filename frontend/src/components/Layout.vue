<template>
   <div class="content__item-side">
      <div
         class="content__item-side-1 pt-5 d-flex bg-light justify-content-between bg-grey"
      ></div>
      <div
         class="content__item__side d-flex bg-light justify-content-between bg-grey"
      >
         <div class="side__2 bg-light w-50 p-2">
            <div class="todoApp w-100 d-flex border p -2">
               <div class="icons__item">
                  <span>=</span>
               </div>
               <div class="item__content">
                  <h6>Task 2</h6>
                  <span>Pershkrimi</span>
                  <div class="tags__task d-flex">
                     <div class="btn-front-back">
                        <div class="btn-front">
                           <span
                              ><i class="fa-solid fa-circle"></i> Frontend</span
                           >
                        </div>
                        <div class="btn-back">
                           <span
                              ><i class="fa-solid fa-circle"></i> Backend</span
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
            <div class="todoApp d-flex border pt-2">
               <div class="icons__item">
                  <span>=</span>
               </div>
               <div class="item__content">
                  <h6>Task 2</h6>
                  <span>Pershkrimi</span>
                  <div class="tags__task d-flex">
                     <div class="btn-front-back">
                        <div class="btn-front">
                           <span
                              ><i class="fa-solid fa-circle"></i> Frontend</span
                           >
                        </div>
                        <div class="btn-back">
                           <span
                              ><i class="fa-solid fa-circle"></i> Backend</span
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
            <div class="todoApp d-flex border pt-2">
               <div class="icons__item">
                  <span>=</span>
               </div>
               <div class="item__content">
                  <h6>Task 2</h6>
                  <span>Pershkrimi</span>
                  <div class="tags__task d-flex">
                     <div class="btn-front-back">
                        <div class="btn-front">
                           <span
                              ><i class="fa-solid fa-circle"></i> Frontend</span
                           >
                        </div>
                        <div class="btn-back">
                           <span
                              ><i class="fa-solid fa-circle"></i> Backend</span
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
