import Vue from 'vue';
import Router from 'vue-router';



//use vue-router
Vue.use(Router);


//import components
import NotFound from './pages/NotFound';
import Index from './pages/Index';
import Task from './pages/Task';


//list routes
const routes = [
    {path: '/',component: Index},
    {path: '/tasks',component: Task},


    //404
    { path:'*',component:NotFound}
];


//create router

export const router = new Router({
    routes
})
