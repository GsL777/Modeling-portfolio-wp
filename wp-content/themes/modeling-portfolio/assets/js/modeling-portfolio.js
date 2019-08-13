jQuery(document).ready(function($){

    /*init function (shortcodes.php)*/
    revealPosts();

    /*helper functions*/
    function revealPosts() {
        $('[data-toggle="tooltip"]').tooltip();//code in shortcodes.php
        $('[data-toggle="popover"]').popover();//code in shortcodes.php
    }
    /*(shortcodes.php) END*/



    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else {
            // $('.filter[filter-item="'+value+'"]').removeClass('hidden');
            // $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
        $(this).addClass("active");



    /*sections animation element about.html START*/
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
      var window_height = $window.height();
      var window_top_position = $window.scrollTop();
      var window_bottom_position = (window_top_position + window_height);

      $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);
     
        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
          $element.addClass('in-view');
        } else {
          $element.removeClass('in-view');
        }
      });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
    /*sections animation element about.html END*/


    /*portfolio.html image gallery popup*/
    $(document).ready(function () {
        $(".gallery-img").click(function(){
            var image = $(this).attr("src");
            $(".modal-body").html("<img src='"+image+"' class='modal-img'>");
            $("#imageModal").modal();
        });
    });









});