
$(window).scroll(function() {    
var scroll = $(window).scrollTop();

if (scroll >= 200) {
    $(".menu-section").addClass("fixed-top");
} else {
    $(".menu-section").removeClass("fixed-top");
}
}); 






//MENU DROPDOWN
     $(document).ready(function () {
$('.navbar .dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    });
});


//BACK TO TOP
      $(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});



(function($){
    $('.product-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:2
          },
  
          600:{
              items:3
          },
  
          840:{
              items:3
          },

          991:{
              items:5
          },

          1000:{
              items:7
          }
      }
    });

})(jQuery);



(function($){
    $('.room-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:2
          },
  
          600:{
              items:2
          },

          1000:{
              items:3
          }
      }
    });

})(jQuery);

(function($){
    $('.category-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:1
          },
  
          600:{
              items:1
          },

          1000:{
              items:1
          }
      }
    });

})(jQuery);

(function($){
    $('.bank-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:2
          },
  
          600:{
              items:3
          },

          1000:{
              items:5
          }
      }
    });

})(jQuery);



(function($){
    $('.category-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:1
          },
  
          600:{
              items:1
          },

          1000:{
              items:1
          }
      }
    });

})(jQuery);

(function($){
    $('.property-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          450:{
              items:2
          },
  
          600:{
              items:3
          },
  
          840:{
              items:3
          },

          991:{
              items:4
          },

          1000:{
              items:5
          }
      }
    });

})(jQuery);


  (function($){
    $('.listing-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,       
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
  
          600:{
              items:2
          },

          995:{
              items:4
          },

          1000:{
              items:2
          }
      }
    });

})(jQuery);


(function($){
    $('.testi-item').owlCarousel({
      items: 1,
      loop:true,
      margin:10,        
      nav: true,
      dots: true,        
      autoplay:true,
      autoplayTimeout:5000,
      navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],        
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
  
          600:{
              items:1
          },

          1000:{
              items:2
          }
      }
    });

})(jQuery);


//BANNER TAB

 // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
    
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();    
    
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
    
    });
  /* if in drawer mode */
  $(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
    
    $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
    
    $("ul.tabs li").removeClass("active");
    $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
  
  
  /* Extra class "tab_last" 
     to add border to right side
     of last tab */
  $('ul.tabs li').last().addClass("tab_last");
  

//FAQS

$(".set > a").on("click", function() {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this)
      .siblings(".set .content")
      .slideUp(200);
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
  } else {
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
    $(this)
      .find("i")
      .removeClass("fa-plus")
      .addClass("fa-minus");
    $(".set > a").removeClass("active");
    $(this).addClass("active");
    $(".set .content").slideUp(200);
    $(this)
      .siblings(".set .content")
      .slideDown(200);
  }
});

//MOBILE MENU

function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

