
<template id="alert-template">
  <div v-show="display" :class="alertClasses" class="alert-dismissable">
    <slot></slot>
    <button v-on:click="decline" class="btn-primary">Decline</button>
    <button v-on:click="confirm" class="btn-primary" >Confirm</button>
  </div>
</template>

<style scoped>
  .alert{
    margin:50px 0;
  }
  
  .btn-primary{
    float: right;
  }
</style>

<script>
  export default {
    
    template: '#alert-template',
    
    props: ['type'],
    
    data: function(){
      return {
        display: false,
        callback: ""
      };
    },
    
    methods: {
      
      hide: function(){
        this.display = false;
      },
      
      show: function(callback){
        this.display = true;
        this.callback = callback;
      },
      
      confirm: function(){
        this.callback();
      },
      
      decline: function(){
        this.hide();
      }
    },
    
    computed: {
      
      alertClasses: function(){
        
        //Caching Type
        var type = this.type;
        
        //Return CSS Classes
        return {
          'alert': true,
          'alert-success' : type == 'success',
          'alert-danger' : type == 'error',
          'alert-info' : type == 'info',
        }
      }
    }
  };
</script>