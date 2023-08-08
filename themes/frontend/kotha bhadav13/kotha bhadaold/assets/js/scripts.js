
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });  
  var swiper = new Swiper(".destSlider", {
    slidesPerView: 1,
    spaceBetween: 10,
    freeMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  }); 
  var swiper = new Swiper("#reviewSlider", {
    slidesPerView: 1,
    spaceBetween: 10,
    freeMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
    },
  }); 
  //-----JS for Price Range slider-----


//tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

(function(){
  /*
   * IDEAS FOR THE FUTURE:
   * - Add data-title attribute to add overlay with title [optional]
   * - 
   */
  
  /********************************************************************
  ************************** MAIN VARIABLES ***************************
  *********************************************************************/
  var youtube = document.querySelectorAll('.yt-lazyload'),
  
      youtube_observer,                                               //Intersection Observer API
      
      template_wrap,
      template_content,
      template_playbtn,
      template_logo,
      template_iframe,
      
      settings_observer_rootMargin    = '200px 0px',                  //Intersection Observer API option - rootMargin (Y, X)
      settings_thumb_base_url         = 'https://i.ytimg.com/vi/',     //Base URL where thumbnails are stored
      settings_thumb_extension        = 'webp';                       //Thumbnail extension
      
  
  
  /********************************************************************
  ************************ IF ELEMENTS EXIST **************************
  *********************************************************************/
  if(youtube.length > 0){
      
      //create elements
      template_wrap       = document.createElement('div');
      template_content    = document.createElement('div');
      template_playbtn    = document.createElement('div');
      template_logo       = document.createElement('a');
      template_iframe     = document.createElement('iframe');
      
      //set attributes
      template_wrap.classList.add('yt-lazyload-wrap');
      template_content.classList.add('yt-lazyload-content');
      
      template_playbtn.classList.add('yt-lazyload-playbtn');
      
      template_logo.classList.add('yt-lazyload-logo');
      template_logo.target = '_blank';
      template_logo.rel    = 'noreferrer';
      
      template_iframe.setAttribute('allow','accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture');
      template_iframe.setAttribute('allowfullscreen','');
      
      
      /********************************************************************
      ********************* INTERSECTION OBSERVER API *********************
      *********************************************************************/
      youtube_observer = new IntersectionObserver(function(elements){
      
          elements.forEach(function(e){
              
              //VARIABLES
              var this_element    = e.target,
                  
                  this_wrap,
                  this_content,
                  this_playbtn,
                  this_logo,
                  this_iframe,
                  
                  this_data_id    = e.target.dataset.id,
                  this_data_thumb = e.target.dataset.thumb,
                  this_data_logo  = e.target.dataset.logo;
              
              
              //if element appears in viewport
              if(e.isIntersecting === true){
                  
                  //wrap
                  this_wrap = template_wrap.cloneNode();
                  this_element.append(this_wrap);
                  
                  //content
                  this_content = template_content.cloneNode();
                  this_wrap.append(this_content);
                  
                  //background-image
                  var imgName = '/hq720.jpg';
                  this_content.style.setProperty('--yt-lazyload-img','url("' + settings_thumb_base_url + this_data_id +  imgName + '")');
                  
                  //play btn
                  this_playbtn = template_playbtn.cloneNode();
                  this_content.append(this_playbtn);
                  
                  //logo link
                  if(this_data_logo !== '0'){
                      this_logo       = template_logo.cloneNode();
                      this_logo.href  = 'https://youtu.be/' + this_data_id;
                      this_content.append(this_logo);
                  }
                  
                  //onclick create iframe
                  this_playbtn.addEventListener('click',function(){
                      this_iframe     = template_iframe.cloneNode();
                      this_iframe.src = 'https://www.youtube.com/embed/' + this_data_id + '?autoplay=1';
                      this_content.append(this_iframe);
                  });
                  
                  //Unobserve after image lazyloaded
                  youtube_observer.unobserve(this_element);
                  
                  //LOG
                  //console.log('DONE - ' + this_data_id);
              }
              
          });
          
      },{
          rootMargin: settings_observer_rootMargin,
      });
      
      
      /********************************************************************
      ********************* ITERATE THROUGH ELEMENTS **********************
      *********************************************************************/
      youtube.forEach(function(e){
          
          //Intersection Observer API - observe elements
          youtube_observer.observe(e);
          
      });
  }
})();

//code for profile picture on dashbaord
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#profileImage').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
function checkPasswordMatch() {
  var password = $("#txtNewPassword").val();
  var confirmPassword = $("#txtConfirmPassword").val();

  if (password !== confirmPassword)
      $(".registrationFormAlert").html("<i class='fa-solid fa-circle-xmark'></i>");
  else
      $(".registrationFormAlert").html("<i class='fa-solid fa-circle-check'></i>");
}
//multiple location
$(document).on('click','.a',function(){
  $('.append-locations').append('<div class="customForm"><input type="text" placeholder="Add Here"><a class="remove"><i class="fas fa-trash"></i></a></div>');
});
$(document).on('click','.remove',function(){
  $(this).parent().remove();
  //append in serach box
});
$('.ss-main .ss-multi-selected .ss-values .ss-disabled').html("Search for Location");
//category slider
const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});