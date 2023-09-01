<?php
// 设置数据库文件路径

include_once "../config.php";
$key=$_GET['key'];
$keyword=$_GET['wd'];
$page=$_GET['page'];


if (API_urlKey !=$key ) {die('404');}
$dbPath =Sqlite_file;
// 执行查询的关键词
$data=search($keyword,$page);

function search($keyword,$page){
global $dbPath;
$time1= microtime(true);
$db = new SQLite3($dbPath);
// 构建查询语句
$query="FROM \"main\".\"data\" WHERE \"ScrName\" LIKE '%$keyword%'";
$queryTotal = "SELECT COUNT(*) as total ".$query;
$totalResult = $db->querySingle($queryTotal);
$totalMatches = $totalResult ?$totalResult : 0;
$query = "SELECT *, rowid \"NAVICAT_ROWID\" ".$query." ORDER BY \"addtime\" DESC LIMIT ". ($page-1) *10 .", 10";
// 准备查询
$stmt = $db->prepare($query);
//$stmt->bindValue(':keyword', $keyword, SQLITE3_TEXT);
// 执行查询
$result = $stmt->execute();
// 将结果转换为关联数组
$data = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
   $data[] = $row;
}
$new['Query_result_Total']=$totalMatches;
$new['code']=0;
$new['Data']=$data;
$new['time']= microtime(true) - $time1;
// 关闭查询和数据库连接
$stmt->close();
$db->close();
return $new;
}
// 将结果转换为JSON格式并输出
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
