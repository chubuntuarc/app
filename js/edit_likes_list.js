//Function to run ajax that changes the likes values for current user
function edit_likes_list(value){
var params = {
        "value" : value.id,
        "selected" : value.getAttribute("selected"),
        "user"  : value.getAttribute("user")
};

$.ajax({
        data:  params, //Data to sent through ajax
        url:   'data/process/change_likes.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        dataType:"html",
        asycn:false,
        beforeSend: function () {
                $("#message").html("<img src='../app/images/saving.gif' style='position: absolute;top: 14%;left: 5%;height: 20px;'/>");
        },
        success: function(data){
          //console.log(data);
          location.reload();
        }
});
}