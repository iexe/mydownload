<?php

/*
Plugin Name: 下载中心插件
Version:     1.0
Plugin URI:  http://www.iiexe.com
Description: 所有要下载的内容会集中到一个下载中心去下载
Author:      爱程序-Exploit
Author URI:  http://www.iiexe.com
*/

// for add to content ...
/********************************************meta_boxes定义下载内容添加面板***************************************************/

/*调用代码
$ashu_eidtor = get_post_meta($post->ID, "_meta_eidtor_value", true); 
echo $ashu_eidtor； 
*/
$new_meta_boxes =    
array(   
    "title" => array(   
        "name" => "_meta_title",   
        "std" => "",   
        "title" => "标题",   
        "type"=>"title"), 

     

    "text0" => array(   
        "name" => "_meta_text0",   
        "std" => "",      
        "title" => "文件名",   
        "type"=>"text"),   
  
  /*  "textx" => array(   
        "name" => "_meta_text",   
        "std" => "下载相关的信息比如 版权 所有者等",      
        "title" => "下载信息",   
        "type"=>"text"),  */

     
    "text1" => array(   
        "name" => "_meta_text1",   
        "std" => "",      
        "title" => "网盘名",   
        "type"=>"text"), 


    "down1" => array(   
        "name" => "_meta_down1",   
        "std" => "",      
        "title" => "下载地址",   
        "type"=>"text"), 

    "text2" => array(   
        "name" => "_meta_text2",   
        "std" => "",      
        "title" => "网盘名",   
        "type"=>"text"), 


    "down2" => array(   
        "name" => "_meta_down2",   
        "std" => "",      
        "title" => "下载地址",   
        "type"=>"text"),

    "text3" => array(   
        "name" => "_meta_text3",   
        "std" => "",      
        "title" => "网盘名",   
        "type"=>"text"), 


    "down3" => array(   
        "name" => "_meta_down3",   
        "std" => "",      
        "title" => "下载地址",   
        "type"=>"text"), 
    
 /* 
    "uploads" => array(   
        "name" => "_meta_uploader",   
        "std" => '',      
        "title" => "图片上传",   
        "type"=>"uploader"),  
           
    "description" => array(   
        "name" => "_meta_description",   
        "std" => "",      
        "title" => "描述",   
        "type"=>"textarea"),   
           
    "category" => array(   
        "name" => "_meta_cate",   
        "std" => "",      
        "title" => "选择分类",   
        "subtype"=> "cat",   
        "type"=>"dropdown"),   
           
    "radio" => array(   
        "name" => "_meta_radio",   
        "std" => 1,      
        "title" => "单选框",   
        "buttons" => array('Yes','No'),   
        "type"=>"radio"),   
           
    "checkbox" => array(   
        "name" => "_meta_checkbox",   
        "std" => 1,      
        "title" => "复选框",   
        "type"=>"checkbox"),   
           
    "checkbox" => array(   
        "name" => "_meta_eidtor",   
        "std" => '',      
        "title" => "编辑器",   
        "type"=>"editor"),   */
           
);   

