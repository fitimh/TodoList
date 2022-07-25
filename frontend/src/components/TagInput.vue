<template>
   <div class="tag-input" :class="{'with-count': showCount}">
      <input
         v-model="newTag"
         type="text"
         :list="id"
         autocomplete="off"
         @keydown.enter="addTag(newTag)"
         @keydown.prevent.tab="addTag(newTag)"
         @keydown.delete="newTag.length || removeTag(tags.length - 1)"
         :style="{'padding-left': `${paddingLeft}px`}"
      />

      <datalist v-if="options" :id="id">
         <option
            v-for="option in availableOptions"
            :key="option"
            :value="option"
         >
            {{ option }}
         </option>
      </datalist>

      <ul class="tags" ref="tagsUl">
         <li
            v-for="(tag, index) in tags"
            :key="tag"
            class="tag"
            :class="{duplicate: tag === duplicate}"
         >
            {{ tag }}
            <button class="delete" @click="removeTag(index)">x</button>
         </li>
      </ul>
      <div v-if="showCount" class="count">
         <span>{{ tags.length }}</span> tags
      </div>
   </div>
</template>
<script>
import {ref, watch, nextTick, onMounted, computed} from "vue";
export default {
   props: {
      name: {type: String, default: ""},
      modelValue: {type: Array, default: () => []},
      options: {type: [Array, Boolean], default: false},
      allowCustom: {type: Boolean, default: true},
      showCount: {type: Boolean, default: false},
   },
   setup(props, {emit}) {
      // Tags
      const tags = ref(props.modelValue);
      const newTag = ref("");
      const id = Math.random().toString(36).substring(7);

      const addTag = (tag) => {
         if (!tag) return; // prevent empty tag
         // only allow predefined tags when allowCustom is false
         if (!props.allowCustom && !props.options.includes(tag)) return;
         // return early if duplicate
         if (tags.value.includes(tag)) {
            handleDuplicate(tag);
            return;
         }
         tags.value.push(tag);
         newTag.value = ""; // reset newTag
      };
      const removeTag = (index) => {
         tags.value.splice(index, 1);
      };

      // handling duplicates
      const duplicate = ref(null);
      const handleDuplicate = (tag) => {
         duplicate.value = tag;
         setTimeout(() => (duplicate.value = null), 1000);
         newTag.value = "";
      };

      // positioning and handling tag change
      const paddingLeft = ref(10);
      const tagsUl = ref(null);
      const onTagsChange = () => {
         // position cursor
         const extraCushion = 15;
         paddingLeft.value = tagsUl.value.clientWidth + extraCushion;
         // scroll to end of tags
         tagsUl.value.scrollTo(tagsUl.value.scrollWidth, 0);
         // emit value on tags change
         emit("update:modelValue", tags.value);
      };
      watch(tags, () => nextTick(onTagsChange), {deep: true});
      onMounted(onTagsChange);

      // options
      const availableOptions = computed(() => {
         if (!props.options) return false;
         return props.options.filter((option) => !tags.value.includes(option));
      });

      return {
         tags,
         newTag,
         addTag,
         removeTag,
         paddingLeft,
         tagsUl,
         availableOptions,
         id,
         duplicate,
      };
   },
};
</script>
<style scoped>
.tag-input {
   position: relative;
}
ul {
   list-style: none;
   display: flex;
   align-items: center;
   gap: 7px;
   margin: 0;
   padding: 0;
   position: absolute;
   top: 0;
   bottom: 0;
   left: 10px;
   max-width: 75%;
   overflow-x: auto;
}
.tag {
   background: rgb(250, 104, 104);
   padding: 5px;
   border-radius: 4px;
   color: white;
   white-space: nowrap;
   transition: 0.1s ease background;
}
input {
   width: 100%;
   padding: 10px;
}
.delete {
   color: white;
   background: none;
   outline: none;
   border: none;
   cursor: pointer;
}
@keyframes shake {
   10%,
   90% {
      transform: scale(0.9) translate3d(-1px, 0, 0);
   }

   20%,
   80% {
      transform: scale(0.9) translate3d(2px, 0, 0);
   }

   30%,
   50%,
   70% {
      transform: scale(0.9) translate3d(-4px, 0, 0);
   }

   40%,
   60% {
      transform: scale(0.9) translate3d(4px, 0, 0);
   }
}
.tag.duplicate {
   background: rgb(235, 27, 27);
   animation: shake 1s;
}
.count {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   right: 10px;
   display: block;
   font-size: 0.8rem;
   white-space: nowrap;
}
.count span {
   background: #eee;
   padding: 2px;
   border-radius: 2px;
}
.with-count input {
   padding-right: 60px;
}
.with-count ul {
   max-width: 60%;
}
</style>
