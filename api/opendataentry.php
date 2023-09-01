<?php
include_once "../config.php";
list($data,$httpcode)=method_curl(API_url.'/opendataentry.php?data='.$_GET['data'],1);
echo $data;
