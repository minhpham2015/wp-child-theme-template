jQuery(function ($) {
  $.post(
    __CHILD_THEME_PREFIX__Data.ajax_url,
    {
      action: '__CHILD_THEME_PREFIX___demo'
    },
    function (response) {
      console.log(response);
    }
  );
});

