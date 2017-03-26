<?php
global $link;
function logDebug($mess){
    error_log( date('d.m.Y h:i:s') . " $mess \n", 3, "log.log");
}
function connect(){
    global $link;
    $link = mysqli_connect('localhost', 'root', '');
    if (!$link) {
        die('<br/>Khong ket noi duoc: ' . mysqli_error ($link));
        exit;
    }
	mysqli_select_db($link,'lucentshop') or die('Could not select database.');
    mysqli_query($link,"SET NAMES 'utf8'");
}

function close(){
    global $link;
    mysqli_close($link);
	//unset($link);
}
function select_one($sql){
    $data = select_list($sql);
    if (!$data) return null;
    return $data[0];
}
function select_list($sql){
    return exec_select($sql);
}
function exec_select($sql){
	global $link;
    logDebug("sql=[$sql]");//de fix bug
    connect();
    $ret = isset($ret) ? $ret : "";
    //$res = mysqli_query($link,$sql);
    $res = $link->query($sql);
    $row = array();
    //Lay loi sau khi thuc hien truy van
    $err = mysqli_error ($link);
    //kiem tra
    if ($err){
        print("Khong the select duoc");
        logDebug("Khong the select duoc,ERROR=[". $err ."]" );
        logDebug(  "COUNT=[0]" );
        return null;
    }
    //Khong co loi
    if ($res ){
        $i = 1;
        //lay tung dong ket qua
        while( $row = mysqli_fetch_array ($res,MYSQL_ASSOC) )
        {
            $ret[]= $row ;
        }
        //mysqli_free_result($res);
        
        $res->close();
    }
    //$result->close();
    $link->close();
    //close();
    return $ret;
}
function exec_update($sql){
	global $link;
    logDebug( "<!-- sql=[$sql] -->");//de fix bug
    connect();
    $res = mysqli_query($link,$sql) ;
    $row = array();
    //Lay loi sau khi thuc hien truy van
    $err = mysqli_error ($link);
    //kiem tra
    if ($err){
        print("Khong the select duoc,ERROR=[". $err ."]" );
        print(  "COUNT=[0]" );
        return -1;
    }
    $ret = $link->affected_rows;
    close();
    return $ret;
}
function sql_str($val){
    if($val === 0)  return '0' ;
    if($val === null) {
        return 'NULL';
    }
    if (get_magic_quotes_gpc()) return "" . mysql_escape_string(stripslashes($val)) . "" ;
    return "" . mysql_escape_string($val)  . "" ;
}
function redirect_post($url, array $data, array $headers = null) {
    $params = array(
    'http' => array(
    'method' => 'POST',
    'content' => http_build_query($data)
    )
    );
    if (!is_null($headers)) {
        $params['http']['header'] = '';
        foreach ($headers as $k => $v) {
            $params['http']['header'] .= "$k: $v\n";
        }
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if ($fp) {
        echo @stream_get_contents($fp);
        die();
    } else {
        // Error
        throw new Exception("Error loading '$url', $php_errormsg");
    }
}
?>