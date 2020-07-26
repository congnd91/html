(function ($) {
  $(document).on('ready', function () {
    var db = new Object();

    db.validate = function () {
      $(".wrap-input input").keyup(function () {
        if ($(this).val().trim().length > 0) {
          $(this).parent().addClass("has-text");
        }
      });
      $(".wrap-input .clear").click(function (e) {
        $(this).parent().find(".input").val("");
        $(this).parent().removeClass("has-text");
        $(this).parents('.wrap-input').find("label.error").hide();
        $(this).parents('.wrap-input').find(".error").removeClass("error");
      });
      if ($('.form-quick-apply').length) {
        $('.form-quick-apply').validate();
      };
      if ($('#phone').length) {
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {});
      };
    };
    db.validate();

  });
})(jQuery);
