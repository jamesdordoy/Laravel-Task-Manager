
<template id="alert-template">
  <div v-show="show" :class="alertClasses" class="alert-dismissable">
    <a href="#" class="close" @click="show = false" data-dismiss="alert" aria-label="close">&times;</a>
    <slot></slot>
  </div>
</template>

<style>
  .alert{
    margin:50px 0;
  }
</style>

<script>
  export default {
    
    template: '#alert-template',
    
    props: ['type'],
    
    data: function(){
      return {
        show: true
      };
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
        }
      }
    }
  };
</script>