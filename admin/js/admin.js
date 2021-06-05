(function( $ ) {
'use strict';

const AdminSettings = {
  onLoad: function() {
    let $enable_auto_deactivate = $("#enable_auto_deactivate");
    $(window).load( function() {
      $enable_auto_deactivate.on("change", function() {
        AdminSettings.checkIfEnableAutoDeactivateCheckbox();
      });
      AdminSettings.checkIfEnableAutoDeactivateCheckbox();
    });
  },
  checkIfEnableAutoDeactivateCheckbox: function() {
    if ($("#enable_auto_deactivate").is(":checked")) {
      this.enableAutoDeactivate();
    }else{
      this.disableAutoDeactivate();
    }
  },
  enableAutoDeactivate: function() {
    $("#auto_deactivate_date_time, #auto_deactivate_timezone").css("display","block");
  },
  disableAutoDeactivate: function () {
    $("#auto_deactivate_date_time, #auto_deactivate_timezone").css("display","none");
  }
};
$(document).ready(function() {
  AdminSettings.onLoad();
});
})( jQuery );
