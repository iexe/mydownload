<?php 
/********************************************************************************************************/

//                                爱程序设计 by：exploit

/*//////////////////////////////////////////////////////////////////////////////////////////////////////*/


require $_SERVER['DOCUMENT_ROOT']."/wp-config.php";

$s = $_SERVER['HTTP_REFERER'];

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>资源下载</title>
		<meta name="description" content="资源下载" />
		<meta name="keywords" content="资源下载" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/popwin.js"></script>
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
    <?php 
	
	
	
	
	$nametxt = $_GET['nametxt'];
	$nametxt = iconv("gb2312","utf-8",$_REQUEST['nametxt']);
	$name1 = $_GET['name1'];
	$name1 = iconv("gb2312","utf-8",$_REQUEST['name1']);
	$name2 = $_GET['name2'];
	$name2 = iconv("gb2312","utf-8",$_REQUEST['name2']);
	$name3 = $_GET['name3'];
	$name3 = iconv("gb2312","utf-8",$_REQUEST['name3']);
	$name4 = $_GET['name4'];
	$name4 = iconv("gb2312","utf-8",$_REQUEST['name4']);
	$name5 = $_GET['name5'];
	$name5 = iconv("gb2312","utf-8",$_REQUEST['name5']);
	$name6 = $_GET['name6'];
	$name6 = iconv("gb2312","utf-8",$_REQUEST['name6']);

	//$edate = $murl.'/dn.php?nametxt=';.$nametxt.';&name=1'.$name1.'&name2='.$name2.'&name3='.$name3.'&name4='.$name4.'&name5='.$name5.'&name6='.$name6.';
	

 
 
	$murl .= ''.WP_PLUGIN_URL.'';
	$murl .='/';
	$murl .=''.dirname(plugin_basename(__FILE__)).'';
	
	$edate = $murl.'/dn.php?nametxt='.$nametxt.';&name1='.$name1.'&name2='.$name2.'&name3='.$name3.'&name4='.$name4.'&name5='.$name5.'&name6='.$name6.'';
	?>


    
    
    
    
    
		<div class="container">
			<!-- Top Navigation -->
			<header>
			  <h1 style="font-family: Microsoft YaHei,Arial,Tahoma;"><?php if ($tt = get_option('iiexeplugin_keywords')){echo $tt;}else{echo"下载中心";};?></h1>	
			</header>
            <h2 style="text-align:center;font-family:Microsoft YaHei,Arial,Tahoma;">文件名：<?php echo $nametxt ;?></h2><a href="www.iiexe.com" title="爱程序设计" target="_blank">　</a><a href="www.iiexe.com" ></a>
			<section class="color-1">
<script>
$(document).ready(function() {
    $("#02230").on('click' , function(){
		popWin.showWin("800","600","选择下载","<?php echo $edate.'&csurl='.$s;?>");
	});
});
</script>
			
			  <p>
   
				<a id="02230" href="javascript:void(0)"><button style="font-family: Microsoft YaHei,Arial,Tahoma;" class="btn btn-3 btn-3e icon-arrow-right">点击下载</button></a>
				</p><p><?php if ($gg = get_option('iiexeplugin_keywords')){echo $gg;}else{?>
        <a>广告位置</a>
            <?php };?></p>
			</section>
			
            <?php if ($mm = get_option('iiexeplugin_description')){echo '<section class="color-3"><div class="bug">'. $mm .'</div></section>';}else{?>
		<section class="color-3"><div class="bug">本站所刊载内容均为网络上收集整理，并且以计算机技术研究交流为目的，所有仅供大家参考、学习，不存在任何商业目的与商业用途。若您需要使用非免费的软件或服务，您应当购买正版授权并合法使用。如果你下载此文件，表示您同意只将此文件用于参考、学习使用而非任何其他用途。
		  <li style="list-style-type:none;">如果您发现本文件已经失效不能下载，请联系站长修正！</li>
		  <li style="list-style-type:none;">有些资源是迅雷专用下载的，如普通下载链接失效，请尝试使用迅雷下载！如果你未安装 [迅雷] 软件可以从<a rel="nofollow" target="_blank" href="http://www.xunlei.com">这里下载安装</a>。</li>
		  <?php };?>
       
		  </ol></div></section>
        </div><!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalButtons7Click = buttons7Click.length,
				totalButtons9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie.has( this, activatedClass ) ) {
					classie.add( this, activatedClass );
					setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>
	</body>
</html>