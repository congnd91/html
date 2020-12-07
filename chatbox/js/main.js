(function ($) {
  $(document).on('ready', function () {
    var db = new Object();

    db.showChat = function () {
      $('.chat-icon').click(function () {
        $('.chat-box').toggleClass("open-chat");
      });
      $('.head .close').click(function () {
        $('.chat-box').removeClass("open-chat");
      });


      function calcHeight(value) {
        let numberOfLineBreaks = (value.match(/\n/g) || []).length;
        let newHeight = 20 + numberOfLineBreaks * 20 + 12 + 2;
        return newHeight;
      }

      let textarea = document.querySelector(".textarea");
      textarea.addEventListener("keyup", () => {
        textarea.style.height = calcHeight(textarea.value) + "px";
      });

    }

    db.showChat();

  });
})(jQuery);
