(function ($) {
  $(document).ready(function ($) {
    $("body").on("added_to_cart", function () {
      $.ajax({
        type: "POST",
        url: ajax_var_popup.url,
        data:
          "action=" + ajax_var_popup.action + "&nonce=" + ajax_var_popup.nonce,
        success: function (result) {
          let i = result.lastIndexOf("0");
          let new_result =
            result.substring(0, i) + " " + result.substring(i + 1);
          const response = JSON.parse(new_result);

          if (window.screen.width > 575) {
            let wrapper = document.createElement("div");
            wrapper.className = "sbcpa_wrapper-popup";

            wrapper.innerHTML = response.content_car;
            $("body").append(wrapper);

            document.body.style.overflow = "hidden";

            let close = document.getElementById("close-popup-cart");
            console.log(close);
            close.addEventListener("click", (evt) => {
              $(wrapper).remove();
              document.body.style.overflow = "visible";
            });
          }
        },
        error: function (err) {
          console.log(err);
        },
      });
    });
  });
})(jQuery);
