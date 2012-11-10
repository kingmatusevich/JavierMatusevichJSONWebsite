<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Javier Matusevich</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.tinyscrollbar.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.address-1.4.min.js"></script>
		<script type="text/javascript" src="scripts/transition.min.js"></script>
		<script type="text/javascript">
	$(document).ready(function(){$("#banner").hide();$("#menu").hide();$("#content").hide();$(".option").hide();$("#selected").hide();$("#hint").hide();$("#left_arrow").hide();$("#right_arrow").hide();$(".arrow_container").hide();window.lclic=false;window.rclic=false;window.frun=false;$("#left_arrow").click(function(){window.lclic=true})$("#right_arrow").click(function(){window.rclic=true})function jobscounted(nn,tip){if((tip>nn)&&((window.rclic==true)||(window.frun==false))){console.log("tip "+tip);window.frun=true;window.rclic=false;var nNumber=parseInt(nn)+1;var rNumber=parseInt(nNumber);$("#right_arrow").attr('rel','address:/jobs/'+rNumber);$("#right_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')}else{$("#right_arrow").fadeOut('slow')}if((nn>0)&&((window.lclic==true)||(window.frun==false))){window.lclic=false;var pNumber=parseInt(nn)-1;var kNumber=parseInt(pNumber);$("#left_arrow").attr('rel','address:/jobs/'+kNumber);$("#left_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')}else{$("#left_arrow").fadeOut('slow')}}function countjobs(aNumber){$.ajax({data:"",type:"GET",dataType:"json",url:"API/json/jobs.list.json",success:function(data){window.aJobs=data.last;console.log("datalast "+data.last+"aNumber "+aNumber);jobscounted(aNumber,data.last)}})}if($(window).width()<1122){if($(window).width()>=982){$("#hint").css('background-image','url(pic/hint-alt.png)')}else{$("#hint").css('background-image','url(pic/hint-sm.png)')}}$(window).resize(function(){if($(window).width()<1122){if($(window).width()>=982){if($("#hint").css('background-image')!='url(pic/hint-alt.png)'){$("#hint").css('background-image','url(pic/hint-alt.png)')}}else{if($("#hint").css('background-image')!='url(pic/hint-sm.png)'){$("#hint").css('background-image','url(pic/hint-sm.png)')}}}else{if($("#hint").css('background-image')!='url(pic/hint.png)'){$("#hint").css('background-image','url(pic/hint.png)')}}})$("#menu").draggable({handle:'.preimage',cursor:'move',scroll:false,containment:'document',start:function(){$("#hint").fadeOut('slow',function(){$("#hint").hide()})}});$(".arrow_container").draggable({handle:'.preimage',cursor:'move',scroll:false,containment:'document',start:function(){$("#hint").fadeOut('slow',function(){$("#hint").hide()})}});$("#banner").draggable({cursor:'move',scroll:false,containment:'document',start:function(){$("#hint").fadeOut('slow',function(){$("#hint").hide()})}});$("#content").draggable({handle:'#content_title',cursor:'move',scroll:false,containment:'document',start:function(){$("#hint").fadeOut('slow',function(){$("#hint").hide()})}});setTimeout("start()",1000);$("#spinner").hide();$(document).ajaxStart(function(){$("#spinner").fadeIn('slow')})$(document).ajaxStop(function(){$("#spinner").fadeOut('slow')})$(".option").click(function(){$(".selected").removeClass("selected").addClass("option");$(this).removeClass("option").addClass("selected");console.log("done");var ID=$(this).attr('id');if($(this).attr('id')!='jobs'){$("#left_arrow").fadeOut('slow');$("#right_arrow").fadeOut('slow');$(".arrow_container").fadeOut('slow');$.ajax({data:"",type:"GET",dataType:"json",url:"API/json/"+ID+".json",success:function(data){asyncDisplay(data)}})}})$.address.internalChange(function(res){console.log('internal');if(res.path.toLowerCase().indexOf("jobs/")>=0){var Number=res.path.replace('jobs/','');console.log(Number);Number=Number.replace('/','');if(!window.aJobs){countjobs(Number)}else{if(window.aJobs>Number){var nNumber=parseInt(Number)+1;var xNumber=parseInt(nNumber);$("#right_arrow").attr('rel','address:/jobs/'+xNumber);$("#right_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')}else{$("#right_arrow").fadeOut('slow')}if(Number>0){var pNumber=parseInt(Number)-1;var zNumber=parseInt(pNumber);$("#left_arrow").attr('rel','address:/jobs/'+zNumber);$("#left_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')}else{$("#left_arrow").fadeOut('slow')}}$.ajax({data:"",type:"GET",dataType:"json",url:"API/json/jobs."+Number+".json",success:function(data){asyncDisplay(data)}})}});$.address.externalChange(function(res){console.log('external');if(res.path.toLowerCase().indexOf("jobs/")>=0){var Number=res.path.replace('jobs/','');console.log(Number);Number=Number.replace('/','');console.log("window.aJobs="+window.aJobs);if(!window.aJobs){countjobs(Number)}else{if(window.aJobs>Number){var nNumber=parseInt(Number)+1;var mNumber=parseInt(nNumber);$("#right_arrow").attr('rel','address:/jobs/'+mNumber);$("#left_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')};if(Number>0){var pNumber=parseInt(Number)-1;var asdNumber=parseInt(pNumber);$("#right_arrow").attr('rel','address:/jobs/'+asdNumber);$("#right_arrow").fadeIn('slow');$(".arrow_container").fadeIn('slow')}}$.ajax({data:"",type:"GET",dataType:"json",url:"API/json/jobs."+Number+".json",success:function(data){asyncDisplay(data)}});$(".selected").removeClass("selected").addClass("option");$("#jobs").removeClass("option").addClass("selected")}else{var ID=$("#"+res.path.replace('/','')).attr('id');console.log("done:"+ID);if(!ID){ID='welcome'};$('#'+ID).trigger('click')}})});
		</script>
		<meta name="description" content="Javier Matusevich es un diseñador Web de Mar del Plata, Mac User y developper de iOS. Haz clic para visitar su sitio web">
		<meta name="keywords" content="diseño,web,internet,paginas,iOS,aplicaciones,sitio,diseño web">
		<link rel="image_src" href="http://www.javiermatusevich.com.ar/pic/logo.png">
		<link rel=stylesheet href="css/style.min.css" type="text/css">
	</head>	
	<body>
		<div class="mainbody">
			<div id="hint" class="hint"></div>
			<div id="banner" class="centered" alt="Javier Matusevich" lang="es"></div>
			<div id="maincontainer" class="simplecontainer" lang="es">
				<div id="menu" class="floatleft" alt="Menu" lang="es">
					<img src="pic/menu.png" class="preimage" alt="Menu" lang="es" />
					<a class="option" id="welcome" href="welcome.php" alt="Bienvenido" rel="address:/welcome"  lang="es"><img lang="es" src="pic/welcome.png" alt="Bienvenido" /></a> 
					<a class="option" id="tech" href="tech.php" alt="Tecnologias" rel="address:/tech" lang="es"><img lang="es" src="pic/tech.png" alt="Tecnologias" /></a> 
					<a class="option" id="jobs" href="jobs.php" alt="Trabajos" lang="es"  rel="address:/jobs/0" ><img lang="es" src="pic/jobs.png" alt="Trabajos" /></a> 
					<a class="option" id="contact" href="contact.php" alt="Contacto" lang="es"  rel="address:/contact" ><img lang="es" src="pic/contact.png" alt="Contacto" /></a> 
				</div> 
				<div id="content" class="floatleft" alt="Contenido" lang="es">
				
				<div id="content_title_container"><img src="pic/welcome-lg.png" id="content_title" alt="Menu" lang="es" /></div>
					
					<div class="contentimg" id="content_image"><img src="pic/130.gif" class="polaroid"/></div>
					
					<div id="scrollbar1">
	<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
	<div class="viewport">
		<div class="overview">
			<h3>Magnis dis parturient montes</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae velit at velit pretium sodales. Maecenas egestas imperdiet mauris, vel elementum turpis iaculis eu. Duis egestas augue quis ante ornare eu tincidunt magna interdum. Vestibulum posuere risus non ipsum sollicitudin quis viverra ante feugiat. Pellentesque non faucibus lorem. Nunc tincidunt diam nec risus ornare quis porttitor enim pretium. Ut adipiscing tempor massa, a ullamcorper massa bibendum at. Suspendisse potenti. In vestibulum enim orci, nec consequat turpis. Suspendisse sit amet tellus a quam volutpat porta. Mauris ornare augue ut diam tincidunt elementum. Vivamus commodo dapibus est, a gravida lorem pharetra eu. Maecenas ultrices cursus tellus sed congue. Cras nec nulla erat.</p>
			
			<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque eget mauris libero. Nulla sit amet felis in sem posuere laoreet ut quis elit. Aenean mauris massa, pretium non bibendum eget, elementum sed nibh. Nulla ac felis et purus adipiscing rutrum. Pellentesque a bibendum sapien. Vivamus erat quam, gravida sed ultricies ac, scelerisque sed velit. Integer mollis urna sit amet ligula aliquam ac sodales arcu euismod. Fusce fermentum augue in nulla cursus non fermentum lorem semper. Quisque eu auctor lacus. Donec justo justo, mollis vel tempor vitae, consequat eget velit.</p>
			
			<p>Vivamus sed tellus quis orci dignissim scelerisque nec vitae est. Duis et elit ipsum. Aliquam pharetra auctor felis tempus tempor. Vivamus turpis dui, sollicitudin eget rhoncus in, luctus vel felis. Curabitur ultricies dictum justo at luctus. Nullam et quam et massa eleifend sollicitudin. Nulla mauris purus, sagittis id egestas eu, pellentesque et mi. Donec bibendum cursus nisi eget consequat. Nunc sit amet commodo metus. Integer consectetur lacus ac libero adipiscing ut tristique est viverra. Maecenas quam nibh, molestie nec pretium interdum, porta vitae magna. Maecenas at ligula eget neque imperdiet faucibus malesuada sed ipsum. Nulla auctor ligula sed nisl adipiscing vulputate. Curabitur ut ligula sed velit pharetra fringilla. Cras eu luctus est. Aliquam ac urna dui, eu rhoncus nibh. Nam id leo nisi, vel viverra nunc. Duis egestas pellentesque lectus, a placerat dolor egestas in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec vitae ipsum non est iaculis suscipit.</p>
			
			<h3>Adipiscing risus </h3>
			<p>Quisque vel felis ligula. Cras viverra sapien auctor ante porta a tincidunt quam pulvinar. Nunc facilisis, enim id volutpat sodales, leo ipsum accumsan diam, eu adipiscing risus nisi eu quam. Ut in tortor vitae elit condimentum posuere vel et erat. Duis at fringilla dolor. Vivamus sem tellus, porttitor non imperdiet et, rutrum id nisl. Nunc semper facilisis porta. Curabitur ornare metus nec sapien molestie in mattis lorem ullamcorper. Ut congue, purus ac suscipit suscipit, magna diam sodales metus, tincidunt imperdiet diam odio non diam. Ut mollis lobortis vulputate. Nam tortor tortor, dictum sit amet porttitor sit amet, faucibus eu sem. Curabitur aliquam nisl sed est semper a fringilla velit porta. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum in sapien id nulla volutpat sodales ac bibendum magna. Cras sollicitudin, massa at sodales sodales, lacus tortor vestibulum massa, eu consequat dui nulla et ipsum.</p>
			
			<p>Aliquam accumsan aliquam urna, id vulputate ante posuere eu. Nullam pretium convallis tincidunt. Duis vitae odio arcu, ut fringilla enim. Nam ante eros, vestibulum sit amet rhoncus et, vehicula quis tellus. Curabitur sed iaculis odio. Praesent vitae ligula id tortor ornare luctus. Integer placerat urna non ligula sollicitudin vestibulum. Nunc vestibulum auctor massa, at varius nibh scelerisque eget. Aliquam convallis, nunc non laoreet mollis, neque est mattis nisl, nec accumsan velit nunc ut arcu. Donec quis est mauris, eu auctor nulla. Fusce leo diam, tempus a varius sit amet, auctor ac metus. Nam turpis nulla, fermentum in rhoncus et, auctor id sem. Aliquam id libero eu neque elementum lobortis nec et odio.</p>                             
		</div>
	</div>
</div>		
		
				</div>
			</div>
		<div class="arrow_container">
				<a id="left_arrow" href="javascript:void(0)" rel="address:/jobs/0"></a>
				<a id="right_arrow" href="javascript:void(0)" rel="address:/jobs/1"></a>
				</div>
		</div>
		<div id="spinner"></div>
		
	</body>
</html>
