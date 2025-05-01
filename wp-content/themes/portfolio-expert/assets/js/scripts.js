(function ($) {
  "use strict";

  
  $.fn.porfolioExpertAccessibleDropDown = function () {
    var el = $(this);

    $("a", el)
        .on("focus", function () {
            $(this).parents("li").addClass("hover");
        })
        .on("blur", function () {
            var that = this;
            setTimeout(function () {
                if (!$(that).parents("li").find("a:focus").length) {
                    $(that).parents("li").removeClass("hover");
                }
            }, 10);
        })
        .on("keydown", function (e) {
            var parentLi = $(this).parent("li");

            // Detect Shift + Tab
            if (e.shiftKey && e.key === "Tab") {
                var prevElement = $(this).parent("li").prev().find("a").last();
                if (prevElement.length) {
                    prevElement.focus();
                    e.preventDefault();
                }
            }
        });
};

  //document ready function
  jQuery(document).ready(function ($) {
    $("#portfolio-expert-menu").porfolioExpertAccessibleDropDown();

    $("#besearch").on("click", function (e) {
      e.preventDefault();
      $("#bspopup").addClass("popup-box-on");
    });

    $("#sremoveClass").click(function () {
      $("#bspopup").removeClass("popup-box-on");
    });
    $("#sremoveClass").keydown(function (e) {
      $("#bspopup").removeClass("popup-box-on");
    });
  }); // end document ready

  function stickyElement(e) {
    var banner = document.querySelector(".home-intro");
    if (banner) {
      var bannerHeight = getComputedStyle(banner).height.split("px")[0];
    } else {
      var bannerHeight = " ";
    }

    var header = document.querySelector("header#header + div");
    if (header) {
      var headerHeight = getComputedStyle(header).height.split("px")[0];
    } else {
      var headerHeight = " ";
    }

    var menuBar = document.querySelector(".menu-bar");
    var scrollValue = window.scrollY;
    if (menuBar) {
      if (scrollValue > headerHeight || scrollValue > bannerHeight) {
        menuBar.classList.add("is-fixed");
      } else if (scrollValue < headerHeight || scrollValue < bannerHeight) {
        menuBar.classList.remove("is-fixed");
      }
    }
  }

  window.addEventListener("scroll", stickyElement);
  document.body.classList.add("jsloaded");
})(jQuery);
