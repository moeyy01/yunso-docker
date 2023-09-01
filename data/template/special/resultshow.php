<div style="padding: 20px; background-color:#f2f2f2 ;width:100%;max-width:850px;
    MARGIN: 0 AUTO;" id="Searchshow">
<?php
$token=@$_GET['token'];
$word= @$_GET['keyword'];
$page=(empty(@$_GET['page'])||@$_GET['page']<1)?1:@$_GET['page'];
$limit=10;
$mode= @$_GET['mode'];
$type= @$_GET['type'];
$CPerson='';
$search_data=get_curl($word,$limit,$page,$token,$CPerson,$mode,$type);
$search_datay=json_decode($search_data);


if($search_datay->code!==0 || $search_datay->Query_result_Total==0){
if($search_datay->Query_result_Total==0){
    $search_datay->code=null;
    $search_datay->msg="没有查找到匹配内容";
}
$html_data=gethtmlMsg("{$search_datay->code} {$search_datay->msg}。",'');
}else{
?>
<div style="font-size:1.2em;color:#777;margin-bottom:1em;
     padding-bottom: 15px;
    color: #999; 
    text-align: left;">找到相关结果约<?php echo $search_datay->Query_result_Total;?> 个;</div>

<?php
      

           foreach ($search_datay->Data as $value){
               $i++;
               

               ?>
               
               <div class="layui-card" style="margin-bottom: 1em;min-height:2em;border-radius: 0.7em;" >

<div class="layui-card-header" style="height:unset;display: flow-root;">

<div style="float: ;font-size:1.1em">
<?php echo $i;?>、<i class="layui-icon" style="font-size: 1em; color: #1E9FFF;" id="scrstate"></i> 
<u><a href="<?php echo $value->Scrurl;?>" rel="noreferrer" target="_blank" pass="<?php echo $value->Scrpass;?>"><?php echo $value->ScrName;?></a></u>
</div>


</div>



<div class="layui-card-body">

<i class="layui-icon layui-icon-time" style="font-size: 0.8em; color: #1E9FFF;"></i> <?php echo date("Y/m/d h:i:s",($value->addtime)/1000);?><p></p>

<p class="result container p"><?php  empty($value->Scrpass) ? "":"访问密码 ".$value->Scrpass ;?></p>
<div class="layui-card" style="margin-bottom: 1em;min-height:2em;">


<p>
</div>
<span class="layui-badge-rim" style="border-radius: 30px;
    font-size: 0.7em;"> 

    <?php echo( $value->Scrurlname);?></span>  

</p>
    </div>
</div>
               
               <?php
           }
}


echo $html_data;
?>
<?php echo "Processed in ".$search_datay->time."second(s)  .";?>
<div  class="layui-card" id="laypage" style="margin-bottom: 1em;min-height:2em;padding-left: 1em;"></div>

<script>
function search_page(){

var laypage = layui.laypage;
layui.use(['form'], function() {
form=layui.form;

})


$("#keyword").val('<?php echo urldecode($word);?>');

  laypage.render({
    elem: 'laypage'
    ,count: <?php echo $search_datay->Query_result_Total;?>
    ,layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
    ,limit: <?php echo $limit;?>
    ,curr: <?php echo $page;?>
    ,jump: function(obj,first){
   if(!first){
   window.location.href="./?type=&keyword=<?php echo $word;?>&page="+obj.curr;
    }
    
  }});

}
</script>
<?php


function gethtmlMsg($msg,$debuginfo=""){
$html_notfound= <<<EOF
<font style="font-size: 5em;">:-(</font><h2>{$msg}</h2>
<br/>    温馨提示：
<li>·请检查您的输入是否正确</li>
<li>·信息未收录，请提交给我们</li>
<li>·如有任何意见或建议，请及时反馈给我们</li>
EOF;

return $html_notfound;
}
?>
</div>
<?php
function get_curl(&$Cword,$Climit,$CPaye,$CToken,$CPerson,$searchmode=1,$type){
    $CPaye=$CPaye==0?1:$CPaye;
    $userip=@user::getip();//给请求站来源IP 防止误杀
    $Cword=urlencode($Cword);
    
    if(!API_localization){
        $url=API_url.'opensearch.php?wd='.$Cword.'&mode=90001&from='.$userip.'&page='.$CPaye;
    }else{
        $url=API_search_url.'?key='.API_urlKey.'&wd='.$Cword.'&mode=90001&from='.$userip.'&page='.$CPaye;
    }
    
    
    list($data,$httpcode)=method_curl($url,1);
  if($httpcode==200){
  }else{
      $data=json_encode(array("code"=>"-9","msg"=>"请求API失败 HTTP ".$httpcode));
  }
    return $data;
}
