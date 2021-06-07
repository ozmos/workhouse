<template>

    <tr  v-bind:class="classObject" :title="title">
        <td>{{ emoji }}</td>
        <td>{{ property.id }}</td>
        <td :class="{ 'has-text-info' : !property.featured}">{{ property.name }}</td>
        <td>{{ property.address }}</td>
        <td>{{ property.price }}</td>
        <td>{{ property.bedrooms }}</td>
        <td>{{ property.bathrooms }}</td>
        <td>{{ property.garages }}</td>
        <td>{{ property.frontage }}</td>
        <td>
            <a @click="openModal = true">
                <img :src="property.image" width="128px" height="85.5px">
            </a>
        </td>
        <modal :showModal="openModal" @close="openModal = false" :url="property.image"></modal>
    </tr>
</template>

<script>

import Modal from './Modal.vue';

export default {
    components: { Modal },
    data() {
        return {
            classObject: {
                'is-selected featured': this.property.featured,
                special: this.property.special
            },
            openModal: false
        }
    },
    props: {
      property: {
        type: Object
      },
    },
    computed: {
        title() {
            if (this.property.featured) {
                return "Featured";
            } else if (this.property.special) {
                return "Special";
            }
        },
        emoji() {
            if (this.property.featured) {
                return "⭐";
            } else if (this.property.special) {
                return "💲";
            }
        },
    },
}
</script>

<style>
.special, .featured {
    font-weight: bold;
}
.table td {
    vertical-align: middle;
}
</style>
