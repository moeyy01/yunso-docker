<?php
header('Content-type:text/html; charset=utf-8');
error_reporting(0);
//api_mysqlif(!defined('IFYunso')) {exit('Access Denied');}


ini_set('date.timezone','Asia/Shanghai');

$WWW_Patch=$_SERVER['DOCUMENT_ROOT'];//获取网站根目录
include_once $WWW_Patch."/config.php";//引入配置$word_paye

class styem{
    function check($Licensedocument){
        foreach (get_included_files() as $value) {
            // code...
            //strrpos()
            if(basename($value)==$Licensedocument){
                return true;
                
            }
        }
        return false;

    }
}
class user{
	function ifuseronline(){
		return $_SESSION['user_logon_boolean'] && getMillisecond() - ($_SESSION['user_logon_time']<=5*60*60*1000)??false;
	}

	function getusertoken(){
	    return $_SESSION['user_logon_token'];
	}
	

	function getip(){
	    return !empty($_SERVER['HTTP_CF_CONNECTING_IP'])?$_SERVER['HTTP_CF_CONNECTING_IP']:$_SERVER['REMOTE_ADDR'];
	}

}


function isMobile() { 
	 
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
  if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
    return true;
  } 
  // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
  if (isset($_SERVER['HTTP_VIA'])) { 
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  } 
  // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger'); 
    // 从HTTP_USER_AGENT中查找手机浏览器的关键字
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
      return true;
    } 
  } 
  // 协议法，因为有可能不准确，放到最后判断
  if (isset ($_SERVER['HTTP_ACCEPT'])) { 
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    } 
  } 
  return false;
}


function getMillisecond() { 
    list($s1, $s2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($s1) + floatval($s2)) * 1000);

}

function TimeStampConversion($time){
    date_default_timezone_set ('Etc/GMT-8');
    return  date('Y-m-d H:i:s', (int)($time/1000));
}
function retrieve($url) 
 { 
preg_match('/\/([^\/]+\.[a-z]+)[^\/]*$/',$url,$match); 
 return $match[1]; 
 } 
 


?>