wp_enqueue_script('kriesi_custom_fields_js', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)). '/js/metaup.js');    
function new_meta_boxes() {   
    global $post, $new_meta_boxes;   
    foreach($new_meta_boxes as $meta_box) {   
        //获取保存的是   
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);   
        if($meta_box_value != "")      
            $meta_box['std'] = $meta_box_value;//将默认值替换为以保存的值   
           
        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';   
        //通过选择类型输出不同的html代码   
        switch ( $meta_box['type'] ){   
            case 'title':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                break;   
            case 'text':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                echo '<input type="text" size="80" name="'.$meta_box['name'].'_value" value="'.$meta_box['std'].'" /><br />';   
                break;   
            case 'textarea':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                echo '<textarea cols="60" rows="3" name="'.$meta_box['name'].'_value">'.$meta_box['std'].'</textarea><br />';   
                break;   
            case 'dropdown':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                if($meta_box['subtype'] == 'cat'){   
                    $select = 'Select category';   
                    $entries = get_categories('title_li=&orderby=name&hide_empty=0');//获取分类   
                }   
                echo '<p><select name="'.$meta_box['name'].'_value"> ';   
                echo '<option value="">'.$select .'</option>  ';   
                foreach ($entries as $key => $entry){   
                    $id = $entry->term_id;   
                    $title = $entry->name;   
                    if ( $meta_box['std'] == $id ){   
                        $selected = "selected='selected'";   
                    }else{   
                        $selected = "";   
                    }   
                    echo "<option $selected value='". $id."'>". $title."</option>";   
                }   
                echo '</select><br />';   
                break;   
            case 'radio':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                $counter = 1;   
                foreach( $meta_box['buttons'] as $radiobutton ) {   
                    $checked ="";   
                    if(isset($meta_box['std']) && $meta_box['std'] == $counter) {   
                        $checked = 'checked = "checked"';   
                    }   
                    echo '<input '.$checked.' type="radio" class="kcheck" value="'.$counter.'" name="'.$meta_box['name'].'_value"/>'.$radiobutton;   
                    $counter++;   
                }   
                break;   
            case 'checkbox':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                if( isset($meta_box['std']) && $meta_box['std'] == 'true' )   
                    $checked = 'checked = "checked"';   
                else  
                    $checked  = '';    
                echo '<input type="checkbox" name="'.$meta_box['name'].'_value" value="true"  '.$checked.' />';   
                break;   
            //编辑器   
            case 'editor':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                wp_editor( $meta_box['std'], $meta_box['name'].'_value' );   
                //带配置参数   
                /*wp_editor($meta_box['std'],$meta_box['name'].'_value', $settings = array(quicktags=>0,//取消html模式
                    tinymce=>1,//可视化模式  
                    media_buttons=>0,//取消媒体上传  
                    textarea_rows=>5,//行数设为5  
                    editor_class=>"textareastyle") ); */  
                break;   
            case 'uploader':   
                echo'<h4>'.$meta_box['title'].'</h4>';   
                //图片预览框   
                if($meta_box['std'] != ''){   
                echo '<span id="'.$meta_box['name'].'_value_img"><img src='.$meta_box['std'].' alt="" /></span>';}   
                echo '<input class="ashu_upload_input" type="text" size="40" value="'.$meta_box['std'].'" name="'.$meta_box['name'].'_value"/>';   
                echo '<input type="button" value="上传" class="ashu_bottom"/>';   
                echo '<br/>';   
                break;  
               
        }             
    }      
}   
  
function create_meta_box() {      
    global $theme_name;      
     
    if ( function_exists('add_meta_box') ) {      
        add_meta_box( 'new-meta-boxes', '爱程序下载插件www.iiexe.com', 'new_meta_boxes', 'post', 'normal', 'high' );      
    }      
}   
function save_postdata( $post_id ) {      
    global $post, $new_meta_boxes;      
     
    foreach($new_meta_boxes as $meta_box) {      
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {      
            return $post_id;      
        }      
     
        if ( 'page' == $_POST['post_type'] ) {      
            if ( !current_user_can( 'edit_page', $post_id ))      
                return $post_id;      
        }       
        else {      
            if ( !current_user_can( 'edit_post', $post_id ))      
                return $post_id;      
        }      
     
        $data = $_POST[$meta_box['name'].'_value'];      
     
        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")      
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);      
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))      
            update_post_meta($post_id, $meta_box['name'].'_value', $data);      
        elseif($data == "")      
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));      
    }      
}   

add_action('admin_menu', 'create_meta_box');      
add_action('save_post', 'save_postdata');   



/***************************************END*************************************************/




$file = WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/myhtml.txt';
$file_name=$file;
$fp=fopen($file_name,'r');
while(!feof($fp))
{

$buffer=fgets($fp);


echo '';
}
fclose($fp);

