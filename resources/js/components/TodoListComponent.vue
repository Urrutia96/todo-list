<template>
    <div>
        <form ref="form" @submit.prevent="guardar">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">NUEVO</h1>
                    <p class="lead text-muted">
                        <input type="text" name=""  v-model="todo" class="form-control" id="">
                    </p>
                    <p>
                        <button type="submit" class="btn btn-primary my-2">AGREGAR</button>            
                    </p>
                </div>
            </section>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h3 class="text-center">Pendientes</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Todo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="! td.ready" v-for="td in todos" :key="td.id">
                                <th scope="row">{{ td.id }}</th>
                                <td>{{ td.todo }}</td>
                                <td><button @click="markAsReady(td.id)">Hecho</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm">
                    <h3 class="text-center">Hechos</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Todo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="td.ready" v-for="td in todos" :key="td.id">
                                <th scope="row">{{ td.id }}</th>
                                <td>{{ td.todo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</template>
 
<script>
    export default{
        data(){
            return {
                todo:'',
                todos:''
            }
        },
        created() {
            this.getTodos();
        },
        methods: {
            getTodos: function(){
                axios.get('/api/todos').then(response=>{
                    this.todos= response.data.data;
                });
            },
            guardar: function(){
                if(this.todo === ''){
                    return null;
                }
                axios({
                    method: "post",
                    url: "/api/todos/new",
                    data:{
                        todo: this.todo
                    },
		            headers:{'Accept':'application/json'}
                }).then(response=>{
                    this.todos.push({todo:response.data.todo.todo, ready : response.data.todo.ready,id: response.data.todo.id});
                });
                this.todo = "";
            },
            markAsReady: function(e) {
                axios.get("/api/todos/"+this.todos[e-1].id+"/ready").then(response =>{
                    this.todos[e-1].ready = true;
                    //this.todos.find(hecho => hecho.id === id) = {todo:response.data.todo.todo, ready : response.data.todo.ready,id: response.data.todo.id} ;
                });
            }
        }
    }
</script>
 
