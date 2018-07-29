<template id="task-form-template">
  
  <div class="row">
      
    <div class="col-md-5">
      <h2>Create a new task</h2>
      <form v-on:submit="handleSubmit" :method="formMethod" :action="formAction" id="demo" class="add_task">
        <input type="hidden" name="_token" id="csrf-token" v-model="csrf"/>
        <div class="form-group">
          <label for="title">Title:</label>
          <input class="form-control" v-model="title" type="text" name="title" id="title" placeholder="Title"/>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" v-model="body" rows="5" type="text" name="description" id="description" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
          <label for="description">Assigned To:</label>
          <select name="assigned_id" v-model="user_id" class="form-control">
            <option value="0">Select a User</option>
            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
          </select>
        </div>
        <input type="submit" value="Submit" class="form-control btn-primary"/>
        <button
          v-on:click.prevent="remove(task.id)"
          v-show="action == 'PUT' ? true : false"
          class="form-control btn-primary">
          Delete
        </button>
      </form>
    </div>
    <div class="col-md-7">
      <h2>Live Preview</h2>
      <ul class="list-group">
        <li class="list-group-item">
          <task
          :live="false"
          :task="{
            'id': 0,
            'title': this.title,
            'body': this.description,
            'completed': false,
            'user': findAssigned,
            'created_at': moment,
            'updated_at': moment,
          }"/>
        </li>
      </ul>
    </div>
  </div>
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

  import HTTP from '../http/HTTP';
  
  export default {

    data: function() {
      return {
        id: "",
        title: "",
        description: "",
        user_id: 0,
        assigned: {},
        prevent: ""
      };
    },
    mixins: [ HTTP ],
    props: {
      users: {
        type: Array,
        default() {
          return [];
        }
      },
      task: {
        type: Object,
        default() {
          return {};
        }
      },
      action: {
        type: String,
        default() {
          return [];
        }
      },
    },
    created: function(){
      this.preview = this.preview;
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
      csrf: () => $('meta[name="csrf-token"]').attr('content'),
      moment: () => window.moment(),
      findAssigned: function(){ return this.users.find(user => user.id == this.user_id) },
      formMethod: function() { return this.action }
    }
  };
</script>