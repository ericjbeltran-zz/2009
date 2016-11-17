
var $jx = jQuery.noConflict(); 
$jx(document).ready(function(){
	$jx(".glidecontent").hover(function() {
		$jx(this).children(".glidemeta").animate({opacity: "show"}, "slow");
	}, function() {
		$jx(this).children(".glidemeta").animate({opacity: "hide"}, "fast");
	});
});



