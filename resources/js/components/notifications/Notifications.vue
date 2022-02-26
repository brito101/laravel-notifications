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
                Notificações
            </a>
            <div
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown"
            >
                <a
                    class="dropdown-item"
                    href="#"
                    v-for="notification in notifications"
                    :key="notification.id"
                >
                    {{ notification.data.comment.title }}
                </a>
                <a class="dropdown-item" href="#"> Limpar Notificações </a>
            </div>
        </li>
    </div>
</template>

<script>
export default {
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
