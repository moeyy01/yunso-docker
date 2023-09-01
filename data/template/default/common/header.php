<?php
$stime=microtime(true); 
?>





<ul class="layui-nav  layui-bg-blue" lay-filter=""style="">
  <li class="layui-nav-item layui-this"><a onclick="read_index()">首页</a></li>



<li class="layui-nav-item" style="right: 1em;position:absolute;padding: 0;"> 


   </li>
</ul>
<script>
;!function(){
  var element = layui.element;
}


</script>
<script>
  var token="<?php echo user::getusertoken();?>";




function read_index(){
window.location.href="/";
}
function outlog(){
    var postdata="{\"funname\":\"useroutlog\"}";
	send_request(postdata,function(data){
	    var json=JSON.parse(data);
	    layer.alert(json.msg, {title: '提示'},function(){window.location.href="//"+location.hostname;});
	});
}

function setCookie(name,value) 
{   var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
}
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return (arr[2]);
    else
        return null;
}

function readhtml(funname,addurl){
    var timeid=new Date().getTime();
	var index=layer.load(0,{shade: 0.3});
	var sign=token+timeid;
	var url="data/content.php?scrtype="+funname+"&token="+token+"&requesttime="+timeid+"&sign="+sign+"&";
	if(!isEmpty(addurl)){
	    url=url+addurl;
	};
	
	
$.ajax({
  url:url,
  type:"GET",
  timeout:15000,
  success:function(data){
	  if(funname=="loadingshow"){
	     $("#Searchshow").html(data); 
	  }else{
	  $("#Navigation_body").html(data);
	  }
	  layer.close(index);search_page();
	if(funname == "index"|| funname=="loadingshow"||funname == "resultshow" ){
		$("#Navigation_Search").show();
	}else{
		$("#Navigation_Search").hide();
	}
    
    
    
  },
error:function(){
      layer.close(index);
layer.confirm('加载失败;是否重新加载?', {
  btn: ['确定','取消'] //按钮
  ,title:'加载失败'
}, function(){
layer.close(index);
readhtml(funname,addurl);
}, function(){
layer.close(index);
});
}}
);
}
</script>
