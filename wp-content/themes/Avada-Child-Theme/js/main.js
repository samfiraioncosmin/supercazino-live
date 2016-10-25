(function($){
	$(document).ready(function(){

	    $('div.slot-modal-buton').on('click', function(){

	    	$(this).siblings('div.slot-modal').css('display', 'block');
	    	var ifrm = $(this).siblings('div.slot-modal').find('#ifrmurl');
	    	var bla = ifrm.text();
	    	$(this).siblings('div.slot-modal').find('iframe').attr('src', bla);

	    });

	    $('h2.slot-modal-close').on('click', function(){

	    	var none = 'fiipene';
	    	$(this).closest('div.slot-modal').find('iframe').attr('src', none);
	    	$(this).closest('div.slot-modal').css('display', 'none');
	    });

		$('div.row > div.fusion-megamenu-holder > ul.fusion-megamenu.fusion-megamenu-border + ul.fusion-megamenu.fusion-megamenu-row-2').css("width", "100%!important");

		$('#reg-button').on('click', function(){
			$('#modal-reg').show();
			$('.close-button').show();
		});
		$('.close-button').on('click', function(){
			$('#modal-reg').hide();
			$('.close-button').hide();
		});

	});
})(jQuery);
