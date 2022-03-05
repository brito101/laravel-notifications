<template>
    <div>
        <a class="dropdown-item" href="#">
           <span v-on:click="markAsRead(notification.id)" class="btn btn-info btn-sm">Lida</span>
            {{ comment.user.name }} comentou {{ comment.title }}
        </a>
    </div>
</template>

<script>
export default {
    props: ["notification"],
    computed: {
        comment() {
            return this.notification.data.comment;
        },
    },
    methods: {
        markAsRead(idNotification) {
            this.$store.dispatch("markAsRead", { id: idNotification });
        },
    },
};
</script>
