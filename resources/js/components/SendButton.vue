<script setup>
    import { defineProps } from 'vue';

    const data = defineProps({
        active: false,
        actionClick: Function
    });

    const callClick = () => data.active ? data.actionClick(): null;

</script>

<template>
    <button v-if="data.active" style="color: teal;" @click="callClick">
        <i class="material-icons">
            send
        </i>
    </button>
    <button v-else  @click="callClick">
        <i class="material-icons">
            send
        </i>
    </button>
</template>