function myhtml($outer){
	if(!is_single()){ return $outer; }
	global $buffer;
	global $post;
	
	$murl .= ''.WP_PLUGIN_URL.'';
	$murl .='/';
	$murl .=''.dirname(plugin_basename(__FILE__)).'';
	
    $flletext  = get_post_meta($post->ID, '_meta_text0_value', true);
    $flletext1 = get_post_meta($post->ID, '_meta_text1_value', true);
    $flletext2 = get_post_meta($post->ID, '_meta_down1_value', true);
    $flletext3 = get_post_meta($post->ID, '_meta_text2_value', true);
    $flletext4 = get_post_meta($post->ID, '_meta_down2_value', true);
    $flletext5 = get_post_meta($post->ID, '_meta_text3_value', true);
    $flletext6 = get_post_meta($post->ID, '_meta_down3_value', true);
   
$outer .= "\n<!-- Begin myhtml http://www.iiexe.com-->\n";
	$outer .= '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/myhtml.css?v=5">';
	
	$outer .= '<div id="myhtml">';
	//$outer .= $buffer.'<a href=" " target="_blank">下载</a>';
	$outer .= '<div style="width:100%;padding-top:3px;"><div style="white-space: pre; word-spacing: normal; list-style-type: none; padding: 0px; margin: 0px; text-align: center; display: block; float:left"><a>'.$flletext.'</a></div><div align="center" style="border: 1px 1 #999; width:auto"><a href="'.$murl.'/an/index.php?&nametxt='.$flletext.'&name1='.$flletext1.'&name2='.$flletext2.'&name3='.$flletext3.'&name4='.$flletext4.'&name5='.$flletext5.'&name6='.$flletext6.'" target="_blank"><img style=" text-align:center;" src="'.$murl.'/img/down.png"/></a></div></div>';
	$outer .= '<br clear="all"></div>';
	$outer .= "\n<!-- End of myhtml -->\n";
	if (!empty($flletext)){ return $outer; }
	
}

add_filter('the_content', 'myhtml');



/*************************************************************************************************************/
/*////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
add_action('admin_menu', 'iiexeplugin_page');
 
function iiexeplugin_page (){
 
	if ( count($_POST) > 0 && isset($_POST['iiexeplugin_settings']) ){
 
		$options = array ('keywords','description','analytics');
 
		foreach ( $options as $opt ){
 
			delete_option ( 'iiexeplugin_'.$opt, $_POST[$opt] );
 
			add_option ( 'iiexeplugin_'.$opt, $_POST[$opt] );	
 
		}
 
	}

	add_menu_page(__('下载插件'), __('下载插件'), 'edit_themes', basename(__FILE__), 'iiexeplugin_settings');
 
}
 
function iiexeplugin_settings(){?>
 
<style>
 
	.wrap,textarea,em{font-family:'Century Gothic','Microsoft YaHei',Verdana;}
 
	fieldset{width:100%;border:1px solid #aaa;padding-bottom:20px;margin-top:20px;-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;box-shadow:rgba(0,0,0,.2) 0px 0px 5px;}
 
	legend{margin-left:5px;padding:0 5px;color:#2481C6;background:#F9F9F9;cursor:pointer;}
 
	textarea{width:100%;font-size:11px;border:1px solid #aaa;background:none;-webkit-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-moz-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;}
 
	textarea:focus{-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;box-shadow:rgba(0,0,0,.2) 0px 0px 8px;outline:none;}
 
</style>
 
<div class="wrap">
 
<h2>下载插件设置</h2><h2><a style="text-decoration: none"href="http://www.iiexe.com">爱程序设计 BY:Exploit</a></h2>
 
<form method="post" action="">
 
	<fieldset>
 
	<legend><strong>资源下载页面标题</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="keywords" id="keywords" rows="1" cols="70"><?php echo get_option('iiexeplugin_keywords'); ?></textarea><br />
 
				<em>下载页面标题的内容</em>
 
			</td></tr>
 
			<tr><td>
 
				<textarea name="description" id="description" rows="3" cols="70"><?php echo get_option('iiexeplugin_description'); ?></textarea>
 
				<em>下载页面声明或者描述</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<fieldset>
 
	<legend><strong>下载页面广告代码</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="analytics" id="analytics" rows="5" cols="70"><?php echo stripslashes(get_option('iiexeplugin_analytics')); ?></textarea>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="iiexeplugin_settings" value="save" style="display:none;" />
 
	</p>
 
 
 
</form>
 
</div>
 
<?php }

?>

