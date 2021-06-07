<template>
    <div class="container">
        <div class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Find your dream property</h1>
                    <div class="box">
                        <form @submit.prevent="search">
                            <!-- Property name -->
                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name" class="input" v-model="params.name" placeholder="Property name...">
                            </div>

                            <!-- address -->
                            <div class="field">
                                <label for="address" class="label">Address</label>
                                <input type="text" name="address" id="address" class="input" v-model="params.address" placeholder="Address">
                            </div>

                            <!-- price -->
                            <div class="field">
                                <p class="label">Price</p>
                                <div class="is-flex">
                                    <div class="mr-1">
                                        <input type="number" name="price-min" id="price-min" class="input" v-model="params.priceMin">
                                        <label for="price-min" class="help">Minimum Price</label>
                                    </div>
                                    <div>
                                        <input type="number" name="price-max" id="price-max" class="input" v-model="params.priceMax">
                                        <label for="price-max" class="help">Maximum Price</label>
                                    </div>
                                </div>
                            </div>

                            <!-- bedrooms -->
                            <div class="field">
                                <label for="bedrooms" class="label">Bedrooms</label>
                                <input type="number" name="bedrooms" id="bedrooms" class="input" v-model="params.bedrooms">
                            </div>

                            <!-- bathrooms -->
                            <div class="field">
                                <label for="bathrooms" class="label">Bathrooms</label>
                                <input type="number" name="bathrooms" id="bathrooms" class="input" v-model="params.bathrooms">
                            </div>

                            <!-- garages -->
                            <div class="field">
                                <label for="garages" class="label">Garages</label>
                                <input type="number" name="garages" id="garages" class="input" v-model="params.garages">
                            </div>

                            <!-- Submit -->
                            <div class="field">
                                <button type="submit" :class="{ button: true, 'is-info': true, 'is-loading': loading }">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <list-properties :properties="sortFeatured" :loading="loading" :loaded="loaded" ></list-properties>
    </div>
</template>

<script>
import ListProperties from './ListProperties.vue';

export default {
    data() {
        return {
            properties: [],
            loading: false,
            loaded: false,
            params: {
                name: null,
                address: null,
                priceMin: null,
                priceMax: null,
                bedrooms: null,
                bathrooms:null,
                garages: null
            },
        }
    },
    computed: {
        sortFeatured: function () {
            var featured = this.properties.filter(el => {
                return el.featured;
            });
            var notFeatured = this.properties.filter(el => {
                return !el.featured;
            });
            return featured.concat(notFeatured);
        }
    },
    components: {
        ListProperties
    },

    methods: {
      search() {
            this.loading = true;
            axios.get('api/properties', {
                params: this.params
            })
            .then(response => {
                this.properties = response ? response.data : [];
            })
            .catch((error) => {
                console.log(error)
            }).finally(() => {
                this.loading = false;
                this.loaded = true;
            });
        },
  }
}
</script>
