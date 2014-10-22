(function($) {

  // Activate the wonky april fool's prank.
  Drupal.behaviors.themedev_wonky = {
    attach: function() {
      $(document).ready(function() { //  When the document is ready
	$.fool('wonky'); 
      });
    }
  }
  
  
})(jQuery);


