//active navigation bar
const currentLocation = location.href;
const menuItem= document.querySelectorAll('a');
const menuLength = menuItem.length
for(let i=0;i<menuLength;i++){
    if(menuItem[i].href ===currentLocation){
        menuItem[i].parentNode.className ="active"
    }
}
//dropdownmenüs
$(document).ready(function () {
    $('.group').hide();
    $('#option1').show();
    $('#dropdown1').change(function () {
      $('.group').hide();
      $('#'+$(this).val()).show();
    })
  });
  
  $(document).ready(function () {
    $('.Funktion').hide();
    $('#lagerplatz-anlegen').show();
    $('#dropdownlagerplaetze').change(function () {
      $('.Funktion').hide();
      $('#'+$(this).val()).show();
    })
  });

 /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "30%";
  document.getElementById("main").style.marginLeft = "30%";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
  
//
//sidebarbutton
function togglesidebar(){

  var x = document.getElementById("idsidebar");
  var btn = document.getElementById("sidebarbtn");

  if (x.classList.contains("activesb")) {
    x.classList.remove("activesb");
    btn.className = "sidebarbutton";
    btn.innerHTML=">";
  } 
  else {
    x.classList.add("activesb");
    btn.className+= " activebtn";
    btn.innerHTML="<";
  }
}