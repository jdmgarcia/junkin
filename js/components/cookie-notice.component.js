export default function() {
//custom cookie notice

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


  //function to check if cookie is present
  (function () {
    var cookie = getCookie("cookieAccepted");

    if (cookie == "true") {
     //competely remove cookie notice from the DOM
      $('.js-cookie-notice-full-container').remove();
    } else {
      //if no cookie detected show bar
      $('.js-cookie-notice-full-container').addClass('is-shown');
    }
  })();

  $('.js-cookie-notice-cta').on('click', function(e) {

    e.preventDefault();
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();
    var day = d.getDate();
    var expiryDate = new Date(year + 1, month, day);

    //Set cookie
    document.cookie = "cookieAccepted=true; expires=" + expiryDate.toUTCString() ;+";max-age=" + expiryDate.toUTCString();

    //competely remove cookie notice from the DOM
    $('.js-cookie-notice-full-container').remove();

    //focus on first element
    $('.header-logo-link').focus();
  });
}