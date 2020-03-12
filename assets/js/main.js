

// dropdown dekstop
$(document).ready(function () {
    $('.dropdown-toggle').dropdown();
});

$("li.dropdown").click(function(e){
$(this).toggleClass("open");
});


// dropdown mobile
$(".navbar-toggler").click(function(){
    $(".collapse").collapse('toggle');
});


// ===== Scroll to Top ==== 
$(window).scroll(function() {
  if ($(this).scrollTop() >= 50) {        
      $('#return-to-top').fadeIn(200);   
  } else {
      $('#return-to-top').fadeOut(200); 
  }
});
$('#return-to-top').click(function() {      
  $('body,html').animate({
      scrollTop : 0                       
  }, 500);
});