
let _createHeader = function(token){
  return {
    headers: {
      'X-CSRF-TOKEN': token
    }
  };
};

let _getTask = function(id, success){
  
  axios.get('/api/task/' + id).then(function (response) {
    success(response.data);
  })
  .catch(function(error){
    console.log(error);
  });
};

let _getTasks = function(success){
  
  axios.get('/api/task/').then(function (response) {
    success(response.data);
  })
  .catch(function(error){
    console.log(error);
  });
};

let _postTask = function(token, title, body, success){
  
  var config = _createHeader(token);
    
  axios.post("/api/task/" + id, {
    title: title,
    body: body
  }, config).then(function (response) {
    if(response.status == 200){
      success(response.data);
    }
  })
  .catch(function (error) {
    console.log(error);
  });
}

let _putTask = function(token, id, title, body, success){
  
  var config = _createHeader(token);
      
  axios.put("/api/task/" + id, {
    title: title,
    body: body
  }, config).then(function (response) {
    if(response.status == 200){
      success(response.data);
    }
  })
  .catch(function (error) {
    console.log(error);
  });
};

let _completeTask = function(token, id, success){
  var config = _createHeader(token);
      
  axios.put("/api/task/complete/" + id, {}, config)
  .then(function (response) {
    if(response.status == 200){
      success(response.data);
    }
  })
  .catch(function (error) {
    console.log(error);
  });
};

let _uncompleteTask = function(token, id, success){
  var config = _createHeader(token);
      
  axios.put("/api/task/uncomplete/" + id, {}, config)
  .then(function (response) {
    if(response.status == 200){
      success(response.data);
    }
  })
  .catch(function (error) {
    console.log(error);
  });
};

let _deleteTask = function(token, id, success){ 
  var config = _createHeader(token);
      
  axios.delete("/api/task/" + id, config).then(function (response) {
    if(response.status == 200){
      success(response.data);
    }
  })
  .catch(function (error) {
    console.log(error);
  });
};

export default {
  
  createHeader: _createHeader,
  //R.E.S.T.
  getTasks: _getTasks,
  getTask: _getTask,
  postTask: _postTask,
  putTask: _putTask,
  deleteTask: _deleteTask,
  completeTask: _completeTask,
  uncompleteTask: _uncompleteTask,
};