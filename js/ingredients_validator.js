var total = 0;
var selected = 0;
var validator = 0;
//Checboxes validation
$( document ).ready(function() {
   //Total checkboxes
  total_ingedients();
  //Check completed ingredients on list
  count_checks();
});

//Function to calculate total ingredients list number
function total_ingedients(){
 var checkboxes = document.getElementById("ingedient_list").getElementsByClassName('ingredient');
  
for (var x=0; x < checkboxes.length; x++) {
 if (checkboxes[x]) {
  total = total + 1;
 }
}
}

//Function to count total ingredients ready to work
function count_checks(){
  var checkboxes = document.getElementById("ingedient_list").getElementsByClassName('ingredient');
  var status = document.getElementById("ingedient_list").status;
 var cont = 0; 
  for (var x=0; x < checkboxes.length; x++) {
   if (!checkboxes[x].checked) {
    cont = cont + 1;
   }
  }
  selected = cont;
  validator = total - selected;
  if(validator == total){
    $('#get_ingredients').text('A cocinar');
    $("#list_status").val("1");
  }else{
    $('#get_ingredients').text('Lista de compras');
    $("#list_status").val("0");
  }
 }