<template id="tasks-template">
  <div class="tasks-container">
    <h1>Tasks</h1>
    <ul class="list-group">
      
      <li class="list-group-item" v-for="task in list">
        <h2>Title: {{ task.title }}</h2>
        <p>Description: {{ task.body }}</p>
        <small><p class="pull-right">Last Updated: {{ task.updated_at }}</p></small>
        <p>
          <button class="btn-primary"><a :href=" '/edit/' + task.id">Edit</a></button>
          <button v-on:click="remove" class="btn-primary">Delete</button>
          <button v-on:click="complete" class="btn-primary">Mark as Complete</button>
        </p>
      </li>
    </ul>
  </div>
</template>

<style>
  .tasks-container{
    margin-top:20px;
  }
  
  .btn-primary{
    margin-right: 5px;
    padding: 3px;
  }
  
  .btn-primary a{
    color:#fff;
    text-decoration: none;
  }
</style>

<script>
  export default {
  
    template: '#tasks-template',
    props: ['list'],
    
    methods: {
      complete : function(event){
        alert("complete");
      },
      remove : function(event){
        alert("remove");
      }
    }
  };
</script>