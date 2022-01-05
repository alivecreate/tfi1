<?php
	ob_start();
	session_start();
	$_SESSION['security_number']=rand(10000,99999);
	require_once 'data/config.php';
	require_once 'include/header.php';
	require_once 'include/menu.php';
	//include("../include/functions.php");
if(!isset($_SESSION['u_name'])) {  
	header('Location: https://www.skyviewaerialphotography.com.au');
	}
	
	//echo $_GET['pid']." ".$_GET['psid'];exit;
	$mainUrl = explode("/", $_SERVER['REQUEST_URI']);
	
	$main_folder = $mainUrl['2'];
    $p_name = $mainUrl['3'];
    $p_date = date('d-M-Y',strtotime($mainUrl['4']));

    if( !isset($main_folder)  && !isset($p_name) && !isset($p_date)) { // if some parameters are missing
        header('Location: https://www.skyviewaerialphotography.com.au'); 
    }
	
?>
<link rel="stylesheet" type="text/css" href="<?=SITEURL?>skin/frontend/default/ma_photostock/css/print.css" media="print" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap@4/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
<link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?=SITEURL?>css/lightgallery-bundle.css" />
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css'>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?=SITEURL?>js/jquery.lazy.min.js"></script>
<script src="<?=SITEURL?>js/jquery.fullsizable.js"></script>
<script src="<?=SITEURL?>js/jquery.fileDownload.js"></script>
<script src="<?=SITEURL?>js/print.js"></script>
<link rel="stylesheet" href="<?=SITEURL?>css/jquery-fullsizable.css" />

<style type="text/css" media="screen">
	.magnify-header .magnify-toolbar {
  background-color: rgba(0, 0, 0, .5);
}
.magnify-stage {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  border-width: 0;
}
.magnify-footer{
  bottom:10px;
}
.magnify-footer .magnify-toolbar {
  background-color: rgba(0, 0, 0, .5);
  border-radius: 5px;
}
.magnify-loader{
  background-color: transparent;
}
.magnify-header,.magnify-footer{
  pointer-events: none;
}
.magnify-button{
  pointer-events: auto;
}

/* ---------------------------------
   Example Styles 
   --------------------------------- */
.image-set{
  margin-left:-5px;
  margin-right:-5px;
}
.image-set img{
  display:block;
}
.image-set a{
  display:inline-block;
  margin-left:5px;
  margin-right:5px;
  padding:2px;
  border:1px solid #ddd;
  transition:border-color .3s ease;
}
.image-set a:hover{
  border-color:#aaa;
}
/* ---------------------------------
   magnify Styles end here
   --------------------------------- */	
	
	body {
		background-color: #121212;
	}
	
	body a,
	body p {
		font-family: 'Montserrat-Regular';
	}
	
	a,
	a:hover {
		text-decoration: none;
	}
	
	.left img {
		vertical-align: middle;
	}
	
	.lg-pager-outer {
		display: none;
	}
	
	.lg-thumb-item {
		width: 60px !important;
		height: 40px !important;
		margin-right: 5px;
	}
	
	.lg-sub-html h4,
	.lg-sub-html p {
		color: #338ECB;
		font-size: 16px;
	}
	
	.products-grid .product-image {
		width: 100%;
		height: 100%;
	}
	
	.products-grid .product-image img {
		width: 100%;
	}
	
	.navbar-fixed-bottom,
	.navbar-fixed-top {
		z-index: 1 !important;
	}
	
	.navbar {
		position: fixed;
		/* height:88px;
    padding-top: 0rem;*/
		padding: 0;
	}
	/*
.breadcrumbs{background: #000;
    padding: 5px 10px;
    margin-bottom: 10px;
    margin-top: 0px;
    box-shadow: #333 1px 1px 10px 1px;}
.breadcrumbs ul{margin-bottom:0px;padding-left:5px;margin-top:0px;color: #FFF;}
.breadcrumbs li{padding:0px;}
.breadcrumbs li a, .breadcrumbs li span{    color: #337ab7;
    text-decoration: none;font-size: 18px;
    font-weight: 400;
    line-height: 24px;
    height: 24px;}
.breadcrumbs li a:hover{color: #FFF;}
.breadcrumbs li strong {
    font-weight:normal;
    color: #FFF;
    font-size: 18px;
    font-weight: 400;
    line-height: 24px;
    height: 24px;
}
.breadcrumbs .fa{font-size:16px;vertical-align:middle;}
.breadcrumb a,.breadcrumb .active{text-decoration: none;
    padding-top: 5px;
}*/
	
	.fa,
	.fas,
	.fad,
	.fal,
	.far {
		/*font-size:32px;*/
		vertical-align: text-bottom;
		color: #FFF;
	}
	
	.fa:hover,
	.fas:hover,
	.fad:hover,
	.fal:hover,
	.far:hover {
		color: #337ab7;
	}
	
	.link-fullscreen {
		color: #FFF;
	}
	
	button.btn-cart span span {
		color: #FFF;
	}
	
	.justified-gallery {
		background: #000;
	}
	
	.justified-gallery > a > img,
	.justified-gallery > div > img,
	.justified-gallery > figure > img,
	.justified-gallery > a > a > img,
	.justified-gallery > div > a > img,
	.justified-gallery > figure > a > img,
	.justified-gallery > a > svg,
	.justified-gallery > div > svg,
	.justified-gallery > figure > svg,
	.justified-gallery > a > a > svg,
	.justified-gallery > div > a > svg,
	.justified-gallery > figure > a > svg {
		/*padding: 10px;*/
		margin: 10px;
		border: 5px solid;
		border-color: #000;
	}
	
	.justified-gallery > a > img:hover,
	.justified-gallery > div > img:hover,
	.justified-gallery > figure > img:hover,
	.justified-gallery > a > a > img:hover,
	.justified-gallery > div > a > img:hover,
	.justified-gallery > figure > a > img:hover,
	.justified-gallery > a > svg:hover,
	.justified-gallery > div > svg:hover,
	.justified-gallery > figure > svg:hover,
	.justified-gallery > a > a > svg:hover,
	.justified-gallery > div > a > svg:hover,
	.justified-gallery > figure > a > svg:hover {
		border: 5px solid #FFF;
	}
	/*.lg-download,.lg-zoom-in,.lg-counter,.lg-rotate-right,.lg-rotate-left,.lg-flip-hor,.lg-flip-ver{display:none;}*/
	
	.lg-share,
	.lg-flip-hor,
	.lg-flip-ver,.lg-rotate-right,.lg-rotate-left {
		display: none;
	}
	
	.docs-pictures > li {
		height: calc(96% / 4);
		width: calc(96% / 4);
		margin: 0.25%;
	}
	
	.viewer-backdrop {
		background-color: rgba(0, 0, 0, 0.80);
	}
	
	.docs-pictures li:hover img {
		background-color: #FFF;
	}
	/*button.button span {
    background:none;
    padding: 5px 15px;
    border: 1px solid;
    font-size:18px;
    border-radius: 5px;
    background:transparent !important;
}
button.button span:hover  {
    border-color:#338ECB;
    color:#338ECB !important;
    background:transparent !important;
}
button.button span:hover .far,button.button span:hover .fal{
    color:#338ECB !important;
}*/
	
	.wrap-main {
		/*width: 1085px;*/
		margin: 0 auto;
		min-height: auto;
	}
	
	.lg-thumb-item:nth-child(odd),
	.lg-item:nth-child(odd) {
		/*display: none;*/
	}
	
	.lg-counter {
		/*display: none;*/
		color: #338ECB;
		font-size: 20px;
		font-weight: bold;
	}
	
	.lg-next,
	.lg-prev {
		background: #338ECB;
		color: #FFF;
	}
	/*
	.lg-outer.lg-grab img.lg-object {
		cursor: none !important;
	}
	
	.lg-outer.lg-grabbing img.lg-object {
		cursor: none !important;
	}*/
	
