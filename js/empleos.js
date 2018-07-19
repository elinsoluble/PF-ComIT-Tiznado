$(document).ready(function(){
    $('.collapsible').collapsible();

    $(".collapsible-header").click(function(){
      $(":first-child",this).toggleClass("animated bounceIn").toggleClass("");
    });

    $('.modal').modal();

    $('form').submit(function (e) {
      var form = this;
      e.preventDefault();
      setTimeout(function () {
          form.submit();
      }, 1500);

      postulacion_aceptada();
    });

    $("#sticker").sticky(
      {topSpacing:20
    });
});

function postulacion_aceptada(){
  const toast = swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 4000
  });

  toast({
    type: 'success',
    title: 'Postulacion Aceptada'
  })
}

AOS.init();