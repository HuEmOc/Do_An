$(document).ready(function(){
    $("#owl-slider").owlCarousel({
        navigation: true,
        navigationText: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    $(".owl-product").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        itemsTablet: [768,2]
    });
    $("#owl-client").owlCarousel({
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    $("#owl-brand").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        navigationText: false,
        items : 6,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet : [768,2]
    });
    $("#owl-product").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        navigationText: false,
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        itemsTablet : [768,4],
		itemsMobile : [479,3],
    });
	$(".owl-product-sale").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,1],
        itemsTablet : [768,2],
		itemsMobile : [479,1]
	});
    $("#nav-mobile").mmenu();
    $(".nav-category ul li i").on("click", function(){
        $(this).parent().children("ul").toggle();
    });
    $(".facq-up").on("click", function(){
        var quantity = parseInt($(".quantity").val());
        if(quantity < 1000) {
            quantity = quantity + 1;
            $(".quantity").val(quantity);
        }
    });
    $(".facq-down").on("click", function(){
        var quantity = parseInt($(".quantity").val());
        if(quantity > 0) {
            quantity = quantity - 1;
            $(".quantity").val(quantity);
        }
    });
    $(".cct-grid").on("click", function(){
        $(".cct-list").removeClass("active");
        $(this).addClass("active");
        $(".cc-products").removeClass("cc-list");
    });
    $(".cct-list").on("click", function(){
        $(".cct-grid").removeClass("active");
        $(this).addClass("active");
        $(".cc-products").addClass("cc-list");
    });
    jQuery(document).ready(function($){  
        $("#yt-totop").hide();
        $(function () {
            var wh = $(window).height();
            var whtml =  $(document).height();
            $(window).scroll(function () {
                if ($(this).scrollTop() > whtml/10) {
                    $('#yt-totop').fadeIn();
                } else {
                    $('#yt-totop').fadeOut();
                }
            });
            $('#yt-totop').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    });
});