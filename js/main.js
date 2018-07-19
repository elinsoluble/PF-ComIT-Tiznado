// CAROUSEL
$(document).ready(function(){
  /*$('.carousel').carousel({
  });

  setInterval(function(){
    $('.carousel').carousel('next');
    },4000);*/
    $('.parallax').parallax();
    $('.carousel').carousel();
    $('.modal').modal();
    
    setInterval(function(){
      $('.carousel').carousel('next');
    }, 4000);

    $('#salir').click(function(){
      $.post('php/logout.php');
    }); 

    $(window).scroll(function(){
      scrollissimo.knock();
    });
});

var animation = new TimelineLite();

animation.fromTo(["#p1, #p2, #p3"], 400, {opacity:0},{opacity:1})
.fromTo(["#p1, #p2, #p3"], 400 * 0.75, {opacity:0}, {opacity:1}, 0)
.to(["#p1, #p2, #p3"], 400, {opacity:0}, 400 * 0.75);

scrollissimo.add(animation, 0, 25);