<template>
    <div class="section">
        <div class="container">
            <header class="block">
                <h2 class="title is-size-2 has-text-centered">{{ title }}</h2>
            </header>
            <div v-if="properties.length" class="box">
                <p>⭐: Featured Property💲: On Special</p>
                <table class="table is-bordered is-hoverable table-container">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Price (AUD)</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Garages</th>
                            <th>Frontage (meters)</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <property-single v-for="property in properties" :property="property" :key="property.id"></property-single>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import PropertySingle from './PropertySingle.vue';

export default {
  components: { PropertySingle },
    props: ['properties', 'loading', 'loaded'],
    computed: {
        title() {
            if (this.loading) {
                return "Searching the database";
            } else if (this.loaded && this.properties.length <= 0 ) {
                return "Sorry, no properties with those criteria, please search again";
            } else if (this.loaded && this.properties.length > 0) {
                return  "Properties Listed";
            }
        }
    }
}
</script>


