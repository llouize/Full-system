$(document).ready(function() {
   $(window).scroll(function() {
      if($(this).scrollTop() > 100) {
          $('.myBtn').fadeIn();
      }else {
          $('.myBtn').fadeOut();
      } 
   });
    
    $('.myBtn').click(function() {
       $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
});