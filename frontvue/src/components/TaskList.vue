<template>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody v-for="task in tasks" :key="task.id">
                <tr class="table-secondary">
                    <th scope="row">{{ task.id }}</th>
                    <th scope="row">{{ task.name }}</th>
                    <th scope="row">{{ task.description }}</th>
                    <th scope="row" @click.prevent="deleteTask(task.id)"><button class="btn btn-danger btn-sm">Delete</button></th>
                    <th scope="row" ><router-link  class="btn btn-primary" :to="{ name:'EditTask',params: {id: task.id}}">Edit</router-link></th>


                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'axios';
    export default{
        name:'TaskList',
        data() {
            return {
                tasks:Array
            }
        },
        created() {
            this.getTasks();
        },
        methods: {
            async getTasks() {
                let url = 'http://127.0.0.1:8000/api/tasks';
                await axios.get(url).then(response =>{
                    this.tasks =response.data.tasks;
                    console.log(this.tasks);
                }).catch(error =>{
                    console.log(error);
                })
            },
            async deleteTask(id){
                let url = `http://127.0.0.1:8000/api/delete_task/${id}`;
                await axios.delete(url).then(response=>{
                    if(response.data.code ==200){
                        alert(response.data.message)
                        this.getTasks();
                    }
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        mounted() {
            console.log('Task List mounted')
        }
    }
</script>