/*	.MyBreadcrumb ol {
		width: 58%;
	}*/
	
	@media screen and (min-width: 1200px) {
	/*	.breadcrumb .back {
			right: 12% !important;
		}*/
	}
	</style>
	<?php
			$co_alias = $pageAlias[2];
			$co_name = companyTitle($pageAlias[2]); 
			$p_alias = $pageAlias[3];
			// $p_name = projectTitle($pageAlias[3]);
			$ps_dt2 = jobTitle2($pageAlias[4]);
			$ps_dt1 = jobTitle($pageAlias[4]);
			
			
		/*	$co_alias = $pageAlias[3];
			$co_name = companyTitle($pageAlias[3]); 
			$p_alias = $pageAlias[4];
			$p_name = projectTitle($pageAlias[4]);
			$ps_dt2 = jobTitle2($pageAlias[5]);
			$ps_dt1 = jobTitle($pageAlias[5]);
			*/
			
			
			$dir = UPLOAD_FILEPATH_PHOTOSHOOT."web/".$main_folder."/".$p_name."/".$p_date."/";
			$dirContents = scandir($dir);
			$arrayContents = '';
			$count = 1;
			foreach($dirContents as $image) {
				$imageName = substr($image, 0, strrpos($image, '.'));
				if (isImageFile($image)) {
					$arrayContents = $image ; ?>
		<style type="text/css">
		.gallery-item<?=$imageName?> {
			position: relative;
		}
		
		.image<?=$imageName?> {
			opacity: 1;
			display: block;
			width: 100%;
			height: auto;
			transition: .5s ease;
			backface-visibility: hidden;
		}
		
		.middle<?=$imageName?> {
			/*transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;*/
			transition: .5s ease;
			opacity: 0;
			position: absolute;
			top: 90%;
			left: 50%;
			transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			text-align: center;
			width: 100%;
			background-color: transparent !important;
			border: none !important;
			border-color: transparent !important;
		}
		
		.middle<?=$imageName?> .fa,
		.middle<?=$imageName?> .fas,
		.middle<?=$imageName?> .fad,
		.middle<?=$imageName?> .fal,
		.middle<?=$imageName?> .far {
			font-size: 32px;
			vertical-align: text-bottom;
			color: #FFF;
		}
		
		.gallery-item<?=$imageName?>:hover .image<?=$imageName?> {
			/*opacity: 0.3;*/
		}
		
		.gallery-item<?=$imageName?>:hover .middle<?=$imageName?> {
			opacity: 1;
		}
		
		.text<?=$imageName?> {
			/*background-color: #04AA6D;*/
			background-color: transparent;
			color: white;
			font-size: 16px;
			padding: 20px 10px;
		}
		
		.text<?=$imageName?> .fa,
		.text<?=$imageName?> .fas,
		.text<?=$imageName?> .fad,
		.text<?=$imageName?> .fal,
		.text<?=$imageName?> .far {
			border: 1px solid;
			padding: 5px 10px;
			border-radius: 5px;
		}
		
		.fa-arrow-to-bottom:hover {
			color: #FFF;
		}
		
		.lg-sub-html button.button span {
			background: none;
			padding: 5px 15px;
			border: 1px solid;
			font-size: 18px;
			border-radius: 5px;
			background: transparent !important;
		}
		
		.lg-sub-html button.button span:hover {
			border-color: #338ECB;
			color: #338ECB !important;
			background: transparent !important;
		}
		
		.lg-sub-html button.button span:hover .far,
		button.button span:hover .fal {
			color: #338ECB !important;
		}
	
		/*Custom Image Viewer Styles*/
		
@media screen and (min-width:1200px){
.modal-body{
    height: 1000px;
    max-height: 1200px;
}
figure, .video-body, iframe {
   /* height: 100%;*/
}

@media screen and (min-width: 400px){
.lg-outer .lg-object {
    display: inline-block;
    vertical-align: baseline !important;
}

}

		
		</style>
		<?php
			$full_image= SITEURL.READ_FILEPATH_PHOTOSHOOT."org/".$co_alias."/".$p_alias."/".$ps_dt2."/".$image;
			
			?>
			<?php	 $count++;
			}
		}
		 ?>
				<div class="main-inner" style="margin-top:53px;">
				    
				    
				    <style>
#overlay1{
  background:#000000;
  transition: 1s 0.4s;
  width:100%;
  height: calc(100vh - 235px) !important;
  
}

