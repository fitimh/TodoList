<script>
// import {mapState} from "vuex";

import HeaderVue from "./components/Header.vue";
import SidebarVue from "./components/Sidebar.vue";
import LayoutVue from "./components/Layout.vue";
export default {
   components: {
      HeaderVue,
      SidebarVue,
      LayoutVue,
   },
   // computed: {
   //    ...mapState(["user"]),
   // },
};
</script>

<template>
   <HeaderVue />
   <SidebarVue />
   <LayoutVue />
   <!-- <router-view></router-view> -->
</template>

<style src="./assets/css/style.css"></style>
