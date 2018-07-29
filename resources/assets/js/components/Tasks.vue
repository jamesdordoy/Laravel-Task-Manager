<template id="tasks-template">
  <div class="tasks-container">
    <h1>Tasks</h1>
    <ul class="list-group">
      <confirm ref="confirmation" type="info">
        Are you sure you want to take this action?
      </confirm>
      <li class="list-group-item" v-for="task in list" :key="task.id">
        <task
          :live="true"
          :task="task"/>
      </li>
    </ul>
  </div>
</template>

<style>
  .tasks-container{
    margin-top:20px;
  }
</style>

<script>

  import Confirm from './ConfirmDialog';

  export default {

    props: ['json'],
    
    components: {
      confirm: Confirm
    },
    
    data: function(){
      return {
        list: "",
      };
    },
    
    created: function(){
    	this.list = this.json;
    },
    
    methods: {
      
      complete : function(id, event){
        
        let self = this;
        let confirmation = this.$refs.confirmation;
        
        confirmation.show(function(){

          self.completeTask($('meta[name="csrf-token"]').attr('content'), id, 
            (data)=>{

                let item = self.getItem(id);
                
                item.completed = data.completed;
                item.updated_at = data.updated_at;
                
                confirmation.hide();
                self.updateItem(item);           
              }
          );
        }); 
      },
      
      uncomplete : function(id, event){
        
        let self = this;
        let confirmation = this.$refs.confirmation;
        
        confirmation.show(function(){

          self.uncompleteTask($('meta[name="csrf-token"]').attr('content'), id, 
            (data)=>{
            
              
                let item = self.getItem(id);
                
                item.completed = data.completed;
                item.updated_at = data.updated_at;
                
                confirmation.hide();
                self.updateItem(item);
              }  
          );
        });
      },
      
      remove : function(id, event){
        
        let self = this;
        let confirmation = this.$refs.confirmation;
        
        confirmation.show(function(){
          
          self.deleteTask($('meta[name="csrf-token"]').attr('content'), id, 
            (data)=>{
              confirmation.hide();
              self.removeItem(id);
            }
          );
        });
      },
      
      getItem: function(id){
        
        for(var i = 0; i < this.list.length; i++){
          if(this.list[i].id == id){
            return this.list[i];
          }
        }
        
        return null;
      },
      
      getItemIndex: function(item){
        for(var i = 0; i < this.list.length; i++){
          if(this.list[i].id == item.id){
            return i;
          }
        }
        
        return null;
      },
      
      removeItem: function(id){
        
        let item = this.getItem(id);
        
        this.list.splice(this.getItemIndex(item), 1);
      },
      
      updateItem: function(item){
        for(var i = 0; i < this.list.length; i++){
          if(this.list[i].id == item.id){
            this.list[i] = item;
            
            return;
          }
        }
      },
    }
  };
</script>