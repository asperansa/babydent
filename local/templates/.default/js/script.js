jQuery(document).ready(function() {
	$('.photo_win').fancybox({
        'showCloseButton'	: true,
        'showNavArrows'		: true
    });
	
	$('.main_deals_carousel').slick({
		dots: true,
		infinite: true,
		speed: 700,
		slide: '.main_deals_carouel_item',
		slidesToShow: 1,
		slidesToScroll: 1,
		touchMove: false
	
	});
	
	$('.main_bl_personal_carousel').slick({
		dots: true,
		infinite: true,
		speed: 700,
		slide: '.main_bl_personal_carousel_item',
		slidesToShow: 1,
		slidesToScroll: 1,
		touchMove: false
	
	});
	
	$('.main_bl_reviews_carousel').slick({
		dots: false,
		infinite: true,
		speed: 700,
		slide: '.main_bl_reviews_carousel_item',
		slidesToShow: 2,
		slidesToScroll: 1,
		touchMove: false
	
	});
	
	
	$('.main_bl_gallery_photo_sm').on('click', 'li', function(){
		var $that = $(this);
		$that.addClass('active_gallery_photo').siblings('.active_gallery_photo').removeClass('active_gallery_photo');
		$that.parents('.main_bl_gallery_photo_sm').siblings('.main_bl_gallery_photo_b').children('img').attr('src', $that.children('img').data('big'));
	});
	$('.main_bl_gallery_photo_sm').find('li:first').trigger('click');
	
	$('.header_bl_form_but').on('click', function(){
		
		$('.header_bl_form_container').toggleClass('header_bl_form_container_opened');
		
	});
	
	$('.header_form_close').on('click', function(){
		
		$('.header_bl_form_container').toggleClass('header_bl_form_container_opened');
		
	});
	
	$('.header_video_close').on('click', function(){
		
		$('.v_popup').hide();
		
	});
	$('.header_question_close').on('click', function(){
		
		$('.v_popup').hide();
		
	});
	$('.header_feedback_close').on('click', function(){
		
		$('.v_popup').hide();
		
	});
	
	$('.footer_feedback_but, .main_hot_time_item, .make_order_item').on('click', function(){
		
		$('.header_bl_form_container').toggleClass('header_bl_form_container_opened');
		return false;
	});
	
	
	$('.select_cat_doc_but').on('click', function(){
		
		$(this).parent().toggleClass('select_cat_doc_opened');
		$('.select_cat_doc_container').slideToggle(300);
		
	});
	
});
$(function($) {
	$('.masked_phone').mask("+7(999)-999-99-99");
	$().UItoTop({
        easingType: 'easeOutQuart'
    });
	$('.gallery_item_video').on('click', function(){
        $('#popup_video_'+this.id).show();
        return false;
	});
	$('.gallery_item_map').on('click', function(){
        $('#popup_'+this.id).show();
        return false;
	});
	$('.popup_question').on('click', function(){
        $('#popup_question').show();
        return false;
	});
	$('.popup_feedback').on('click', function(){
        $('#popup_feedback').show();
        return false;
	});
	$('.input_file').change( function() {
        filename = $(this).find('input[type=file]').val().split("\\");
        $(this).append('<p>'+filename[2]+'</p>');
		$('.but_file').hide();
        $(this).find('span').css('display', 'none');
    });
});




