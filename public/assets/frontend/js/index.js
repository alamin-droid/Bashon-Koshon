

  
   
  //////////////////////////////////////////////
  // Activate each slider - change options
  //////////////////////////////////////////////
  $(document).ready(function() {
    
    $("#slider1").sliderResponsive({
    // Using default everything
      // slidePause: 5000,
      // fadeSpeed: 800,
      // autoPlay: "on",
      // showArrows: "off", 
      // hideDots: "off", 
      // hoverZoom: "on", 
      // titleBarTop: "off"
    });
    
    $("#slider2").sliderResponsive({
      fadeSpeed: 300,
      autoPlay: "off",
      showArrows: "on",
      hideDots: "on"
    });
    
    $("#slider3").sliderResponsive({
      hoverZoom: "off",
      hideDots: "on"
    });
    
  }); 
  $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  
    for (var i=0;i<3;i++) {
      next=next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
    }
  });

  // contact from
  const submitBtn = document.querySelector('#submit');

  submitBtn.addEventListener("click", function(event){
    event.preventDefault()
  });

         //reviews slider:
      
var reviewSlideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("footer-reviews-wrapper");
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
    }
    reviewSlideIndex++;
    if (reviewSlideIndex > x.length) {reviewSlideIndex = 1} 
    x[reviewSlideIndex-1].style.display = "block"; 
    setTimeout(carousel, 3000); 
}


$(document).ready(function(){
  $("#testimonial-slider").owlCarousel({
      items:1,
      itemsDesktop:[1000,1],
      itemsDesktopSmall:[979,1],
      itemsTablet:[768,1],
      pagination:false,
      navigation:true,
      navigationText:["",""],
      autoPlay:true
  });
});