$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('#features');
   var offset = startchange.offset();
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top -120) {
          $('.navbar-default').css('background-color', 'rgba(34,34,34,0.9)');
       }
      else if(scroll_start == 0) {
          $('.navbar-default').css('background-color', '#4e5d6c');
       }
   });
});