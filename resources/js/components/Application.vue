<script setup>
    import ChatPublic from './ChatPublic.vue';

    const formatDatetime = (datetime) => {
        let date = new Date(datetime);

        return date.getHours()
        + ':'
        + date.getMinutes() + 1
        + ':'
        + date.getSeconds()
        + ' '
        + date.getDate()
        + '/'
        + date.getMonth()
        + '/'
        + date.getFullYear()
    }

    const inputLogin = document.querySelector('#user_data').value;


    let currentUser = {};

    if(inputLogin) {
        currentUser = JSON.parse(document.querySelector('#user_data').value);
    }

    const user = currentUser;

</script>

<template>
   <ChatPublic :formatDate="formatDatetime" :user="user"/>
</template>