$(() => {

	var open = true;
	var windowSize = $(window)[0].innerWidth;

	var sizeMenu = (windowSize <= 400) ? 200 : 250;

	if(windowSize <= 768){
		$('.menu').css('width','0').css('padding','0');
		$('.container,header').css('width','100%').css('left','0');
		open = false;
	}

	$('.menu-button').click(()=>{
		if(open){
			$('.menu').animate({'width':'0','padding':'0'}, () => {open = false;});
			$('.container,header').css('width','100%');
			$('.container,header').animate({'left':'0'}, () => {open = false;});
		}else{
			$('.menu').css('display','block');
			$('.menu').animate({'width':sizeMenu+'px','padding':'10px 0'}, () => {open = true;});
			$('.container,header').css('width','calc(100% - 250px)');
			$('.container,header').animate({'left':sizeMenu+'px'}, () => {open = true;});
		}
	});

	$(window).resize(() => {
		windowSize = $(window)[0].innerWidth;
		sizeMenu = (windowSize <= 400) ? 200 : 250;
		if(windowSize <= 768){
			$('.menu').css('width','0').css('padding','0');
			$('.container,header').css('width','100%').css('left','0');
			open = false;
		}else{
			$('.menu').css('width',sizeMenu+'px').css('padding','10px 0');
			$('.container,header').css('width','calc(100% - 250px)').css('left',sizeMenu+'px');
			open = true;
		}
	});

	$('[format=date]').mask('99/99/9999');

	$('[box=confirm]').click(() => {
		return confirm("Deseja excluir o registro?");
	});
});