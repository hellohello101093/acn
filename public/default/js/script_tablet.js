$(document).ready(function(){
    $('.date-picker').datepicker();
    $('.time-picker').timepicker();
    var numsp = $('.list-sanpham ul li').length;
    $('.list-sanpham ul').owlCarousel({
        itemsCustom : [[768,3], [1024,3]],
     
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
    $('.doitac ul').owlCarousel({
        itemsCustom : [[768,8], [1024,8]],
     
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
    $('.pre').click(function() {
        $('.doitac ul').data('owlCarousel').prev();
    })
    $('.next').click(function() {
        $('.doitac ul').data('owlCarousel').next();
    })
    
    $('.list-duan ul').owlCarousel({
        itemsCustom : [[768,1], [1024,1]],
     
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
    $('.bt-duan-pre').click(function() {
        $('.list-duan ul').data('owlCarousel').prev();
    })
    $('.bt-duan-next').click(function() {
        $('.list-duan ul').data('owlCarousel').next();
    })
    
    $('.list-duan-khac ul').owlCarousel({
        itemsCustom : [[768,3], [1024,3]],
     
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
    
    $('.list-sanpham ul ').each(function(){
        $(this).find('.img-hover').removeClass('none');
        $(this).find('.info-sanpham').removeClass('none');
        $(this).find('.info-sanpham').addClass('flipInX');
    })
    
    $('#form-lienhe').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Đang gửi thông tin...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    
    $('#form-lienhe-footer').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe-footer').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Đang gửi thông tin...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    
    
})