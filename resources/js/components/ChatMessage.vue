<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        message: Object
    });

    const messageType = "message " + (props.message.currentUser ? 'me' : 'someelse');

    const sanitize = text => text.replaceAll('\n', '<br>')
        .replaceAll(/</g, "&lt;")
        .replaceAll(/>/g, "&gt;");

</script>
<template>
    <div :class="messageType">
        <div v-show="!props.message.currentUser" class="message-user">{{ props.message.user.name }}</div>
        <div class="message-content">
            <div class="message-text" v-html="sanitize(props.message.content)"></div>
        </div>
        <div class="message-datetime">{{ props.message.datetime }}</div>
    </div>
</template>

<style>

    .message-user
    {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.526);
    }

    .message.someelse
    {
        text-align: left;
        margin: auto;
        color: white;
        font-size: 13px;
    }

    .message-content
    {
        text-align: left;
    }

    .message.someelse >.message-content
    {
        display: inline-block;
        padding: 10px;
        background: rgba(126, 146, 53, 0.591);
        border-radius: 0 50px 50px 50px;
    }

    .message.me
    {
        text-align: right;
        margin: auto;
        color: white;
        font-size: 13px;
    }

    .message.me > .message-content
    {
        display: inline-block;
        padding: 10px;
        background: rgba(53, 146, 146, 0.646);
        border-radius: 50px 0 50px 50px;
    }

    .message-datetime
    {
        font-size: 11px;
        color: rgba(99, 140, 176, 0.393);
    }

</style>