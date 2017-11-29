<template id="task-form-template">
  <form v-on:submit="handleSubmit" :method="formMethod" :action="formAction" id="demo" class="add_task">
    <p>Title: <input class="form-control" v-model="title" type="text" name="title" id="title" placeholder="Title"/></p>
    <p>Description: <textarea class="form-control" v-bind:class="{}" v-model="description" type="text" name="description" id="description" placeholder="Description"></textarea></p>
    
    <h2>Preview</h2>
    <div class="list-group-item">
      
      <h2>Title: {{ title }}</h2>
      <p>Description: {{ description }}</p>
      <small><p class="pull-right updated_at">Last Updated: {{ task.updated_at }}</p></small>
      <h4 class="top-right uncomplete">Task Not Complete</h4>
      <p>
        <button class="btn-primary">Edit</button>
        <button class="btn-primary">Delete</button>
        <button class="btn-primary">Mark as Complete</button>
      </p>
    </div>
    
    <p><input type="submit" value="Submit" class="form-control btn-primary"/></p>
    <p><button v-on:click.prevent="remove(task.id)" v-show="action == 'PUT' ? true : false" class="form-control btn-primary">Delete</button></p>
  
  </form>
</template>

<style scoped>
  .list-group-item{
    margin-bottom: 10px;
  }
  
  .top-right{
    position: absolute;
    top: 20px;
    right: 20px;
  }
  
  .uncomplete{
    color:#ff0000;
  }
</style>

<script>

  import HTTP from '../HTTP';
  
  let data = ()=>{
    return {
      id: "",
      title: "",
      description: "",
      prevent: ""
    };
  }
  
  export default {
    
    template: '#task-form-template',
    
    data: data,
    
    props: ['task', 'action'],
    mixins: [ HTTP ],
    
    created: function(){
    	this.csrf = $('meta[name="csrf-token"]').attr('content');
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
      
      getTask: HTTP.getTask,
      updateTask: HTTP.putTask,
      deleteTask: HTTP.deleteTask,
      
      handleSubmit: function(event){
        if(this.action == "POST"){
          
        }else if(this.action == "PUT"){
          event.preventDefault();
          
          this.updateTask(this.csrf, 
                          this.id, 
                          this.title, 
                          this.description, 
                          function(data){
                            window.location.href = "/";
                          });
        }
      },
      
      remove: function(id){
        this.deleteTask(this.csrf, 
                        this.id,
                        function(data){
                          window.location.href = "/";
                        });
      },
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
      
      formMethod: function(){ return this.action; }
    }
  };
</script>