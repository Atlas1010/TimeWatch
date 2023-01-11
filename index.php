<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title></title>
	</head>
<body onload='al()'>

<h1 >Welcome to the Tickets Manager!</h1>
<!--זה ב"ה יעבוד-->

<form autocomplete="off" action="/TaskManager/index.php">
  <div class="autocomplete" style="width:300px;">
    <input id="UserName" type="text" name="UserName" placeholder="UserName">
	<input id="TicketId" type="text" name="TicketId" placeholder="TicketId">
	<input id="Subject" type="text" name="Subject" placeholder="Subject">
	<input id="TicketDate" type="text" name="TicketDate" placeholder="TicketDate">
 
  
  </div>
</form>
</br></br>
<div onclick="al()" class="Search"> Search </div>
</br></br></br></br>
<!--זה עובד-->
<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/TaskManager/api.php');
?>


<div style="height:400px;overflow: scroll;border: 2px solid;" dir="ltr" id="scroll" class="scroll" >
<table id="feedback">
<tr>
      <th >TicketId</th>
      <th >UserName</th>
      <th >TicketDate</th>
      <th >Subject</th>
	  <th >Details</th>
    </tr>
</br>

</table>
</div>
<script>
  var send=[];
flag=0;
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
          
           send.push(inp.id); send.push(inp.value);
          
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var countries3 =<?php echo json_encode($dateArray);    ?>

/*An array containing all the country names in the world:*/
var countries =<?php echo json_encode($userArray);    ?>// ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

var countries2 =<?php echo json_encode($subArray);    ?>

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

var ID=<?php echo json_encode($id);    ?>

autocomplete(document.getElementById("TicketId"), ID);
autocomplete(document.getElementById("UserName"), countries);
autocomplete(document.getElementById("Subject"), countries2);
autocomplete(document.getElementById("TicketDate"), countries3);
var i=0;
function al(){
  document.getElementById("TicketId").value=''
  document.getElementById("UserName").value=''
  document.getElementById("Subject").value=''
  document.getElementById("TicketDate").value=''

  i++;
loadContent(send,i);
send=[];
}
//!!!!!!!


function loadContent(selected,i){
  if(selected!=''|| flag==1)
  document.getElementById("rem").remove()
var feedback =   document.getElementById("feedback");

var getContent = selected.toString();
 console.log('content'+getContent);
//post

$.post('/TaskManager/api.php', {input : getContent} , function(data) {
  getContent='' 
var a=data.split(';');
console.log(a);
      var tableBody = document.createElement('TBODY');
      tableBody.setAttribute('id', 'rem');
      feedback.appendChild(tableBody);
      var s=0;  
      for (var i=0; i<((a.length/5)-1); i++){
         var tr = document.createElement('TR');
         tableBody.appendChild(tr);
         
         for (var j=0; j<5; j++){
             var td = document.createElement('TD');
             td.width='75';
              if(j==1){
                var w = document.createElement('A');  
               w.href = "customerTickets.php?UserName="+a[j+s];
               w.text=a[j+s]
               td.appendChild(w);
 
          }
          else{
                   td.appendChild(document.createTextNode(a[j+s])); 
          }
     
             tr.appendChild(td);
         }
         s+=5;
      }
console.log(data);
});
flag=1;
}
/////////
///$('#scroll').scroll( function() {
 // alert(this)
  // if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
    //   alert('end reached');
 //  }
//});
$(document).ready(function() {
    $('#scroll').DataTable( {
        "scrollX": true
    } );
} );
///////////
</script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>
