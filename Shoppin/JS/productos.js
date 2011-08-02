$(document).ready(function() {
    $("#tabs").tabs();
    $(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
  });