(function( $ ) {
	'use strict';

const AnnouncementBar = {
  onLoad: function() {
    if (!$('#ab_announcement_bar').length) {
      return;
    }
    if ( ! Cookie.read('Hide_Announcement_Bar') ) {
      if (!$('#ab_announcement_bar').hasClass('ab_sticky')) {
        $('#ab_announcement_bar').slideDown();
      } else {
        $('#ab_announcement_bar').show( 0, function() {
          AnnouncementBar.setupSticky();
        });
      }
    }
    this.onClickDismiss();
  },
  setupSticky: function() {
    const body_padding_top = parseInt($('body').css('padding-top').replace('px', ''));
    const announcement_bar_height = parseInt($('#ab_announcement_bar').height());
    const new_body_padding_top = body_padding_top + announcement_bar_height;
    $('body').css('padding-top', new_body_padding_top);
    const announcement_bar_top = body_padding_top + parseInt($('html').css('margin-top').replace('px', ''));
    console.log(announcement_bar_top - 1);
    $('#ab_announcement_bar').css('top', (announcement_bar_top - 1));
  },
  onClickDismiss: function() {
    $('.ab_dismiss_announcement').on('click', function() {
      $('#ab_announcement_bar').slideUp();
      Cookie.create('Hide_Announcement_Bar', true, .5)
    });
  },
};

const Cookie = {
  create: function(name, value, days) {
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
  },
  read: function(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  },
};

$(document).ready(function() {
  AnnouncementBar.onLoad();
});

})( jQuery );
