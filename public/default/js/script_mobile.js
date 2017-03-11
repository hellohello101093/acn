function formatNumber(number)
{
    var number = number + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function open_dialog(){
    document.getElementById('upload').click();
    return false;
}
$(window).load(function(){
    $('img.lazy').parent().each(function(){
        $(this).addClass('parentLazy');
    }) 
})
$(document).ready(function(){
     $('.list-cate ul').owlCarousel({
        itemsCustom : [[320,2],[640,3],[800,4],[960,5],[1120,6]],
     
        //Basic Speeds
        slideSpeed : 1000,
        paginationSpeed : 1000,
        rewindSpeed : 1000,
     
        //Autoplay
        autoPlay : false,
        stopOnHover : false,
        pagination : false,
        responsiveRefreshRate : 700,
    })
    $('.pre-cate').click(function() {
        $('.list-cate ul').data('owlCarousel').prev();
    })
    $('.next-cate').click(function() {
        $('.list-cate ul').data('owlCarousel').next();
    })
    $('.list-product-featured ul').owlCarousel({
        itemsCustom : [[320,2],[640,3],[800,4],[960,5],[1120,6]],
     
        //Basic Speeds
        slideSpeed : 1000,
        paginationSpeed : 1000,
        rewindSpeed : 1000,
     
        //Autoplay
        autoPlay : true,
        stopOnHover : false,
        pagination : false,
        responsiveRefreshRate : 700,
    })
    $('.button-prev-featured').click(function() {
        $('.list-product-featured ul').data('owlCarousel').prev();
    })
    $('.button-next-featured').click(function() {
        $('.list-product-featured ul').data('owlCarousel').next();
    })
     $('.list-product-bestSell ul').owlCarousel({
        itemsCustom : [[320,2],[640,3],[800,4],[960,5],[1120,6]],
     
        //Basic Speeds
        slideSpeed : 1000,
        paginationSpeed : 1000,
        rewindSpeed : 1000,
     
        //Autoplay
        autoPlay : true,
        stopOnHover : false,
        pagination : false,
        responsiveRefreshRate : 700,
    })
    $('.button-prev-bestSell').click(function() {
        $('.list-product-bestSell ul').data('owlCarousel').prev();
    })
    $('.button-next-bestSell').click(function() {
        $('.list-product-bestSell ul').data('owlCarousel').next();
    })
    $('.banner ul').owlCarousel({
        itemsCustom : [[320,1],[480,2],[640,3],[800,4],[960,5],[1120,6]],
     
        //Basic Speeds
        slideSpeed : 1000,
        paginationSpeed : 1000,
        rewindSpeed : 1000,
     
        //Autoplay
        autoPlay : true,
        stopOnHover : false,
        pagination : false,
        responsiveRefreshRate : 700,
    })
    $('.button-banner-left').click(function() {
        $('.banner ul').data('owlCarousel').prev();
    })
    $('.button-banner-right').click(function() {
        $('.banner ul').data('owlCarousel').next();
    })
    
    $('.list-duan-khac ul').owlCarousel({
        itemsCustom : [[320,2],[470,3],[620,4],[870,5]],
     
        //Basic Speeds
        slideSpeed : 1000,
        paginationSpeed : 1000,
        rewindSpeed : 1000,
     
        //Autoplay
        autoPlay : true,
        stopOnHover : false,
        pagination : false,
        responsiveRefreshRate : 700,
    })
    $('.icon-menu').click(function(){
        $('.menu-box').toggleClass('show');
    })
    $('.menu-box').click(function(e){
        if(e.target.id == 'menu-box'){
            $('.menu-box').toggleClass('show');    
        }
    })
    $('.has-sub img').click(function(e){
        e.preventDefault();
        $(this).parent().parent().find('.list-sub-menu').slideToggle()
    })
    if(window.location.href === base_url) {
        $('.container').css('margin-top','-30px');
    }
    $('#form-lienhe').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Sending Information...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    $('.date-picker').datepicker();
    $('.time-picker').timepicker();
})

$(window).bind("resize", function(){
    
});
$(window).load(function(){
    $('.rslides_tabs li').each(function() {
        $(this).find('a').html('');
    })
})

