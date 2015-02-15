jQuery(document).ready(function() {
	
	
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
	
	$('.footer_feedback_but, .main_hot_time_item').on('click', function(){
		
		$('.header_bl_form_container').toggleClass('header_bl_form_container_opened');
		return false;
	});
	
	
	$('.select_cat_doc_but').on('click', function(){
		
		$(this).parent().toggleClass('select_cat_doc_opened');
		$('.select_cat_doc_container').slideToggle(300);
		
	});
	
});




