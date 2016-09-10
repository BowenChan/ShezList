$(function(){
	
	$("dd.answer")
		.hide();
	
	$("dl.faq dt")
		.append("<br /><a href='#' title='Reveal Answer' class='answer-tab'>Answer</a>");
		
	$(".answer-tab")
		.click(function(){
			$(this)
				.parent().parent()
				.find("dd.answer")
				.slideToggle();
            return false;
		});
});
