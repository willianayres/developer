$(()=>{
	var windowW = $(window)[0].innerWidth;
	console.log(windowW);
	if(windowW <= 768){
		$(".main__header__nome").click(()=>{
			var el = $(".sidebar");
			if(el.is(':visible')){
				el.hide();
				$(".main").css('left','0');
			}else{
				el.show();
				$(".main").css('left','270px');
			}
		});
	}
	$(window).resize(()=>{
		windowW = $(window)[0].innerWidth;
	});
});