#progress{
  height:1px;
  background:#fff;
  position:absolute;
  width:0;
  top:20%;
  display:none;
}

#progstat{
  font-size:0.7em;
  letter-spacing: 3px;
  position:absolute;
  top:50%;
  /*margin-top:-40px;*/
  width:100%;
  text-align:center;
  color:#fff;
}

#client_images{display:none;}

</style>
<script type="text/javascript">
(function(){
	function id(v){ return document.getElementById(v); }
	function loadbar() {
	  var ovrl = id("overlay1"),
	      prog = id("progress"),
	      stat = id("progstat"),
	      cl = id("client_images"),
	      img = document.images,
	      c = 0,
	      tot = img.length;
	  if(tot == 0) return doneLoading();

	  function imgLoaded(){
	    c += 1;
	    var perc = ((100/tot*c) << 0) +"%";
	    prog.style.width = perc;
	    //imgs = <?php echo $dirContents[$count];?>;
	    //stat.innerHTML = "<span style='color:#338ECB;'>Loading</span> "+ imgs "Photos "+ perc;
	    stat.innerHTML = "<span style='color:#338ECB;'>Loading</span> "+ perc;
	    if(c===tot) return doneLoading();
	  }
	  function doneLoading(){
	    ovrl.style.opacity = 0;
	    setTimeout(function(){ 
	      ovrl.style.display = "none";
	      cl.style.display = "block";
	    }, 1200);
	  }
	  for(var i=0; i<tot; i++) {
	    var tImg     = new Image();
	    tImg.onload  = imgLoaded;
	    tImg.onerror = imgLoaded;
	    tImg.src     = img[i].src;
	  }    
	}
	document.addEventListener('DOMContentLoaded', loadbar, false);
}());
</script>
<div id="overlay1" style="overflow-x: clip; text-align:center;">
	<div style="top: 23%;position: relative;font-size:18px;" id="progstat"></div>
   	<div id="progress"></div>
	<img style="top: 25%;position: relative;width: 120px;" src="https://www.skyviewaerialphotography.com.au/images/fly1.gif"/>			
	<br>

	<img style="top:30%;position: relative;width: 350px;" src="https://skyviewaerialphotography.com.au/images/logo.png" />
    <h4 class="text-center" style="font-size:24px;color: #fff;top:35%;position: relative;">Preparing for TAKE OFF</h4>
</div>

<div id="client_images">
	<section class="MyBreadcrumb">
		<div class="container-fluid">
			<div class="">
				<nav aria-label="breadcrumb" class="pl-2 pt-3">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item">
							<a href="<?=SITEURL?>client" title="Go to Home Page">
								<?php echo $_SESSION['u_name']; ?>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?=SITEURL?>client/<?=$pageAlias[3]?>" title="Go to Project Page">
								<?php echo projectTitle($pageAlias[3]); ?>
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php $date = date_create(jobTitle($pageAlias[4])); echo date_format($date, 'dS F Y'); // echo jobTitle($pageAlias[5]); ?>
						</li>
						<li class="breadcrumb-item back"><a href="javascript:history.go(-1)">Back</a></li>
					</ol>
				</nav>
				<input type="hidden" id="folder" value="<?=$main_folder?>"> 
                <input type="hidden" id="p_name" value="<?=$p_name?>"> 
                <input type="hidden" id="p_date" value="<?=$p_date?>">
                <input type="hidden" id="current" value="">
                <input type="hidden" id="next" value=""> 
                <input type="hidden" id="total" value="">
                <input type="hidden" id="totalImages" value="">
		</div>
	</section>
	<!-- <div class=" span4 right" style="text-align:right;color:#FFF;font-size: 18px;font-weight: 400;line-height: 24px;height: 24px;"> Order Prints: <i class="fa fa-shopping-cart" style="font-size: 16px;"></i> <span id="countImage-dnone" style="font-weight: bold;color: #fff;">0</span>
		<button id="btnDownload" name="btnDownload" type="button" class="button" style="background: none repeat scroll 0 0 #1A82C3;margin-left: 10px;padding-left: 10px;display:none;"> 
			<span style="font-weight:bold; background: url(<?=SITEURL?>skin/frontend/default/ma_photostock/images/download_icon_blue.png) no-repeat scroll 0 0 #1A82C3;color: #fff;height: 27px;line-height: 27px;padding: 0 10px 0 35px;">
				<span style="color:#fff;background:#1A82C3;font-weight:bold; ">Download Now</span>
			</span>
		</button>
		<input type="hidden" id="hid_coname" name="hid_coname" value="<?=$_SESSION['co_owner']?>" />
		<input type="hidden" id="client_email" name="client_email" value="<?=$_SESSION['u_email']?>" />
		<button id="btnOrderEmail" name="btnOrderEmail" type="button" class="button" style="margin-left: 10px;"> 
			<img src="<?=SITEURL?>images/order.now_.button.png" alt="Order Now" style="height:32px;vertical-align: top;"> 
			<span style="color:#fff;background:#337ab7;font-weight:bold;padding:5px 10px;display:none; ">Order Full size <i class="far fa-images"></i></span>
		</button>
	</div> -->
	<div style="clear:both;"> </div>
