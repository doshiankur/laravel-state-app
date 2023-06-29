$(document).ready(function() {

    $('.smolNav').click(function(e) {
        $('.header').toggleClass('showMenu');
        $(this).toggleClass('closeNav');
        e.stopPropagation();
    });

    $(".header .container").click(function(e){
        e.stopPropagation();
    });

    $(document).click(function(){
        $('.header').removeClass('showMenu');
        $('.smolNav').removeClass('closeNav');
    });

    $('.searchBtn').click(function() {
	//  $('.searchBox').addClass('showSearch');
	});
	$('.closeBtn').click(function() {		 
	//  $('.searchBox').removeClass('showSearch');
	});

$(".header").addClass('headerFix');
	
//var highestBox = 0;
//        $('.biography p').each(function(){  
//                if($(this).height() > highestBox){  
//                highestBox = $(this).height();  
//        }
//    });    
//$('.biography p').height(highestBox);
	
var highestBox2 = 0;
        $('.financeDepartment .col-md-6').each(function(){  
                if($(this).height() > highestBox2){  
                highestBox2 = $(this).height();  
        }
    });    
$('.financeDepartment .col-md-6').height(highestBox2);
		


	$(".ytVideo").fancybox({
		maxWidth    : 1000,
		maxHeight   : 650,
		fitToView   : false,
		width       : '90%',
		height      : '90%',
		autoSize    : false,
		closeClick  : false,
		openEffect  : 'none',
		closeEffect : 'none'
     });	
	
//$(".shareBtn").click(function(){
//	$(".socialIcon").toggle();
//});

    //$(".styleRemove[style], .styleRemove [style]").removeAttr("style");

    $(".innerCon table").addClass("table table-bordered");
    $(".innerCon table" ).wrap( "<div class='table-responsive'></div>" );

});
