jQuery(document).ready(function () {

	$(".dropdown-menu-hover").hover(
		function() {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
			$(this).toggleClass('open');
		},
		function() {
			$('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
			$(this).toggleClass('open');
		}
	);

	jQuery("#slider1").revolution({
		sliderType:"standard",
		dottedoverlay:"twoxtwo",
		sliderLayout:"auto",
		delay:9000,
		navigationType:"bullet",
		navigation: {
			arrows:{
				style:"uranus",
				enable:true
			},
			bullets:{
				enable: true,
				hide_onmobile: false,
				style: "zeus",
				hide_onleave: false,
				direction: "horizontal",
				h_align: "center",
				v_align: "bottom",
				h_offset: 20,
				v_offset: 30,
				space: 5,
				tmp: ""
			}
		},
		gridwidth:1170,
		gridheight:350,
		autoheight:"on",
		debugMode: false
	});
});