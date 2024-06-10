<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-danger mt-4" v-if="errors.length">
                    <ul class="mb-0">
                        <li v-for="(error,index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <form @submit.prevent="updateTask" novalidate>
                    <fieldset>
                        <div class="form-group">
                            <label class="form-label mt-4">Name</label>
                            <input type="text" class="form-control" v-model="task.name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">Email</label>
                            <input type="text" class="form-control" v-model="task.description" placeholder="Enter Description">
                        </div>
                        <button class="btn btn-primary">Save</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
</template>
<script>
import axios from 'axios';
    export default{
        name:'EditTask',
        data() {
            return{
                task:{},
                name:'',
                description:'',
                errors:{}
            }
        },
        created(){
            this.getTaskById();
        },

        methods:{
            async getTaskById(){
                let url = `http://127.0.0.1:8000/api/get_task/${this.$route.params.id}`;
                await axios.get(url).then(response=>{
                    console.log(response);
                    this.task = response.data; 
                })
            },
            async updateTask() {
                this.errors =[]
                if(!this.task.name){
                    this.errors.push("Name is required")
                }
                if(!this.task.description){
                    this.errors.push("Description is required")
                }

                if(!this.errors.length){
                    let formData = new FormData();
                    formData.append('name',this.task.name)
                    formData.append('description',this.task.description)
                    let url = `http://127.0.0.1:8000/api/update_task/${this.$route.params.id}`;
                    await axios.post(url,formData).then(response=>{
                        console.log(response);
                        if(response.status == 200){
                            alert(response.data.message)
                        }else{
                            console.log('error')
                        }
                        
                    }).catch(error=>{
                        this.errors.push(error.response)
                    })
                }

            }
        },
        mounted: function () {
            console.log("Edit Loaded..")
        }
    }
</script>