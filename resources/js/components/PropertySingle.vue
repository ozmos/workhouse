<template>

    <tr  v-bind:class="classObject" :title="title">
        <td>{{ emoji }}</td>
        <td>{{ property.id }}</td>
        <td>{{ property.name }}</td>
        <td>{{ property.address }}</td>
        <td>{{ property.price }}</td>
        <td>{{ property.bedrooms }}</td>
        <td>{{ property.bathrooms }}</td>
        <td>{{ property.garages }}</td>
        <td>{{ property.frontage }}</td>
        <td>
            <a :href="property.image" target="_blank">
                <img :src="property.image" width="128px" height="85.5px">
            </a>
        </td>
    </tr>
</template>

<script>
export default {
    data() {
        return {
            classObject: {
                'is-selected featured': this.property.featured,
                special: this.property.special
            }
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
    }
}
</script>

<style>
.special, .featured {
    font-weight: bold;
}
</style>
