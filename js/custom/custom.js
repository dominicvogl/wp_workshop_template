//
// custom.js
// Autor: Dominic Vogl
// ---------------------------------------------------------------


// Wenn der DOM (Dokument) fertig geladen ist, dann tue etwas
$(document).ready(function () {

   // Initialisiere den Slider auf allen Elementen mit der übergebenen Klasse
   slick_slider('.slick-slider');

});

/**
 * Übergebe das Objekt an den Slider und initialisere diesen für jedes passende Element
 * @param obj
 */

function slick_slider(obj) {

   $(obj).each(function () {
      $(this).slick({
         autoplay: true,
         speed: 600,
         autoplaySpeed: 4000
      });
   });

}