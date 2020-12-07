(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.page-loader').delay(800).fadeOut(600, function () {
        $('body').fadeIn();
      });



      $('.file-import-settings').click(function () {
        var x = $('.box-settings');
        if ($(x).is(":visible")) {
          $(x).slideUp();
        } else {
          $(x).slideDown();
        }
        return false;
      });

      $('.add-more').click(function () {

        var id = $(this).attr('data-id');

        var input = $('<div class="custom-file mb-2"><input type="file" class="custom-file-input"  ><label class="custom-file-label" >Choose file</label></div>')
        $(id).parent().append(input);
        return false;
      });

      $('.add-double-more').click(function () {
        var id = $(this).attr('data-id');
        var input = $('<div class="row item-origin" id="id1"><div class="col-md-6 col-sm-12"><div class="db-field"> <div class="caption">Source file:</div><div class="custom-file"><input type="file" class="custom-file-input" name="filename"> <label class="custom-file-label">Choose file</label></div></div> </div><div class="col-md-6 col-sm-12"><div class="db-field"><div class="caption">Target file:</div> <div class="custom-file"><input type="file" class="custom-file-input" name="filename"> <label class="custom-file-label">Choose file</label> </div> </div></div> </div>')
        $(id).parent().append(input);
        return false;
      });

      $(document).on('change', '.custom-file-input', function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });





    }
    db.menu = function () {
      $('.menu-icon').click(function () {
        $('body').toggleClass("open-menu");
      });
    }




    db.preLoad();
    db.menu();
  });
})(jQuery);
