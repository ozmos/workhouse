import ListProperties from './components/ListProperties.vue';
import SearchProperties from './components/SearchProperties.vue';

export const routes = [
    {
        name: 'list',
        path: '/list',
        component: ListProperties
    },
    {
        name: 'search',
        path: '/:terms',
        component: SearchProperties
    }
]
