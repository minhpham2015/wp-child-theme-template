jQuery(function ($) {
  $.post(
    __CHILD_THEME_SLUG__Data.ajax_url,
    {
      action: '__CHILD_THEME_SLUG___demo'
    },
    function (response) {
      console.log(response);
    }
  );
});

