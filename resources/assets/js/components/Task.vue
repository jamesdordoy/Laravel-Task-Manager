<template id="tasks-template">
  <div>
    <h2>Title: {{ task.title }}</h2>
    <p>Description: {{ task.body }}</p>
    <small><p class="pull-right">Last Updated: {{ task.updated_at }}</p></small>
    <h4 class="top-right complete" v-show="task.completed">Task Complete</h4>
    <h4 class="top-right uncomplete" v-show="!task.completed">Task Not Complete</h4>

    <p>Assigned To: {{ task.user ? task.user.name : '' }}</p>
    <button class="btn btn-primary"><a :href="'/edit/' + task.id">Edit</a></button>
    <button v-on:click="remove(task.id)" class="btn btn-primary">Delete</button>
    <button v-on:click="complete(task.id)" v-show="!task.completed" class="btn btn-primary">Mark as Complete</button>
    <button v-on:click="uncomplete(task.id)" v-show="task.completed" class="btn btn-primary">Mark as Not Complete</button>
  </div>
</template>

<style scoped>
a {
  color: #fff !important;
}

.btn-primary{
    margin-right: 5px;
  }
  
  .list-group-item{
    position: relative;
  }
  
  .list-group-item:hover{
    background: #eee;
  }
  
  .btn-primary a{
    color:#fff;
    text-decoration: none;
  }
  
  .top-right{
    position: absolute;
    top: 20px;
    right: 20px;
  }
  
  .complete{
    color:#00ffff;
  }
  
  .uncomplete{
    color:#ff0000;
  }
</style>

<script>
  import HTTP from '../http/HTTP';

  export default {
    props: {
      task: {
        type: Object,
        default: () => {},
      },
      live: {
        type: Boolean,
        default: () => false
      },
    },
    data:  function(){
      return {
        id: "",
        title: "",
        description: "",
        prevent: ""
      }
    },
    created: function(){
    	
    },
    computed: {

    },
    methods: {
      deleteTask: HTTP.deleteTask,
      completeTask: HTTP.completeTask,
      uncompleteTask: HTTP.uncompleteTask,
    }
  };
</script>