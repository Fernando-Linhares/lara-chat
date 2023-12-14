<script setup>
    import { reactive, defineProps, onMounted } from 'vue';
    import ChatTemplate from './ChatTemplate.vue';

    const props = defineProps({
        formatDate: Function,
        user: Object
    });

    const data = reactive({
        messages: [],
    });

    onMounted(async () => {
        const response = await axios.get(window.location.origin + '/api/messages');

        for(let message of response.data.messages) {
            data.messages.push({
                id: message.id,
                user: message.user,
                content: message.content,
                currentUser: props.user.id == message.user.id,
                datetime: props.formatDate(message.created_at)
            });
        }
    });

    Echo.private('message.public')
        .listen('Message', event => data
            .messages
            .push({
                id: event.message.id,
                user: event.message.user,
                content: event.message.content,
                currentUser: event.message.user.id == props.user.id,
                datetime: props.formatDate(event.message.created_at)
            }));
</script>

<template>
    <ChatTemplate type="public" :messages="data.messages"/>
</template>