<template id="task-form-template">
  <form id="demo" class="add_task">
    <h1>Add New Task</h1>
    <p>Title: <input class="form-control" v-model="title" type="text" name="title" id="title" placeholder="Title"/></p>
    <p>{{ title }}</p>
    
    <p>Description: <textarea class="form-control" v-bind:class="{}" v-model="description" type="text" name="description" id="description" placeholder="Description"></textarea></p>
    <p>{{ description }}</p>
    
    <p><input type="submit" value="submit" class="form-control btn-primary"/></p>
  </form>
</template>

<style>

</style>

<script>
  export default {
  
  template: '#task-form-template',
  
  data: function(){
    return {
      title: "",
      description: ""
    };
  }
  
};
</script>