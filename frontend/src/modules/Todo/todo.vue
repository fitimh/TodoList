<template>
   <HeaderVue />
   <SidebarVue />
   <LayoutVue />
</template>

<script>
import HeaderVue from "@/components/Header.vue";
import SidebarVue from "@/components/Sidebar.vue";
import LayoutVue from "@/components/Layout.vue";
export default {
   components: {
      HeaderVue,
      SidebarVue,
      LayoutVue,
   },
   setup() {},
};
</script>
