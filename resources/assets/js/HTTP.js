export default {
  
  getTasks: function(){ 
  
  },
  getTask: function(id){
    
    axios.get('/api/task/' + id).then(function (response) {
      
      console.log(response.status);
    })
    .catch(function(error){
      
      console.log(error);
    });
  },
  post: function(title, body){ 
    
  },
  put: function(){ 
    
  },
  delete: function(){ 
    
  },
  
};