</div>
<div class="row-fluid banner7  " style="background: #121212;">
	<div class="wrap-main">
		<div class="header-t">
			<h1><?php $date = date_create(jobTitle($pageAlias[4])); echo date_format($date, 'dS F Y'); // echo jobTitle($pageAlias[5]); ?></h1> 
		</div>
		<div class="main-actions-menu" id="panel_main_container_menu_bar" style="float:right;padding:10px;">
			<div class=" span12">
				<div class=" span4" style="float:right;"> <a href="#" style="color: #fff;text-decoration: none;">Order Prints <img src="<?=SITEURL?>images/order_icon.png" alt="Order" style="height: 48px;padding: 5px;margin-right: 10px;vertical-align: middle;"/>
					<span id="countImage" style="font-weight: bold;color: #fff;text-decoration: none;" >0</span></a> 
				</div>
				<div class=" span4" style=" color: #0099cc;font-weight:bold;float:right;margin-top: 10px;margin-right: 20px;"> 
					<img src="<?=SITEURL?>images/check.png" name="all_check" id="all_check" width="20" height="20" style="vertical-align:middle;" /> Select : <a id="chkAll" style="color:#fff;font-weight:bold;text-decoration:none; cursor:pointer">All</a> | <a id="chkNone" style="color:#fff;font-weight:bold;; text-decoration:none; cursor:pointer">None</a> 
				</div>
			</div>
		</div>
	</div>
	<div class="right span12">
		<div class="ma-banner7-container">
		</div>
	</div>
	<div id="lazyimages"></div>
    <div class="gallery-container" id="animated-thumbnails-gallery"></div>
    <center><button class="btn btn-primary btn-lg" id="loadMore" style="display: none !important;">Load More</button></center>
</div>
<!-- <center><img class='loaderOnLoad' style='top: 25%;position: relative;width: 120px;' src='https://www.skyviewaerialphotography.com.au/images/fly1.gif'/ ></center> -->

<script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.js'></script>
<script src='https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js'></script>
<script src="<?=SITEURL?>js/lightgallery.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/autoplay/lg-autoplay.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/comment/lg-comment.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/fullscreen/lg-fullscreen.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/hash/lg-hash.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/pager/lg-pager.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/rotate/lg-rotate.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/share/lg-share.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/video/lg-video.umd.js"></script>
<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/zoom/lg-zoom.umd.js"></script>


<script>
/*function printDiv(divName) {
	alert("yes");
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
function myFunction() {
	window.print();
}
document.addEventListener('DOMContentLoaded', function() {
	// Query the element
	const printBtn = document.getElementById('print<?=$count?>');
	printBtn.addEventListener('click', function() {
		// Create a fake iframe
		const iframe = document.createElement('iframe');
		// Make it hidden
		iframe.style.height = 0;
		iframe.style.visibility = 'hidden';
		iframe.style.width = 0;
		// Set the iframe's source
		iframe.setAttribute('srcdoc', '<html><body></body></html>');
		document.body.appendChild(iframe);
		iframe.contentWindow.addEventListener('afterprint', function() {
			iframe.parentNode.removeChild(iframe);
		});
		iframe.addEventListener('load', function() {
			// Clone the image
			const image <?=$count?> = document.getElementById('image<?=$count?>').cloneNode();
			image <?=$count?>.style.maxWidth = '100%';
			// Append the image to the iframe's body
			const body = iframe.contentDocument.body;
			body.style.textAlign = 'center';
			body.appendChild(image <?=$count?>);
			image.addEventListener('load', function() {
				// Invoke the print when the image is ready
				iframe.contentWindow.print();
			});
		});
	});
});*/

function idLoad(v){ return document.getElementById(v); }
function loadbarFoot() {
	// console.log('sds');
  var ovrl = idLoad("overlay1"),
      prog = idLoad("progress"),
      stat = idLoad("progstat"),
      cl = idLoad("client_images"),
      img = document.images,
      c = 0,
      tot = img.length;
  if(tot == 0) return doneLoading();

  function imgLoaded(){
    c += 1;
    var perc = ((100/tot*c) << 0) +"%";
    prog.style.width = perc;
    //imgs = <?php echo $dirContents[$count];?>;
    //stat.innerHTML = "<span style='color:#338ECB;'>Loading</span> "+ imgs "Photos "+ perc;
    stat.innerHTML = "<span style='color:#338ECB;'>Loading</span> "+ perc;
    if(c===tot) return doneLoading();
  }
  function doneLoading(){
    ovrl.style.opacity = 0;
    setTimeout(function(){ 
      ovrl.style.display = "none";
      cl.style.display = "block";
    }, 1200);
  }
  for(var i=0; i<tot; i++) {
    var tImg     = new Image();
    tImg.onload  = imgLoaded;
    tImg.onerror = imgLoaded;
    tImg.src     = img[i].src;
  }    
}
function showOptions(obj){
	var imageID = $(obj).attr('data-attr-id');
	$(".gallery-item"+imageID).find(".middle"+imageID).css("opacity", "1");
}
function hideOptions(obj){
	var imageID = $(obj).attr('data-attr-id');
	$(".gallery-item"+imageID).find(".middle"+imageID).css("opacity", "0");
}
function rgb2hex(rgb) {
	if(rgb.search("rgb") == -1) {
		return rgb;
	} else {
		rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);

		function hex(x) {
			return("0" + parseInt(x).toString(16)).slice(-2);
		}
		return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
}
function printFunction() {
	//	var str = $('picture').children('img').attr('src'); 
	//	var img = '<img src='+str+' /> '; 
	var URL = $('picture').children('img').attr('src');
	var W = window.open(URL);
	W.window.print();
	//$('#printImageContent').print();
}

