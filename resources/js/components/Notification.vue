<template>
    <li class="nav-item dropdown" @click="markNotificationAsRead">
        <a id="navbarDropdown" class="nav-link dropdown-toggle notify" href="#" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell noti-icon"></i><span
                class="badge badge-pill badge-primary noti-badge">{{unreadNotifications.length}}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" v-if="unreads.length">
            <notification-item v-for="unread in unreadNotifications" :unread="unread"
                               :key="unread.id"></notification-item>
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" v-if="!unreads.length">
            <a class="dropdown-item">No active notifications</a>
        </div>
    </li>
</template>

<script>
    import NotificationItem from './NotificationItem.vue';

    export default {
        props: ['unreads', 'userid'],
        components: {NotificationItem},
        data() {
            return {
                unreadNotifications: this.unreads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/laranotify/markAsRead');
                }
            }
        },
        mounted() {
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
