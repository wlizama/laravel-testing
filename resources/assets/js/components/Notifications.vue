<template>
  <div class="dropdown-menu">
    <a :href="'/' + notification.data.follower.username" class="dropdown-item" v-for="notification in notifications">
      <b>@{{ notification.data.follower.username }} te ha seguido!</b>
    </a>
  </div>
</template>

<script>
export default {
  props: ['user'],
  data() {
    return {
      notifications: []
    }
  },
  mounted() {
    axios.get('/api/notifications')
      .then(response => {
        this.notifications = response.data;

        Echo.private(`App.User.${this.user}`)
          .notification(notification => {
            console.log(notification)
            this.notifications.unshift(notification);
          });
      });
  }
}
</script>