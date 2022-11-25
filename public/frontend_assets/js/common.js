jQuery(document).ready(function ($) {
  // document start

  // Navbar
  $("<span class='clickD'></span>").insertAfter(
    ".navbar-nav li.menu-item-has-children > a"
  );
  $(".navbar-nav li .clickD").click(function (e) {
    e.preventDefault();
    var $this = $(this);
    if ($this.next().hasClass("show")) {
      $this.next().removeClass("show");
      $this.removeClass("toggled");
    } else {
      $this.parent().parent().find(".sub-menu").removeClass("show");
      $this.parent().parent().find(".toggled").removeClass("toggled");
      $this.next().toggleClass("show");
      $this.toggleClass("toggled");
    }
  });

  $(window).on("resize", function () {
    if ($(this).width() < 1025) {
      $("html").click(function () {
        $(".navbar-nav li .clickD").removeClass("toggled");
        $(".toggled").removeClass("toggled");
        $(".sub-menu").removeClass("show");
      });
      $(document).click(function () {
        $(".navbar-nav li .clickD").removeClass("toggled");
        $(".toggled").removeClass("toggled");
        $(".sub-menu").removeClass("show");
      });
      $(".navbar-nav").click(function (e) {
        e.stopPropagation();
      });
    }
  });
  // Navbar end

  /* ===== For menu animation === */
  $(".navbar-toggler").click(function () {
    $(".navbar-toggler").toggleClass("open");
    $(".navbar-toggler .stick").toggleClass("open");
    $("body,html").toggleClass("open-nav");
  });

  // Navbar end

  // to make sticky nav bar
  // $(window).scroll(function() {
  //     var scroll = $(window).scrollTop();
  //     if (scroll > 200) {
  //         $(".main-head").addClass("fixed");
  //     }
  //     else {
  //       $(".main-head").removeClass("fixed");
  //     }
  // })

  // smooth scroll to any section
  // if($('a.scroll').length){
  //     $("a.scroll").on('click', function(event) {
  //       if (this.hash !== "") {
  //         event.preventDefault();
  //         var target = this.hash, $target = $(target);
  //         $('html, body').animate({
  //           scrollTop: $target.offset().top - 60
  //         }, 800, function(){
  //           window.location.href.substr(0, window.location.href.indexOf('#'));
  //         });
  //       }
  //     });

  //   }

  // back to top
  if ($("#scroll").length) {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        $("#scroll").fadeIn(200);
      } else {
        $("#scroll").fadeOut(200);
      }
    });
    $("#scroll").click(function () {
      $("html, body").animate({ scrollTop: 0 }, 500);
      return false;
    });
  }

  // one page scroll menu link
  // $('a[href*="#"]').on('click', function (e) {
  //     e.preventDefault();
  //     $(document).off("scroll");
  //     $('.navbar-nav > li > a').each(function () {
  //         $(this).parent('li').removeClass('current-menu-item');
  //     });
  //     $(this).parent('li').addClass('current-menu-item');
  //     var target = this.hash, $target = $(target);
  //     $('html, body').stop().animate({
  //         'scrollTop': $target.offset().top
  //     }, 500, 'swing', function () {
  //         window.location.href.substr(0, window.location.href.indexOf('#'));
  //         $(document).on("scroll", onScroll);
  //     });
  // });
  //  $(document).on("scroll", onScroll);
  // function onScroll(event){
  //     var scrollPos = $(document).scrollTop() + 100;
  //     $('.navbar-nav > li > a').each(function () {
  //         var currLink = $(this);
  //         var refElement = $(currLink.attr("href"));
  //         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
  //             $('.navbar-nav > li').removeClass("current-menu-item");
  //             currLink.parent('li').addClass("current-menu-item");
  //         }
  //         else{
  //             currLink.parent('li').removeClass("current-menu-item");
  //         }
  //     });
  // }

  // slick slider

  // $('.brandout-sider').slick({
  //   dots: false,
  //   arrows: true,
  //   infinite: true,
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   autoplay: true,
  //   autoplaySpeed: 3000,
  //   centerMode: true,
  //   adaptiveHeight: true,
  //   centerPadding: '0px',
  //   responsive: [
  //     {
  //       breakpoint: 767,
  //       settings: {
  //         slidesToShow: 2,
  //         slidesToScroll: 2
  //       }
  //     },
  //     {
  //       breakpoint: 480,
  //       settings: {
  //         slidesToShow: 1,
  //         slidesToScroll: 1
  //       }
  //     }
  //   ]
  // });

  //   $("textarea").on("keyup", function () {
  //     var words = 0;

  //       if (this.value.match(/\S+/g) != null) {
  //         words = this.value.match(/\S+/g).length;
  //       }

  //       if (words > 75) {
  //         // Split the string on first 200 words and rejoin on spaces
  //         var trimmed = $(this).val().split(/\s+/, 75).join(" ");
  //         // Add a space at the end to make sure more typing creates new words
  //         $(this).val(trimmed + " ");
  //       } else {
  //         $("#word_left").text(75 - words);
  //       }
  //   });

  $("[data-maxcount]").each(function () {
    let _this = $(this);
    let _this_count = parseInt(_this.attr("data-maxcount"));
    _this.find("textarea").on("keyup", function () {
      let words = 0;
      if (this.value.match(/\S+/g) != null) {
        words = this.value.match(/\S+/g).length;
      }
      if (words > _this_count) {
        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
        $(this).val(trimmed + " ");
      } else {
        _this.find(".word_left").text(_this_count - words);
      }
    });
  });
});
