
$( document ).ready(function() {



  // au clic sur un lien avec une ancre on applique un effet smooth scroll

  $('a[href^="#"]').on('click', function(evt){
     // bloque le comportement par défaut
     evt.preventDefault(); 
     // enregistre la valeur de l'attribut  href dans la variable target
  var target = $(this).attr('href');
     /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
     et safari (webkit) */
  $('html, body')
     // on arrête toutes les animations en cours 
     .stop()
     /* on fait maintenant l'animation vers le haut (scrollTop) vers 
      notre ancre target */
     .animate({scrollTop: $(target).offset().top}, 2000 );
  });



  // rajoute un background au menu lorsque l'on scroll
  $(window).scroll(function() {    
      var scroll = $(window).scrollTop();

      if (scroll >= 100) {
          $("nav").addClass("scrolling");
      } else {
          $("nav").removeClass("scrolling");
      }
  });



});