$(document).ready(function() {
	$(".myChart").each(function( index ) {
	  //console.log( index + ": " + $( this ).text() );
		//Get context with jQuery - using jQuery's .get() method.
		
		var ctx = $(".myChart").get(index).getContext("2d");
		//This will get the first returned node in the jQuery collection.
		var myNewChart = new Chart(ctx);
		 
		var data = {
	labels : ["","January","","","February","","","March","","","April","","","May","","","June","","","July",""],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data : [65,59,90,81,56,55,40,65,59,90,81,56,55,40,65,59,90,81,56,55,40]
		},
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			data : [28,48,40,19,96,27,100,28,48,40,19,96,27,100,28,48,40,19,96,27,100]
		}
	]		
		}
		var options = {
			bezierCurve : false,
			pointDotRadius : 1
		}
		
		new Chart(ctx).Line(data,options);
	});
	$("#first_install").lightbox_me({
		centered: true, 
		overlayCSS: {
			background: 'black', 
			opacity: .95
		}
	});
	$('#first_install_close').click(function(e) {
		$("#first_install").trigger('close');
	    e.preventDefault();
	});

	$('#configure_services').click(function(e) {
		$("#allservices").lightbox_me({
			centered: true, 
			overlayCSS: {
				background: 'black', 
				opacity: .95
			}
		});
		 e.preventDefault();
	});
	$('#configure_services_close').click(function(e) {
		$("#allservices").trigger('close');
	    e.preventDefault();
	});

	$('#click_desc_edit').click(function(e) {
		$("#desc_edit").lightbox_me({
			centered: true, 
			overlayCSS: {
				background: 'black', 
				opacity: .95
			}
		});
		 e.preventDefault();
	});
	$('#click_desc_edit_close').click(function(e) {
		$("#desc_edit").trigger('close');
	    e.preventDefault();
	});

	$('.flashmessage').delay(2000).fadeOut('slow');

    $(window).on("scroll", function() {
        var fromTop = $("body").scrollTop();
        $('#sticky-main-nav').toggleClass("show", (fromTop > 200));
    });
	
	$(".expand").on("click", function(e) {
		$(this).toggleClass( "point-up point-down" );
		var box = $(this).parent().siblings(".inner-box");
		$(".additional", box).toggleClass( "showadditional" );
		e.preventDefault();
	});
	
	$("div.tab_container").css("height", $(this).find("div.showscale").outerHeight()+"px");
	//$( ".tabs" ).tabs();
	$( ".tabs li a" ).on("click", function() { 
		$( ".tabs li" ).removeClass("active");
		$( this ).parent().addClass("active");
		var ind = $(".tabs li a").index(this);
		
		var allbox = $( ".tabs .addontab .inner" );
		var box = $( ".tabs .addontab .inner" ).eq(ind);
		var current = $( ".tabs .addontab .showscale" );
		var newheight = box.outerHeight();
		current.removeClass("showscale");
		current.one('transitionend', function(e) {  
			box.closest("div.tab_container").css("height", newheight+"px");
			box.addClass("showscale"); 
		});  
		if($(this).data("follow") == true) return true;
		else return false;
	});
	
});