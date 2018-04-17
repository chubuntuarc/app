//Function to run ajax that delete elements from inventory list
function delete_from_inventory_list(value){
var params = {
        "value" : value.value,
        "delete": "yes"
};

$.ajax({
        data:  params, //Data to sent through ajax
        url:   'inventory.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        dataType:"html",
        asycn:false,
        beforeSend: function () {
                $("#message").html("<img src='../app/images/saving.gif' style='position: fixed;top: 15%;left: 2%;height: 20px;'/>");
        },
        success: function(data){
          //console.log(data);
          location.reload();
        }
});
}

//Function to run ajax that add elements to inventory list
function add_to_inventory_list(value){
  //Getted values
  var params = {
        "value" : value.value,
        "todo"  : "yes"
  };
  
  //Check if the element already exists
  if(value.getAttribute('array').includes(value.value)){
      alert('Ya existe el ingrediente');
     }
  else{
       $.ajax({
        data:  params, //Data to sent through ajax
        url:   'inventory.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        dataType:"html",
        asycn:false,
        beforeSend: function () {
                $("#message").html("<img src='../app/images/saving.gif' style='position: fixed;top: 15%;left: 2%;height: 20px;'/>");
        },
        success: function(data){
          //console.log(data);
          location.reload();
        }
});
     }
}