function downloadFunction() {
	var str = $('picture').children('img').attr('src');
	//var x = $(this).parent().parent().attr("role");
	var ar = str.split("/");
	var co_alias = ar[4];
	var p_alias = ar[5];
	var ps_dt2 = ar[6];
	var imageN = ar[7];
	var name = ar[4] + '/' + ar[5] + '/' + ar[6] + '/' + ar[7];
	//alert(img_name);exit;
	//var name = $(this).parent().parent().parent().closest('a').children().attr("alt");
	//alert(name);
	var link = document.createElement('a');
	link.href = str;
	link.download = name;
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
}
$(window).scroll(function() {
	if($(window).scrollTop())
		if (($(window).scrollTop() + 10)  >=  $(document).height() - $(window).height()){
		 // add loader 
		// $('#ajax_loader').fadeIn(200);
		loadbarFoot();
		$("#loadMore").trigger('click');
		
	}
});
$("#loadMore").click(function(){

                var current  = $("#current").val();
                var next  = $("#next").val(); 
                var total = $("#total").val();
                var totalImages = $("#totalImages").val();
				if ($("div[class*='middle']").length == totalImages) {
					$('.loaderOnLoad').hide();
				}else{
					$('.loaderOnLoad').show();
				}
                if(parseInt(next) > parseInt(total)){
					
                    $("#loadMore").css('display','none');
					$('#ajax_loader').fadeOut(200);
                    //alert('No more images');
                    return false;
                }

                // new images append to div
                var images_loading  = $("#image_"+next).val().split(',');
                $.each(images_loading , function(index, val) { 
                    
                      imgName = val.split('.');
                            
                            var sub_html = '<div style="text-align:center;"><p style="text-align:center;"><?=date('dS F Y',strtotime($p_date));?> <span style="font-size:24px;color:#FFF;vertical-align: middle;">|</span> <?=$p_name?></p><p style="text-align:center;"><button type="button" onclick="downloadFunction()" id="lg-download-1" aria-label="Download" title="Download Image" class="button btn-download1" style="display:inline-block;cursor:pointer;"><span style="color:#fff"><i class="far fa-arrow-to-bottom" style="font-size: 20px;vertical-align: middle;"></i> &nbsp;Download This</span></button>&nbsp;&nbsp;&nbsp;<button type="button" title="Email Image" class="button btn-email" style="display:inline-block;cursor:pointer" data-toggle="modal" data-target="#myModal"><span style="color:#fff"> <i class="far fa-envelope" style="font-size:20px;vertical-align: middle;"></i> &nbsp;Email This</span></button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="printFunction()"   title="Print Image" class="button btn-print" style="display:inline-block;cursor:pointer"><span style="color:#fff" ><i class="fal fa-print" style="font-size: 20px;color: #fff;vertical-align: middle;"></i> &nbsp;Print This</span></button><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >  <div class="modal-dialog">    <div class="modal-content">      <div class="modal-header"> <h4 class="modal-title" id="myModalLabel"></h4></div><div class="modal-body"> </div> <div class="modal-footer"> <a id="closemodal" href="#" class="btn btn-primary" >Close</a> </div> </div></div></div></p></div>'; 
                            var middle_html = '<div class="middle'+imgName[0]+'" <?php if( 500 <340) { echo "style='top: 50%;width:auto;'";}?> >'+
                                        '<div class="text'+imgName[0]+'">'+
                                            '<button type="button" title="Select Image" class="button btn-cart <?php if(500>340) { echo " left ";}?> " style="<?php if(500>340) { echo " float:left; ";}?>font-size: 24px;border:none;background:none;"> <i class="fal fa-circle" style="font-size:32px;<?php if(500>340) { ?> margin-bottom: 25px; <?php } ?>"></i> </button>'+
                                            '<button type="button"  title="Click to view Image in Fullscreen" aria-label="Toggle fullscreen" class=" lg-icon " style="font-size: 24px;border:none;background:none;"><i class="fas fa-expand" <?php if(500>340) { ?> style="margin-bottom: 20px;" <?php } ?> <?php if(500<340) { ?> style="margin: 5px 0px;" <?php } ?>></i></button>'+
                                            '<button type="button" title="Download Image" id="lg-download-1" aria-label="Download" class="btn-download <?php if(500>340) { echo " right ";}?>" style="<?php if(500>340) { echo " float:right; ";}?>font-size: 24px;border:none;">'+
                                            '<i class="fal fa-arrow-to-bottom" style="background:#337ab7;"></i></button>'+
                                            '<div style="clear:both;"></div>'+
                                        '</div>'+
						                '</div>';
                             $("#animated-thumbnails-gallery").append("<a data-src='https://www.skyviewaerialphotography.com.au/cdn/org/"+$("#folder").val()+"/"+$("#p_name").val()+"/"+$("#p_date").val()+"/"+val+"' class='gallery-item"+imgName[0]+"  jg-entry jg-entry-visible'  onmouseover='showOptions(this)' onmouseout='hideOptions(this)'  data-attr-id='"+imgName[0]+"'  data-sub-html='"+sub_html+"'  >"+
                                "<img class='image"+imgName[0]+"' src='https://www.skyviewaerialphotography.com.au/cdn/web/"+$("#folder").val()+"/"+$("#p_name").val()+"/"+$("#p_date").val()+"/"+val+"'/>"+middle_html+"</a>");
                             
                     /*$(".image"+imgName[0]).css({
						"opacity": "1",
						"display": "block",
						"width": "100%",
						"height": "auto",
						"transition": ".5s ease",
						"backface-visibility": "hidden",			
					});
        
        
                   
        $(".middle"+imgName[0]).css({

            "transition": ".5s ease",
			"opacity": "0",
			"position": "absolute",
			"top": "90%",
			"left": "50%",
			"transform": "translate(-50%, -50%)",
			"-ms-transform": "translate(-50%, -50%)",
			"text-align": "center",
			"width": "100%",
			"background-color": "transparent !important",
			"border": "none !important",
			"border-color": "transparent !important",
			
        });
        
        
        $(".middle"+imgName[0]+" .fa").css({
            "font-size": "32px",
			"vertical-align": "text-bottom",
			"color": "#FFF",
        });
        $(".middle"+imgName[0]+" .fas").css({
            "font-size": "32px",
			"vertical-align": "text-bottom",
			"color": "#FFF",
        });
        $(".middle"+imgName[0]+" .fad").css({
            "font-size": "32px",
			"vertical-align": "text-bottom",
			"color": "#FFF",
        });
        $(".middle"+imgName[0]+" .fal").css({
            "font-size": "32px",
			"vertical-align": "text-bottom",
			"color": "#FFF",
        });
        $(".middle"+imgName[0]+" .far").css({
            "font-size": "32px",
			"vertical-align": "text-bottom",
			"color": "#FFF",
        });
        
                
        $(".text"+imgName[0]).css({
            "background-color": "transparent",
			"color": "white",
			"font-size": "16px",
			"padding": "20px 10px",

			
        });
        
        
        
		$(".text"+imgName[0]+" .fa").css({
            "border": "1px solid",
			"padding": "5px 10px",
			"border-radius": "5px",
        });
        $(".text"+imgName[0]+" .fas").css({
            "border": "1px solid",
			"padding": "5px 10px",
			"border-radius": "5px",
        });
        $(".text"+imgName[0]+" .fad").css({
            "border": "1px solid",
			"padding": "5px 10px",
			"border-radius": "5px",
        });
        $(".text"+imgName[0]+" .fal").css({
            "border": "1px solid",
			"padding": "5px 10px",
			"border-radius": "5px",
        });
        $(".text"+imgName[0]+" .far").css({
            "border": "1px solid",
			"padding": "5px 10px",
			"border-radius": "5px",
        });*/
                    
                    
        });

				//loadGallery();		
                $("#animated-thumbnails-gallery").justifiedGallery('norewind');
				//
                        
                $("#current").val(next);
                $("#next").val(parseInt(next) + 1);
                /*var length = $('.lg-container').length;
				$('.lg-container').each(function(index, element) {
				    if (index === (length - 1)) {
				              console.log(element)
				     }else{
				        $(this).html(' ')
				    }
				    
				})*/
            });
