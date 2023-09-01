<?
foreach ($_GET as $key=>$value)
{@$i++;
@$url.=($i==1?"":"&");
$url.="$key=$value";
}
?>
<div style="padding: 20px; background-color: #F2F2F2;" id="Searchshow">
页面加载中，请等待...
</div>
<script>
$(function(){
    ReadSearchResults();
})
function ReadSearchResults(){
  readhtml("resultshow","<?php echo $url;?>");
}
</script>
