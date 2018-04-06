//Function to run ajax that delete elements from shopping list
function delete_from_shopping_list(value){
var params = {
        "value" : value.value,
        "list"  : value.getAttribute("list")
};

$.ajax({
        data:  params, //Data to sent through ajax
        url:   'data/process/delete_from_shopping_list.php', //archivo que recibe la peticion
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