<div style="width:90%;max-width:800px;    margin: 0 auto;">


<div class="subpixel-antialiased" style="margin-top: 20px;font-size:2em;">今日热搜<br>


</div>
<div id="hot-searches" class="col-xl-10" style="margin-top: 20px;"></div>
<script >
window.addEventListener('load', function() {
  var hotSearchesContainer = document.getElementById('hot-searches');

  fetch('api/top.php')
    .then(response => response.json())
    .then(data => {
      if (data.code === 200) {
        var hotSearches = data.data;
        var html = '';

        hotSearches.forEach(search => {
          var url = './?type=&keyword=' + encodeURIComponent(search.value);
          html += '<span><a href="' + url + '" title="点击打开此热搜" class="badge bg-blue-lt" style="margin-bottom: 10px;">' + search.value + '</a>&nbsp;&nbsp;</span>';
        });

        hotSearchesContainer.innerHTML = html;
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
});

</script>
<li class="hot_ci" style="width: 249px;background-color: rgb(68 177 255 / 20%);height: 38px;display: flex;justify-content: center;align-items: center;margin: auto;margin-top: 20px;">
                                    <a onclick="show_hidden_submit_url()" style="color: rgb(10 88 234 / 80%);">
                                        <strong>云盘分享提交链接(可批量,快速收录)</strong>
                                    </a>
                                </li>
<!--- 来自于upso的数据提交样式！~ 感谢~-->
<div id="div_submit_url" style="display: none;MARGIN-TOP: 20PX;" data-v-027bfd03="" data-v-5c5465b4="" class="search search-form big">
                                <section data-v-027bfd03="" class="inner">
                                    <textarea style="max-width:100%;min-width:100%;height:300px;border-radius: 8px;border: 2px solid rgb(91 141 235 / 80%);" id="submit_url_content" data-v-027bfd03="" type="text" placeholder="
>>>> 分享连接提交，没错，就是这里~ <<<< 
                                            
想让你的分享内容在本站可以搜索到?

想搜索一个链接的文件夹内全部的内容?
                    
收录加速,预计1小时内会加入到搜索,单次不超过20个链接！~一起为优质资源搜索贡献一份力量!

可批量提交，相邻两条链接需要分隔开，不要连着写，系统自动匹配链接!

>>>> 分享连接提交，没错，就是这里~ <<<< 

" class="input border-solid-ddd"></textarea>
                                </section>
                                <ul style="display:flex;list-style:none;justify-content: space-between;align-items: center;flex-wrap: wrap;">
                                    
                                    <li class="hot_ci" style="
                                    width: 100px;
                                    height: 33px;display: flex;justify-content: center;align-items: center;">
                                        <a onclick="show_hidden_submit_url()" style="color:black">
                                            关闭显示
                                        </a>
                                    </li>
                                    
                                    
                                    <li class="hot_ci" style="
                                    width: 100px;
                                    height: 33px;display: flex;justify-content: center;align-items: center;">
                                        <a onclick="$(&quot;#submit_url_content&quot;).val(&quot;&quot;)" style="color:black">
                                            清空内容
                                        </a>
                                    </li>
                                    
                                    <!--li class="hot_ci" style="
                                    width: 100px;
                                    height: 33px;display: flex;justify-content: center;align-items: center;">
                                        <a onclick='$("#submit_url_content").val(bak_submit_countent)' style="color:black">
                                            显示提交内容
                                        </a>
                                    </li-->
                                    
                                    <li class="hot_ci" style="
                                    width: 100px;
                                    background-color: rgb(68 177 255 / 20%);height: 33px;display: flex;justify-content: center;align-items: center;">
                                        <a onclick="submit_url()" style="color: rgb(10 88 234 / 80%);">
                                            <strong>提交收录</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>



<script src="https://moeyy.cn/hitokoto?encode=js&select=%23hitokoto" defer=""></script>

<center>
<p id="hitokoto" style="font-size:1.2em;color: #4f565a;margin-top: 50px;margin-bottom:50px;">:D 获取中...</p></center>
<hr/>


<div style="width:100%;margin-top:50px;text-align: center;"></div>

<center style="min-height:350px;
    margin: 0 auto;
    max-width: 540px;">



</center>


<div></div></div>
<script>
function show_hidden_submit_url(){
    if($("#div_submit_url").css("display")=='block'){
        $("#div_submit_url").css("display","none")
    }else{
        $("#div_submit_url").css("display","block")
    }
}

bak_submit_countent=""
//提交链接
function submit_url(){
    bak_submit_countent=$("#submit_url_content").val()
    submit_countent=$("#submit_url_content").val()
    $("#submit_url_content").val("")
$.get("../../api/opendataentry.php?data="+window.btoa(encodeURIComponent(submit_countent)),function(data,status){
                result_data=JSON.parse(data);
if(result_data.code==200){
		layer.open({
  type: 1,
  title: result_data.msg,
  skin: 'layui-result', //样式类名
  closeBtn: 1, //不显示关闭按钮
  anim: 2,
  shadeClose: true, //开启遮罩关闭
  content: result_data.data
});}else{layui.layer.msg(result_data.msg);}


            
            });
    
}

</script>
