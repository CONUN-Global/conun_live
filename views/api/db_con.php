<?

$mysql_host = 'localhost';
$mysql_user = 'mircoinnet';
$mysql_password = 'gksrnr!@!@';
$mysql_db = 'mircoinnet';
   
$connect_db = sql_connect($mysql_host, $mysql_user, $mysql_password);
$select_db = sql_select_db($mysql_db, $connect_db);

ini_set("display_errors", 0);

// DB 연결
function sql_connect($host, $user, $pass)
{
    global $g4;

    return @mysql_connect($host, $user, $pass);
}


// DB 선택
function sql_select_db($db, $connect)
{
    global $g4;

    if (strtolower($g4['charset']) == 'utf-8') @mysql_query(" set names utf8 ");
    else if (strtolower($g4['charset']) == 'euc-kr') @mysql_query(" set names euckr ");
    return @mysql_select_db($db, $connect);
}


// mysql_query 와 mysql_error 를 한꺼번에 처리
function sql_query($sql, $error=TRUE)
{
    if ($error)
        $result = @mysql_query($sql) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    else
        $result = @mysql_query($sql);
    return $result;
}

// mysql_query 와 mysql_error 를 한꺼번에 처리
function sql_query1($sql, $error=TRUE)
{
    if ($error)
        $result = @mysql_query($sql) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    else
        $result = @mysql_query($sql);
    return $result;
}


// 결과값에서 한행 연관배열(이름으로)로 얻는다.
function sql_fetch_array($result)
{
    $row = @mysql_fetch_assoc($result);
    return $row;
}


// $result에 대한 메모리(memory)에 있는 내용을 모두 제거한다.
// sql_free_result()는 결과로부터 얻은 질의 값이 커서 많은 메모리를 사용할 염려가 있을 때 사용된다.
// 단, 결과 값은 스크립트(script) 실행부가 종료되면서 메모리에서 자동적으로 지워진다.
function sql_free_result($result)
{
    return mysql_free_result($result);
}


// 쿼리를 실행한 후 결과값에서 한행을 얻는다.
function sql_fetch($sql, $error=TRUE)
{
    $result = sql_query($sql, $error);
    //$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    $row = sql_fetch_array($result);
    return $row;
}

?>
