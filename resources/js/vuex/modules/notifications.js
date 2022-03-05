export default {
    state: {
        items: [],
    },

    mutations: {
        LOAD_NOTIFICATIONS(state, notifications) {
            state.items = notifications;
        },

        MARK_AS_READ(state, id) {
            let index = state.items.filter((notication) => notication.id == id);
            state.items.splice(index, 1);
        },

        //     MARK_ALL_AS_READ(state) {
        //         state.items = [];
        //     },

        //     ADD_NOTIFICATION(state, notication) {
        //         state.items.unshift(notication);
        //     },
    },

    actions: {
        loadNotifications(context) {
            axios
                .get("/laravel-notifications/public/notifications")
                .then((res) => {
                    context.commit(
                        "LOAD_NOTIFICATIONS",
                        res.data.notifications
                    );
                });
        },

        markAsRead(context, params) {
            axios
                .put("/laravel-notifications/public/notification-read", params)
                .then(() => context.commit("MARK_AS_READ", params.id));
        },

        //     markAllAsRead(context) {
        //         axios
        //             .put("/notification-all-read")
        //             .then(() => context.commit("MARK_ALL_AS_READ"));
        //     },
    },
};
