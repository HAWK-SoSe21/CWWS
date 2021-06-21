//active navigation
  const currentLocation = location.href;
  const menuItem= document.querySelectorAll('a');
  const menuLength = menuItem.length
  for(let i=0;i<menuLength;i++){
    if( currentLocation.includes(menuItem[i].href)){
        menuItem[i].parentNode.className ="active"
    }
    else{
        menuItem[i].parentNode.classList.remove ="active"
    }
  }


//dropdownmenüs
$(document).ready(function () {
    
  $('.actionwindow').hide();

  $('#bearbeiten').show();
    
  $('#dropdown1').change(function () {
    
    $('.actionwindow').hide();
    
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
  var btn = document.getElementById("idsidebarbutton");

  if (x.classList.contains("active")) {
    x.classList.remove("active");
    btn.className = "sidebarbutton";
    btn.innerHTML=">";
  } 
  else {
    x.classList.add("active");
    btn.className+= " active";
    btn.innerHTML="<";
  }
}