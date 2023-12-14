<script setup>
    import { defineProps, reactive } from 'vue';
    import SendButton from './SendButton.vue';
    import ChatMessage from './ChatMessage.vue';
    
    const props = defineProps({
        type: String,
        messages: Array
    });

    const data = reactive({
        text: { content: '' },
        button: 'input-button',
        messages: props.messages
    });

    const emptyFieldText = () => data.text.content.length > 0;

    const methods = {};

    const clearText = () => data.text.content = '';

    methods.sendmessage = async () => await sendMessageRequest(data.text) && clearText();

    async function sendMessageRequest(text) {

        let body = {content: text.content};

        return await axios.post(window.location.origin + '/send-message', body);
    }
    

</script>
<template>
    <div class="chat large">
        <div class="chat-container">
            <div class="chat-scroll">
                <div  v-for="message in data.messages">
                    <ChatMessage
                       
                        :key="message.id"
                        :message="message"
                    />
                </div>
            </div>

        </div>
        <div class="chat-input-container">
            <div class="input-text">
                <input
                    type="text"
                    v-model="data.text.content"
                    id="text-content"
                    @keyup.enter="methods.sendmessage"
                >
            </div>
            <div class="input-button">
                <SendButton :active="emptyFieldText()" :actionClick="methods.sendmessage"/>
            </div>
        </div>
    </div>
</template>
<style>
.chat.large
{
    margin: auto;
    text-align: center;
    width: 400px;
    height: 450px;
    border: solid 1px black;
    border-radius: 4px;
    background: rgb(10, 30, 33);
}

.chat-scroll
{
    padding: 10px;
}

.chat-input-container
{
    display: grid;
    grid-template-columns: 90% 10%;
    width: 95%;
    background: white;
    align-items: center;
    border-radius: 4px;
    text-align: center;
    margin: auto;
    padding: 5px;
}

.chat
{
    display: grid;
    grid-template-rows: 90% 10%;
}

.input-button > button
{
    background: none;
    color: grey;
    border: none;
    display: grid;
}

#text-content
{
    border: none;
    width: 100%;
    color: black;
}

#text-content:focus{
    outline: none;
}

.active
{
    color: teal;
}
</style>