<template id="task-form-template">
  <form method="POST" action="/add" id="demo" class="add_task">
    <p>Title: <input class="form-control" v-model="title" type="text" name="title" id="title" placeholder="Title"/></p>
    <p>Description: <textarea class="form-control" v-bind:class="{}" v-model="description" type="text" name="description" id="description" placeholder="Description"></textarea></p>
    
    <div class="list-group-item">
      <p>Preview</p>
      
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
  export default {
    
    template: '#task-form-template',
    props: ['csrf', 'task', 'action'],
    
    data: function(){
      return {
        title: "",
        description: "",
        updated_at: ""
      };
    },
    
    created: function() {
    	this.csrf = this.csrf;
      this.preview = this.preview;
      
      if(this.task){
        let t = JSON.parse(this.task);
        this.title = t.title;
        this.description = t.body;
      }
    },
    
    mounted: function(){
            
      document.querySelector('.updated_at').innerHTML = "Last Updated: " + new Date().toUTCString();
    },
      
    computed: {
      
      alertActions: function(){
        
        //Caching Type
        var action = this.action;
        
        //Return CSS Classes
        return {
          '/edit' : action == 'edit',
          '/add' : action == 'add',
        }
      }
    }
    
    
  };
</script>