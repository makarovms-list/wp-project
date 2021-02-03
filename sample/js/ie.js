(function ($) {
  $(document).ready(function(){
    // IE Modal
    var isIE = false;
    if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
        isIE = true;   
    }
    if(isIE) {
      $('#ie-modal').modal({
        fadeDuration: 250
      });
    }
  })
})(jQuery);


