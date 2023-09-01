<?php 
require_once "data/class/class_index.php";

if(!empty(@$_GET['keyword'])){$filename='searchshow';}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $ConWeb_keywords;?>">
<meta name="description" content="<?php echo $ConWeb_description;?>">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta name="referrer" content="never">
<!-- <link rel="shortcut icon" type="image/ico" href="<?php echo scr_icon;?>"> -->
<link rel="stylesheet" href="data/css/tabler.min.css">
<title><?php if(@$word!=""){echo "@$word - ";};echo $ConWebName;?> - <?php echo $ConWebNameM;?></title>
<link rel="stylesheet" href="data/layui/css/layui.css">

</head>
<body style="
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
">
<script>var t1 = new Date().getTime();</script>
<script src="data/js/jquery/3.4.1/jquery.min.js"></script>

<?php
@include_once 'data/template/default/common/header.php';
?>
	<div class="logo" style="width: 100%;text-align: center;margin-top: 80px;margin-bottom:20px;">
		<a onclick="read_index();"><?php echo scr_logo;?></a>
	</div>

    <div id="body" class="layui-row" style="margin-left:5px;margin-right:5px;min-width:350px;margin:0 auto;width:90%;">

<div class="layui-form" id="Navigation_Search">
   <div class="layui-col-md6" style="width:100%;max-width:600px;margin:0 auto;float:none;margin-bottom: 1em;">
       
       

	<input class="layui-input" type="text" style="float: left;width:70%;" lay-verify="required" placeholder="请输入关键词" autocomplete="off" id="keyword" value="">
	<button id="search" class="layui-btn layui-btn-normal" style="width:25%;" >云搜一下</button>
</div>
    </div>	
 
        <div class="layui-row" id="Navigation_body" >
<?php 

$filename=empty($filename)?"index":$filename;
$filename="data/template/special/".$filename.".php";

if(file_exists($filename)==false){echo "无权访问";}else{include_once($filename);}

?>
    </div> 
    </div>
<script src="data/layui/layui.js"></script>
<script>
;!function(){
  var layer = layui.layer
  ,form = layui.form
  ,laypage = layui.laypage
  ,element = layui.element

}();



function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
$("#search").click(function(){
	var keyword=$("#keyword").val();
	if(isEmpty(keyword)){
	layer.msg("^-^ 想要找些什么呢?");
	}else{
    window.location.href="/?type=&keyword="+keyword;
	}

});

function isQQAPP(){
    var isIosQQ = ( /(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent) && /\sQQ/i.test(navigator.userAgent));
    var isAndroidQQ = ( /(Android)/i.test(navigator.userAgent) && /MQQBrowser/i.test(navigator.userAgent) && /\sQQ/i.test((navigator.userAgent).split('MQQBrowser')));
    return isIosQQ || isAndroidQQ ? true :false;
}
function isEmpty(obj){
    if(typeof obj == "undefined" || obj == null || obj == ""){
        return true;
    }else{
        return false;
    }
}
</script>
<?php 
@include_once 'data/template/default/common/footer.php'; 
?>
</body>
</html>