$(document).ready(function(){
	$gallery = $("#animated-thumbnails-gallery");
	 // ajax call to load images
	 var url = "<?php echo SITEURL; ?>"; 
	 $.ajax({
	    url: url+"api/getLazyImages.php",
	    type : "post",
	    dataType : 'JSON',
	    data : { folder : $("#folder").val(),"p_name" : $("#p_name").val(), "p_date" : $("#p_date").val() },
	    beforeSend: function( xhr ) {
	       console.log('images loading');
	    }
	    })
	    .done(function( data ) {
	    	$('#totalImages').val(data.total);
	       if(parseInt(data.total) != 0){
	            for (let i = 0; i < data.images.length; i++) {
	                $("#lazyimages").append("<input type='hidden'  id='image_"+i+"' value='"+data.images[i].join()+"' />");
	                $("#total").val(i);
	            }   

	             
	            $.each(data.images[0] , function(index, val) { 

	                imgName = val.split('.');
	                
	                var sub_html = '<div style="text-align:center;"><p style="text-align:center;"><?=date('dS F Y',strtotime($p_date));?> <span style="font-size:24px;color:#FFF;vertical-align: middle;">|</span> <?=$p_name?></p><p style="text-align:center;"><button type="button" onclick="downloadFunction()" id="lg-download-1" aria-label="Download" title="Download Image" class="button btn-download1" style="display:inline-block;cursor:pointer;"><span style="color:#fff"><i class="far fa-arrow-to-bottom" style="font-size: 20px;vertical-align: middle;"></i> &nbsp;Download This</span></button>&nbsp;&nbsp;&nbsp;<button type="button" title="Email Image" class="button btn-email" style="display:inline-block;cursor:pointer" data-toggle="modal" data-target="#myModal"><span style="color:#fff"> <i class="far fa-envelope" style="font-size:20px;vertical-align: middle;"></i> &nbsp;Email This</span></button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="printFunction()"   title="Print Image" class="button btn-print" style="display:inline-block;cursor:pointer"><span style="color:#fff" ><i class="fal fa-print" style="font-size: 20px;color: #fff;vertical-align: middle;"></i> &nbsp;Print This</span></button><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >  <div class="modal-dialog">    <div class="modal-content">      <div class="modal-header"> <h4 class="modal-title" id="myModalLabel"></h4></div><div class="modal-body"> </div> <div class="modal-footer"> <a id="closemodal" href="#" class="btn btn-primary" >Close</a> </div> </div></div></div></p></div>'; 
	                var middle_html = '<div class="middle'+imgName[0]+'" <?php if( 500 <340) { echo "style='top: 50%;width:auto;'";}?> >'+
	                            '<div class="text'+imgName[0]+'">'+
	                                '<button type="button" title="Select Image" class="button btn-cart <?php if(500>340) { echo " left ";}?> " style="<?php if(500>340) { echo " float:left; ";}?>font-size: 24px;border:none;background:none;"> <i class="fal fa-circle" style="font-size:32px;<?php if(500>340) { ?> margin-bottom: 25px; <?php } ?>"></i> </button>'+
	                                '<button type="button"  title="Click to view Image in Fullscreen" aria-label="Toggle fullscreen" class=" lg-icon " style="font-size: 24px;border:none;background:none;"><i class="fas fa-expand" <?php if(500>340) { ?> style="margin-bottom: 20px;" <?php } ?> <?php if(500<340) { ?> style="margin: 5px 0px;" <?php } ?>></i></button>'+
	                                '<button type="button" title="Download Image" id="lg-download-1" aria-label="Download" class="btn-download <?php if(500>340) { echo " right ";}?>" style="<?php if(500>340) { echo " float:right; ";}?>font-size: 24px;border:none;">'+
	                                '<i class="fal fa-arrow-to-bottom" style="background:#337ab7;"></i></button>'+
	                                '<div style="clear:both;"></div>'+
	                            '</div>'+
				                '</div>';
	                 $("#animated-thumbnails-gallery").append("<a data-src='https://www.skyviewaerialphotography.com.au/cdn/org/"+$("#folder").val()+"/"+$("#p_name").val()+"/"+$("#p_date").val()+"/"+val+"' class='gallery-item"+imgName[0]+" jg-entry jg-entry-visible'  data-sub-html='"+sub_html+"' data-attr-id='"+imgName[0]+"' onmouseover='showOptions(this)' onmouseout='hideOptions(this)' >"+
	                    "<img class='image"+imgName[0]+"' src='https://www.skyviewaerialphotography.com.au/cdn/web/"+$("#folder").val()+"/"+$("#p_name").val()+"/"+$("#p_date").val()+"/"+val+"'/>"+middle_html+"</a>");
	                 
	                 
	      /*$(".image"+imgName[0]).css({
					"opacity": "1",
					"display": "block",
					"width": "100%",
					"height": "auto",
					"transition": ".5s ease",
					"backface-visibility": "hidden",


			 });


	       
	$(".middle"+imgName[0]).css({

	"transition": ".5s ease",
	"opacity": "0",
	"position": "absolute",
	"top": "90%",
	"left": "50%",
	"transform": "translate(-50%, -50%)",
	"-ms-transform": "translate(-50%, -50%)",
	"text-align": "center",
	"width": "100%",
	"background-color": "transparent !important",
	"border": "none !important",
	"border-color": "transparent !important",

	});



	$(".middle"+imgName[0]+" .fa").css({
	"font-size": "32px",
	"vertical-align": "text-bottom",
	"color": "#FFF",
	});
	$(".middle"+imgName[0]+" .fas").css({
	"font-size": "32px",
	"vertical-align": "text-bottom",
	"color": "#FFF",
	});
	$(".middle"+imgName[0]+" .fad").css({
	"font-size": "32px",
	"vertical-align": "text-bottom",
	"color": "#FFF",
	});
	$(".middle"+imgName[0]+" .fal").css({
	"font-size": "32px",
	"vertical-align": "text-bottom",
	"color": "#FFF",
	});
	$(".middle"+imgName[0]+" .far").css({
	"font-size": "32px",
	"vertical-align": "text-bottom",
	"color": "#FFF",
	});







	$(".text"+imgName[0]).css({
	"background-color": "transparent",
	"color": "white",
	"font-size": "16px",
	"padding": "20px 10px",


	});



	$(".text"+imgName[0]+" .fa").css({
	"border": "1px solid",
	"padding": "5px 10px",
	"border-radius": "5px",
	});
	$(".text"+imgName[0]+" .fas").css({
	"border": "1px solid",
	"padding": "5px 10px",
	"border-radius": "5px",
	});
	$(".text"+imgName[0]+" .fad").css({
	"border": "1px solid",
	"padding": "5px 10px",
	"border-radius": "5px",
	});
	$(".text"+imgName[0]+" .fal").css({
	"border": "1px solid",
	"padding": "5px 10px",
	"border-radius": "5px",
	});
	$(".text"+imgName[0]+" .far").css({
	"border": "1px solid",
	"padding": "5px 10px",
	"border-radius": "5px",
	});*/





	   
	                
	});
	                 
	                
	            loadGallery();
	            
	            $("#current").val(0);
	            $("#next").val(0 + 1);
	            
	            //$("#loadMore").css('display','block');
	       }else{
	           alert('No images found.');
	       }
	    });
	
	function loadGallery(){
        $("#animated-thumbnails-gallery").justifiedGallery({   
                    captions: false,
                    lastRow: "center",
                    rowHeight: 180,
                    speed: 500,
                    appendSubHtmlTo: ".lg-item",
                    margins: 5
                }).on("jg.complete", function() {
		        	window.lightGallery(document.getElementById("animated-thumbnails-gallery"), {
                        mode: 'lg-fade',
                        download: false,
                        animateThumb: false,
                        thumbnail: false,
                        plugins: [lgAutoplay, lgComment, lgFullscreen, lgHash, lgPager, lgRotate, lgShare, lgVideo, lgZoom, lgThumbnail],
                        mobileSettings: {
                            controls: true,
                            showCloseIcon: true,
                            download: false,
                            rotate: false
                        }
                    });

                    const $lgGalleryMethods = document.getElementById('animated-thumbnails-gallery');
                    let methodsInstance;
                    $lgGalleryMethods.addEventListener('lgAfterOpen', () => {
                        document.querySelector('.lg-fullscreen').addEventListener('click', () => {
                            $(".lg-sub-html").hide();
                        });
                    });
                    
                    
                    $lgGalleryMethods.addEventListener('lgAfterClose', () => {
                        document.querySelector('#lg-close-1').addEventListener('click', () => {
                            $(".lg-sub-html").show();
                        });
                    });
                    
                });
				
    }

$('body').on('click','.btn-cart',function(e) {

	var cnt;
	if(eval($('#countImage').html()) != 0) {
		cnt = eval($('#countImage').html());
	} else {
		cnt = 0;
	}
	var color = '';
	//var x = $(this).parent().parent().parent().css('background-color');
	var x = $(this).parent().parent().parent().closest('a').children().css('background-color');
	//alert(x);
	color = rgb2hex(x);
	if(color == '#000000' || color == '' || color == 'transparent') {
		var str = $(this).parent().parent().parent().closest('a').children().css("padding", "5px");
		var str = $(this).parent().parent().parent().closest('a').children().css("background-color", "#337ab7");
		var str = $(this).parent().parent().parent().closest('a').children().css("border", "none");
		// console.log($(this).parent().parent());
		var subdiv = $(this).parent().parent().css("opacity", "1 !important");
		var icon = $(this).children().css("color", "#337ab7");
		var icon = $(this).children().css("background-color", "#FFF");
		var sel = $(this).children().addClass("fa-check-circle");
		var sel2 = $(this).children().removeClass("fa-circle");
		cnt++;
		//alert("You have selected Image.");
	} else {
		$(this).parent().parent().parent('img').css("border-color", "");
		var str = $(this).parent().parent().parent().closest('a').children().css("padding", "");
		var str = $(this).parent().parent().parent().closest('a').children().css("background-color", "");
		var str = $(this).parent().parent().parent().closest('a').children().css("border", "5px solid");
		var str = $(this).parent().parent().parent().closest('a').children().css("border-color", "#000");
		var subdiv = $(this).parent().parent().css("opacity", "");
		var icon = $(this).children().css("color", "#fff");
		var icon = $(this).children().css("background-color", "");
		var sel = $(this).children().addClass("fa-circle");
		var sel2 = $(this).children().removeClass("fa-check-circle");
		cnt--;
		//alert("You have removed image from selection.");
	}
	$('#countImage').html(cnt);
	return false;
});
function showBottomNavigationSlider(){
 	$(".lg-sub-html").show();
 	$("#lg-inner-1").css({"bottom": "100px"});
}

function hideBottomNavigationSlider(){
 	$(".lg-sub-html").hide();
 	$("#lg-inner-1").css({"bottom": "0px"});
}


document.addEventListener('fullscreenchange', (event) => {
    
// document.fullscreenElement will point to the element that
// is in fullscreen mode if there is one. If there isn't one,
// the value of the property is null.

if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
//  	$(".lg-sub-html").hide();
 	hideBottomNavigationSlider();
}
else {
    console.log('Leaving full-screen mode.');
//  	$(".lg-sub-html").show();
    showBottomNavigationSlider();
}
});

function closeWindow() {
    saveModal.style.display = "none";
    loadModal.style.display = "none";
}
document.addEventListener('keydown', function(event){
						    
	if(event.key === "Escape"){
	   	$(".lg-sub-html").show();
	}
});

$(document).on('click', '.btn-email', function(e) {
	e.preventDefault();
	e.stopPropagation();
	$("#myModal").attr({
		"opacity": "1",
	});
	$('#myModal').css('opacity', '1');
	/*
var str = $('picture').children('img').attr('src');

var ar =  str.split("/");
//http://localhost:81/newskyview/cdn/org/abbotsleigh/abbotsleigh-new-sports-hall/24-Sep-2014/1DX_6994.jpg									
var co_alias = ar[3];
var p_alias = ar[4];
var ps_dt2 = ar[5];
var imageN = ar[6];
*/
	var str = $('picture').children('img').attr('src');
	//var x = $(this).parent().parent().attr("role");
	var ar = str.split("/");
	var co_alias = ar[3];
	var p_alias = ar[4];
	var ps_dt2 = ar[5];
	var imageN = ar[6];
	//	var img_name = ar[4] + '/' + ar[5]+ '/' + ar[6]+ '/' + ar[7];
	var emailBox = '<p> <span id="emailMsg"></span> </p> <div class="input-group-addon">@</div> <input class="form-control" type="email" placeholder="Enter email" id="txtEmailQC">';
	var imgInfoTitle = 'SEND PHOTO VIA EMAIL';
	var emailFooter = '<a id="closemodal" href="#" class="btn btn-primary" >Close</a><a id="sendEmail" href="#" class="btn btn-primary" >Send Email</a>';
	$('#myModalLabel').html(imgInfoTitle);
	$('.modal-footer').html(emailFooter);
	$('.modal-body').empty();
	$('.modal-body').html(emailBox);
});
$(document).on('click', '#sendEmail', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var address = $("#txtEmailQC").val();
	if(reg.test(address) == true) {
		/*	var str = $('picture').children('img').attr('src'); 
			var ar =  str.split("/");
			//http://localhost:81/newskyview/cdn/org/abbotsleigh/abbotsleigh-new-sports-hall/24-Sep-2014/1DX_6994.jpg									
			 //www.skyviewaerialphotography.com.au/fullscreen.php?img_name=cdn/org/abbotsleigh/abbotsleigh-new-sports-hall/24-Sep-2014/1DX_6992.jpg&hid_pname=abbotsleigh-new-sports-hall&hid_coname=John%20Doran&hid_date=2014-09-24&hid_date1=2014-09-24&no=0
			var co_alias = ar[3];
			var p_alias = ar[4];
			var ps_dt2 = ar[5];
			var imageN = ar[6]; 
			
			var img_name = 'cdn/org/' + ar[3] + '/' + ar[4]+ '/' + ar[5]+ '/' + ar[6];*/
		var str = $('picture').children('img').attr('src');
		//alert(str);
		//var x = $(this).parent().parent().attr("role");
		var ar = str.split("/");
		var co_alias = ar[3];
		var p_alias = ar[4];
		var ps_dt2 = ar[5];
		var imageN = ar[6];
		var img_name = ar[3] + '/' + ar[4] + '/' + ar[5] + '/' + ar[6];
		//	alert(img_name);exit;
		//var i_value = img_name; 
		//var hid_pname =  p_alias;
		//var hid_date = '<?=$_REQUEST['hid_date']?>';
		//var hid_date1 = '<?=$_REQUEST['hid_date1']?>';
		//var no = '<?=$_REQUEST['no']?>';
		$url = 'https://www.skyviewaerialphotography.com.au/emailFullscreen.php?report=' + img_name + '&address=' + address + '&str=' + str;
		showloader = true;
		$.ajax({
			type: 'GET',
			url: $url,
			success: function(data) {
				var emailMsgInfo = 'Email sent successfully';
				$('#emailMsg').html(emailMsgInfo);
				$('#emailMsg').addClass('text-success');
			}
		})
	} else {
		var emailMsgInfo = 'Please provide valid email address';
		$('#emailMsg').html(emailMsgInfo);
		$('#emailMsg').addClass('text-danger');
	}
});

$('#chkAll').click(function() {
	var cnt = 0;
	$("a[class^='gallery-item']").each(function() {
		$(this).children('img').css({"background-color":"#337ab7","padding":"5px"});
		$("div[class*='middle']").css({"opacity": "1"});
		cnt++;
	});
	$('#countImage').html(cnt - 1);
});
$('#chkNone').click(function() {
	$("a[class^='gallery-item']").each(function() {
		$(this).children('img').css("background-color", "");
		$("div[class*='middle']").css({"opacity": "0"});
	});
	$('#countImage').html(0);
});
});
</script>