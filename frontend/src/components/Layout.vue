<template>
  <div class="content__item-side">
    <div
      class="
        content__item-side-1
        pt-5
        d-flex
        bg-light
        justify-content-between
        bg-grey
      "
    ></div>
    <div
      class="
        content__item__side
        d-flex
        bg-light
        justify-content-between
        bg-grey
      "
    >
      <div class="side__2 bg-light w-50 p-2">
        <draggable
          class="dragArea list-group w-full"
          :list="todos"
          @change="log"
        >
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
                  <div class="btn-front" v-for="tag in todo.tags" :key="tag">
                    <span
                      ><i class="fa-solid fa-circle"></i> {{ tag.tag }}</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="items_icon d-flex">
               <i class="fa-solid fa-circle-exclamation"></i>
              <div v-if="todo.favorites == null">
                <i
                  @click="makeFavorite($event, todo.id, todo)"
                  class="fa-solid fa-star"
                ></i>
              </div>
              <div v-else>
                <i
                  style="color: orange"
                  @click="makeFavorite($event, todo.id)"
                  class="fa-solid fa-star"
                ></i>
              </div>
              <i
                @click="deleteTag(todo.id)"
                class="fa-solid fa-trash text-danger"
              ></i>
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>
          </div>
        </draggable>
      </div>
      <div class="side__3 bg-light w-50">
        <div class="todo__forms">
          <div class="todo__done d-flex align-items-center">
            <label>
              <input
                type="checkbox"
                data-ng-model="example.check"
                v-model="status"
                id="flexCheckDefault"
              />
              <span class="box"></span>
              Mark as Done
            </label>
            <div class="items_icon d-flex">
              <!-- <i class="fa-solid fa-circle-exclamation"></i>
              <i
                @click="makeFavorite($event, todo.id, todo)"
                class="fa-solid fa-star"
              ></i>
              <i
                @click="deleteTodo_Tag(todo.id)"
                class="fa-solid fa-trash text-danger"
              ></i> -->
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>
          </div>

          <div class="row g-3">
            <div class="title__todo">
              <textarea placeholder="Title *" v-model="title"></textarea>
            </div>
            <div class="col-md-6">
              <input
                type="date"
                placeholder="Start Date*"
                v-model="start_date"
              />
            </div>
            <div class="col-md-6 col-sm-12">
              <input type="date" placeholder="Due Date*" v-model="end_date" />
            </div>

            <div class="title__todo">
              <textarea placeholder="Notes *" v-model="notes"></textarea>
            </div>
            <div class="tags-input-container">
              <div class="add__tag">
                <div
                  class="tag"
                  v-for="(tag, index) in tags"
                  :key="'tag' + index"
                >
                  {{ tag }}
                </div>
              </div>
              <label class="addtags">#AddTags</label>
              <input v-model="tagValue" v-on:keyup.enter="addTags" />
            </div>
            <div class="col-12">
              <button type="button" @click="addTodo" class="btn btn-primary">
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { onMounted, ref, watchEffect } from "vue";
import { VueDraggableNext } from "vue-draggable-next";
import axios from "@/config/axios";
import { useRoute } from "vue-router";
import { showNotification } from "@/config/show-notification.js";
export default {
  components: {
    draggable: VueDraggableNext,
  },
  setup() {
    const route = useRoute();

    const todos = ref(null);
    const status = ref(0);
    const title = ref("");
    const start_date = ref("");
    const end_date = ref("");
    const notes = ref("");
    const tags = ref([]);
    const activeTag = ref(null);
    const tagValue = ref("");

    const getTodos = () => {
      const filter = route.params.filter;
      const paramsData = {
      
        done: filter == "done" ? true : false,
        today: filter == "today" ? true : false,
        scheduled: filter == "scheduled" ? true : false,
        priority: filter == "priority" ? true : false,
        filter: filter == "search" ? route.params.search : false,
      };
      axios.get("/todo", { params: paramsData }).then((res) => {
        todos.value = res.data;
      });
    };
    const addTodo = async () => {
      const formData = new FormData();
      if (document.getElementById("flexCheckDefault").checked) {
        formData.append("status", 1);
      } else {
        formData.append("status", 0);
      }
      formData.append("title", title.value);
      formData.append("start_date", start_date.value);
      formData.append("end_date", end_date.value);
      formData.append("notes", notes.value);
      if (tags.value.length) {
        for (var i = 0; i < tags.value.length; i++) {
          formData.append("tags[" + i + "][tag]", tags.value[i]);
        }
      }
      axios({
        url: "/todo/addTodo",
        method: "POST",
        data: formData,
      }).then(async () => {
        title.value = "";
        status.value = "";
        start_date.value = "";
        end_date.value = "";
        notes.value = "";
        location.reload();
      });
    };
    const deleteTodo_Tag = (id) => {
      var x = confirm("Are you sure you want to delete?");
      if (x === true) {
        axios.delete("/todo/removeTodo/" + id).then(async () => {
          showNotification({
            message: "Sucessfully deleted",
            type: "success",
            duration: 5000,
            appearance: "light",
          });
          getTodos();
        });
      }
    };
    const makeFavorite = (e, id, todo) => {
      axios.post("/todo/favorite/" + id).then(async (res) => {
        todo.favorites = res.data.favorites
        getTodos();
      });
    };
    const addTags = (e) => {
      tags.value.push("#" + e.target.value);
      tagValue.value = "";
    };
    const removeTag = (index) => {
      tagValue.value.splice(index, 1);
    };
    onMounted(() => {
      getTodos(),
        watchEffect(() => {
          if (route.params.filter) {
            getTodos();
          }
        });
    });

    return {
      todos,
      status,
      title,
      start_date,
      end_date,
      notes,
      tags,
      addTodo,
      addTags,
      activeTag,
      tagValue,
      makeFavorite,
      deleteTodo_Tag,
      removeTag,
      enabled: true,
      dragging: false,
    };
  },
  methods: {
    log(event) {},
  },
  directives: {
    focus: {
      inserted: (el) => {
        el.focus();
      },
    },
  },
};
</script>

<style scoped>
.tags-input-container {
  padding-left: 3rem;
  max-width: 100%;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.7);
  width: 300px;
  padding-left: 3rem;
}
.tags-input-container input {
  width: 100%;
  padding: 5px;
  margin: 0;
  border: 0;
  outline: none;
  border: 1px solid #4444;
  border-radius: 10px;
  box-sizing: border-box;
  box-shadow: 20px 10px #ebebeb6b;
  font-size: 1rem;
}
.tags-input-container .tag {
  float: left;
  padding: 3px 10px;
  margin: 0 10px 5px 0;
  display: flex;
  justify-content: center;
  cursor: pointer;
  background-color: #ebebeb;
  border-radius: 20px;
  font-weight: bold;
}
.tags-input-container .tag:hover {
  /* background-color: #57c340; */
  border-radius: 5px;
}
.tags-input-container .tag span:first-child {
  margin-right: 8px;
}
.tags-input-container .tag svg {
  color: #666;
}
.tags-input-container .tag svg:hover {
  color: #333;
}
</style>
