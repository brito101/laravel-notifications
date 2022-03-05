<template>
    <div>
        <li class="nav-item dropdown">
            <a
                id="navbarDropdown"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Notificações ({{ notifications.length }})
            </a>
            <div
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown"
            >
                <notification
                    v-for="notification in notifications"
                    :key="notification.id"
                    :notification="notification.data"
                >
                </notification>
                <a class="dropdown-item" href="#"> Limpar Notificações </a>
            </div>
        </li>
    </div>
</template>

<script>
import Notification from "./Notification.vue";
export default {
    components: { Notification },
    created() {
        this.loadNotifications();
    },
    computed: {
        notifications() {
            return this.notificationsItems;
        },
    },
    data() {
        return {
            notificationsItems: [],
        };
    },
    methods: {
        loadNotifications() {
            axios
                .get("/laravel-notifications/public/notifications")
                .then(
                    (res) => (this.notificationsItems = res.data.notifications)
                );
        },
    },
};
</script>
