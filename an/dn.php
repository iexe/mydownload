<?php 
require $_SERVER['DOCUMENT_ROOT']."/wp-config.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
.clear{clear:both}
a {color:#018EE8;text-decoration:none;}
a:hover {text-decoration:underline;/*color:#FF0000;*/}
li {list-style-type:none;}
body {
	color:#888888;
	font-size:12px;
	margin:20;
	background:url("../images/mainbg.gif") repeat-x;
	padding: 20px;
}
#header {width:990px;margin:0 auto;height:100px;}
#logo a{width:240px;height:100px;display:block;float:left}
#logo span{display:none}
#gsearch {float:right;padding-top:25px}
#contain {width:990px;margin:0 auto;overflow:hidden}
#sidebar {width:250px;float:left;border:1px solid #D2E8FA;}
#main {width:738px;float:left;}
#downcenter{margin-bottom:10px;}
#downtop_left,#downtop_right{width:100%;/*float:left;width:460px;*/}
#downtop_right{display:none/*width:260px*/}
#declaration {margin:0 10px 10px 0;line-height:18px;}
#declaration_text{border:1px solid #DDDDDD;padding:10px;}
#filefrom {font-size:12px;font-weight:bold;margin:0;}
#download {clear:both;overflow:hidden;margin-bottom:20px}
#down_ad {background:#F9F9F9;border:1px solid #DDDDDD;padding:5px 5px 5px 20px;}
#down_link {margin-top:10px;background:#EDF5FC;border:1px solid #AACCEE;padding:5px 5px 5px 20px;}
.leftside,.rightside {float:left;width:360px;}
.rightside {float:right;width:346px;margin-right:15px;/*border:1px solid #DDDDDD;padding:0 10px;*/}
#tips{line-height:20px;border:1px solid #DDDDDD;margin:10px 10px 10px 0;padding:5px 10px;}
#tips ol{margin:0;padding-left:0}
#views{/*color:red*/}
.part{padding:10px 0;border-bottom:1px solid #DDDDDD}
.part_content{line-height:18px;padding:0 0 0 10px}
.part_content p{margin:5px 0}
#footer_bar{padding-top: 10px; clear: both; text-align: right;}
#footer{margin:30px auto 10px auto;padding:5px 0;width:970px;text-align:center;border:1px solid #DDDDDD}
#download_button span{background:#c83400 url("http://localhost/wp-content/plugins/myhtml/an/images/dl_icon.png") no-repeat;display:block;width:40px;height:40px;position:absolute;top:0;left:0;cursor:pointer;}
#download_button_part{background:#f9f9f9;border-left:1px dashed #ccc;border-right:1px dashed #ccc;text-align:center}
#download_button{margin:10px auto;height:40px;line-height:40px;font-size:14px;background:#d13b00;color:#fff;text-align:center;width:170px;display:block;text-decoration:none;cursor:pointer;padding-left: 40px;position:relative;display:inline-block;}
#download_button:hover{background:#e73f00}

#download_button{ background-image:url(images/dl_icon.png)}
#download_button:hover span{background-position:-40px 0}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2){  
	#download_button span{background-image: url("http://localhost/wp-content/plugins/myhtml/an/images/dl_icon@2x.png");background-size: 80px 40px; }
}

/* ==============================
 *   RSS Post List
 * ==============================*/
.latest_posts{margin:0;padding:1px;}
.latest_posts h3{height:25px;line-height:25px;margin:0;padding:0;background:#D2E8FA;text-align:center}
.latest_posts li{padding:5px;list-style:none;border-top:1px dashed #D2E8FA}
.latest_posts li a{display:block}
.br {
	border-top-width: 1px;
	border-bottom-width: 1px;
	border-top-style: inset;
	border-bottom-style: inset;
	border-top-color: #000;
	border-right-color: #000;
	border-bottom-color: #000;
	border-left-color: #000;
}
.br {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-color: #6E6E6E;
	border-right-color: #6E6E6E;
	border-bottom-color: #6E6E6E;
	border-left-color: #6E6E6E;
}
.ba {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-color: #484642;
	border-right-color: #484642;
	border-bottom-color: #484642;
	border-left-color: #484642;
}
.bb {
	border-bottom-width: 1px;
	border-bottom-color: #484642;
}
</style>

</head>

<body>
<?php 
	$nametxt = $_GET['nametxt'];
	$name1 = $_GET['name1'];
	$name2 = $_GET['name2'];
	$name3 = $_GET['name3'];
	$name4 = $_GET['name4'];
	$name5 = $_GET['name5'];
	$name6 = $_GET['name6'];
	$csurl = $_GET['csurl'];

 ;?>
<div><strong>下载声明：</strong>
  <div>
  <?php if ($mm = get_option('iiexeplugin_description')){echo '<p>'.$mm .'</p>';}else{?>
    <p>本站所有软件和资料均为软件作者提供或网友推荐发布而来，仅供学习和研究使用，不得用于任何商业用途。如本站不慎侵犯你的版权请联系我</a>，我将及时处理，并撤下相关内容！</p>
      <?php };?>
  </div>
</div>
<div><strong>文件信息：</strong>
  <div>
    <div>
      <p>文件名称:<?php echo $nametxt?><?php echo $name1?></p>
      
      <div class="ad" style="max-height:450px; height:250px;">
      <?php echo stripslashes(get_option('iiexeplugin_analytics')); ?>
      </div>
      
      <div class="br">
        <h2><a href="<?php echo $csurl;?>" target="_blank">去<?php bloginfo('name'); ?>看看关于:<?php echo $nametxt?>的详细介绍文章</a></h2>
      </div>
      
    </div>
    <div>
      
    </div>
  </div>
  <div></div>
</div>
<div id="download_button_part">
  <a id="download_button" target="_blank" href="<?php echo $name2;?>"> 这里下载文件 (网盘)</a>
  
</div>
<div>
  <div class="ba">[更多地址]  | 
  <?php if (!empty($name1)){
 echo'|<a rel="nofollow" target="_blank" href="'.$name2.'">'.$name1.'</a>|'

  ;}?>
  <?php if (!empty($name3)){
 echo'|<a rel="nofollow" target="_blank" href="'.$name4.'">'.$name3.'</a>|'

  ;}?>
  <?php if (!empty($name5)){
 echo'|<a rel="nofollow" target="_blank" href="'.$name6.'">'.$name5.'</a>|'

  ;}

  
  ?>
  
  |</div>
</div>
<div class="bb">如无特殊说明，本站下载内容皆为网络收集</div>
</body>
</html>