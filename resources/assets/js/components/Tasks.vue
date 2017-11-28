<template id="tasks-template">
  <div class="tasks-container">
    <h1>Tasks</h1>
    <ul class="list-group">
      
      <li class="list-group-item" v-for="task in list">
        <h2>{{ task.title }}</h2>
        <p>{{ task.body }}</p>
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
  export default {
  
    template: '#tasks-template',
    props: ['list']
  };
</script>