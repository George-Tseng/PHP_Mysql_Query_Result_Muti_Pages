<?php
  function create_connection()
  {
    //與SQL DB建立連線
	$db_link = mysqli_connect("localhost", "root", "1234")
      or die("無法建立資料連接: " . mysqli_connect_error());//這裡的or是利用了short-circuit的概念，如果or之前為true，就不繼續確認or後半部是否為true
	
    //設定編碼為UTF-8	
    mysqli_query($db_link, "set names utf8");
			   	
    return $db_link;
  }
	
  function execute_sql($db_link, $database, $sql)
  {
    //切換至特定DB
	mysqli_select_db($db_link, $database)
      or die("開啟資料庫失敗: " . mysqli_error($db_link));
						 
    $result = mysqli_query($db_link, $sql);
		
    return $result;
  }
?>