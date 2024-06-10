import TaskList from "@/components/TaskList.vue"
import AddTask from "@/components/AddTask.vue"
import EditTask from "@/components/EditTask.vue"
import { createRouter, createWebHistory } from "vue-router"


const routes = [
    {
        name:'TaskList',
        path:'/',
        component: TaskList,
    },
    {
        name:'AddTask',
        path:'/add_task',
        component: AddTask,
    },
    {
        name:'EditTask',
        path:'/task/edit/:id?',
        component: EditTask,
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;