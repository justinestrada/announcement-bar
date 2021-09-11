(function ($) {
  'use strict';

  const AdminSettings = {
    onLoad: function () {
      let $enable_auto_activate = $('#enable_auto_activate');
      let $enable_auto_deactivate = $('#enable_auto_deactivate');
      $(window).load(function () {
        $enable_auto_activate.on('change', function () {
          AdminSettings.checkIfEnableAutoActivateCheckbox();
        });
        $enable_auto_deactivate.on('change', function () {
          AdminSettings.checkIfEnableAutoDeactivateCheckbox();
        });
        AdminSettings.checkIfEnableAutoActivateCheckbox();
        AdminSettings.checkIfEnableAutoDeactivateCheckbox();
      });
    },
    checkIfEnableAutoActivateCheckbox: function () {
      let auto_activate_elements = $('#auto_activate_date_time, #auto_activate_timezone');
      if ($("#enable_auto_activate").is(':checked')) {
        auto_activate_elements.css('display', 'block').prop('required', true);
      } else {
        auto_activate_elements.css('display', 'none').prop('required', false).removeAttr('required');
      }
    },
    checkIfEnableAutoDeactivateCheckbox: function () {
      let auto_deactivate_elements = $('#auto_deactivate_date_time, #auto_deactivate_timezone');
      if ($('#enable_auto_deactivate').is(':checked')) {
        auto_deactivate_elements.css('display', 'block').prop('required', true);
      } else {
        auto_deactivate_elements.css('display', 'none').prop('required', false).removeAttr('required');
      }
    },
  };
  $(document).ready(function () {
    AdminSettings.onLoad();
  });
})(jQuery);
