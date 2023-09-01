<?php
include_once "../config.php";
if (file_exists('cache.json')) {
    // 读取缓存文件内容
    $cacheData = file_get_contents('cache.json');
    // 解析 JSON 数据
    $cache = json_decode($cacheData, true);

    // 检查缓存是否需要更新
    $currentTime = time();
    $lastUpdateTime = $cache['last_update'];

    // 更新缓存的时间间隔（这里设置为每小时更新）
    $cacheUpdateInterval = 3600;

    // 如果距离上次更新的时间超过指定的时间间隔，或者是每一天的第一次访问
    if (($currentTime - $lastUpdateTime) >= $cacheUpdateInterval || date('H:i', $currentTime) === '00:00') {
        // 执行你的 SQL 查询语句，获取最新的数据
        // 这里你需要填写你的实际的 SQL 查询代码
        
        
  
        list($jsonString,) =method_curl(API_url.'/top.php',1);

        // 将 JSON 字符串写入缓存文件
        file_put_contents('cache.json', $jsonString);

        // 返回 JSON 字符串作为响应给用户
        echo $jsonString;
        exit();
    } else {
        // 返回缓存数据
        echo $cacheData;
        exit();
    }
} else {
    // 执行你的 SQL 查询语句，获取最新的数据
    // 这里你需要填写你的实际的 SQL 查询代码
    list($jsonString,) = method_curl(API_url.'/top.php',1);

    // 将 JSON 字符串写入缓存文件
    file_put_contents('cache.json', $jsonString);

    // 返回 JSON 字符串作为响应给用户
    echo $jsonString;
    exit();
}





