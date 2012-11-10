function start(){
	$(".mainbody").show();
	$("#banner").fadeIn("slow", function(){
		$("a.option").attr("href", "javascript:void(0)");
		$("#content").fadeIn("slow", function(){
			$("#scrollbar1").tinyscrollbar();
		});
		$("#menu").fadeIn("slow", function() {
		$("#hint").fadeIn('slow');
			$("#welcome").fadeIn("slow", function(){
				$("#tech").fadeIn("slow", function(){
					$("#jobs").fadeIn("slow", function(){
						$("#contact").fadeIn("slow", function(){
						});
					});
				}); 
			});
		});
	});
} 
function asyncDisplay(data){
	$("#content_title").attr('src', data.nameimage);
	$("img.polaroid").attr('src', data.globalimage);
	$(".overview").html(data.text);
	console.log(data.text);
	$('#scrollbar1').tinyscrollbar();
	$('#scrollbar1').tinyscrollbar_update(); 
	$("#scrollbar1").tinyscrollbar_update();
}