<?php



##  XyunSO0.2


## 编写时间 2022/8/27
## 二次修改 2023/9/1

define("IFYunso",true);
define("nowyear",date("Y",time()));
define("Ver",'XyunSO V0.2');

$ConWebName="网盘搜索";//网站名
$ConWebNameM="资源搜索网站 ";//网站副标题
$ConWeb_keywords="";
$ConWeb_description="";
define("API_url",'https://www.yunso.net/api/');// 调用热词/数据提交需要
define("API_localization",false);// 云化 FALSE 本地化true 需正确配置 API_search_url
define("API_search_url",'https://yunso.fly.dev/api/opensearch.php'); // 本地化时需填入搜索接口 
define("API_urlKey",'91030');// 本地化时 搜索带有的参数 


/**
 * 本地化时  Sqlite 配置类 
 * 
*/

define("Sqlite_file",'/var/www/html/api/sqlite.db');//sql文件存在目录



define("WWW_copyright",'Yunso.net');//版权说明


define("WWWROOT",str_ireplace(str_replace("/","\\",$_SERVER['PHP_SELF']),'',__FILE__)."\\");

define("scr_logo",'<!-- <img src="//static.cuppaso.fun/img/logo.png" width="110" height="32" alt="'.$ConWebName.'" class="navbar-brand-image me-2" style="height: 4rem;"> --><h1 style="font-size: 3rem;">'.$ConWebName.'</h1>');



function method_curl($url,$method=1){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3); 
    curl_setopt($curl, CURLOPT_NOSIGNAL,true);//支持毫秒级别超时设置
	curl_setopt($curl, CURLOPT_TIMEOUT,10*1000);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    $data = curl_exec($curl);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    return array($data,$httpcode);
}

?>