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
                    :notification="notification"
                >
                </notification>
                <a
                    class="dropdown-item"
                    href="#"
                    v-on:click.prevent="markAllAsRead"
                >
                    Limpar Notificações
                </a>
            </div>
        </li>
    </div>
</template>

<script>
import Notification from "./Notification.vue";
export default {
    components: { Notification },
    created() {
        this.$store.dispatch("loadNotifications");
    },
    computed: {
        notifications() {
            return this.$store.state.notifications.items;
        },
    },
    methods: {
        markAllAsRead() {
            this.$store.dispatch("markAllAsRead");
        },
    },
};
</script>
