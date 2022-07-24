<template>
   <router-view></router-view>

   <notification-component />
</template>

<script>
import notificationComponent from "@/components/Notification.vue";

export default {
   components: {notificationComponent},
   setup() {},
};
</script>

<style src="./assets/css/style.css"></style>
