<template id="task-form-template">
  <form v-on:submit="handleSubmit" :method="formMethod" :action="formAction" id="demo" class="add_task">
    <p>Title: <input class="form-control" v-model="title" type="text" name="title" id="title" placeholder="Title"/></p>
    <p>Description: <textarea class="form-control" v-bind:class="{}" v-model="description" type="text" name="description" id="description" placeholder="Description"></textarea></p>
    
    <h2>Preview</h2>
    <div class="list-group-item">
      
      <h2>Title: {{ title }}</h2>
      <p>Description: {{ description }}</p>
      <small><p class="pull-right updated_at">Last Updated: {{ task.updated_at }}</p></small>
      <p>
        <button class="btn-primary">Edit</button>
        <button class="btn-primary">Delete</button>
        <button class="btn-primary">Mark as Complete</button>
      </p>
    </div>
    
    <span v-html="csrf"></span>
    
    <p><input type="submit" value="submit" class="form-control btn-primary"/></p>
  </form>
</template>

<style scoped>
  .list-group-item{
    margin-bottom: 10px;
  }
</style>

<script>

  import HTTP from '../HTTP';
  
  export default {
    
    template: '#task-form-template',
    props: ['csrf', 'task', 'action'],
    mixins: [ HTTP ],
    
    data: function(){
      return {
        id: "",
        title: "",
        description: "",
        prevent: ""
      };
    },
    
    created: function() {
    	this.csrf = this.csrf;
      this.preview = this.preview;
      
      if(this.task){
        let t = JSON.parse(this.task);
        this.id = t.id;
        this.title = t.title;
        this.description = t.body;
      }
    },
    
    mounted: function(){
            
      document.querySelector('.updated_at').innerHTML = "Last Updated: " + new Date().toUTCString();
    },
    
    methods: {
      
      handleSubmit: function(event){
        if(this.action == "POST"){
          
        }else if(this.action == "PUT"){
          event.preventDefault();
          
          let token = document.getElementsByName("_token")[0].value;
          
          this.updateTask(token, this.id, this.title, this.description, function(data){
            console.log(data);
          });
        }
      },
      
      getTask: HTTP.getTask,
      updateTask: HTTP.putTask,
      deleteTask: HTTP.deleteTask,
    },
      
    computed: {
      
      formAction: function(){
        
        //Caching Type
        var action = this.action;
        
        if(action == 'PUT'){
          return '/edit';
        }else if(action == 'POST'){
          return '/add';
        }
        
        return "";
      },
      
      formMethod: function(){
        return this.action;
      }
    }
  };
</script>