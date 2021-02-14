import ListVisitor from './components/ListVisitor.vue';
import AddVisitor from './components/AddVisitor.vue';
 
export const routes = [
    {
        name: 'visitor-list',
        path: '/visitor-list',
        component: ListVisitor
    },
    {
        name: 'visitor-add',
        path: '/visitor-add',
        component: AddVisitor
    }
];