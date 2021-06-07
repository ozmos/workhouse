<template>
    <div class="modal" v-bind:class="{ 'is-active': showModal }">
        <div class="modal-background" @click="closeModal"></div>
        <div class="modal-content" :style="{ 'max-width' : modalWidth}">
            <p class="image is-3by2">
                <img :src="url" alt="" :width="modalWidth">
            </p>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="closeModal"></button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            modalWidth: "900px"
        }
    },
    props: ['url', 'showModal'],
    methods: {
        closeModal() {
            this.$emit('close');
        }
    }
}
</script>
