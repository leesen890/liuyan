<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="show.css">
</head>
<body>
<a href="https://www.xxfusi.com/"> <img src="xx.png"></a>
<?php 
$dae =date("Y-m-d H:i:s");
echo "<div align='center' > <font size='7' color='green'>$dae</font></div>";
echo "<br><br><br>";

date_default_timezone_set('PRC');

#读取留言内容mysql.txt
        $file = fopen('mysql.txt','r');
        $content = "";
        if( flock($file,LOCK_SH) ){
        	while( !feof($file) ){
        		$content .= fread($file, 1);
        	}
        	flock($file, LOCK_UN);
        }
        fclose($file);
#遍历到表格显示
        echo '<table border="1" width="800" align="center">';
             echo '<thead>';
                  echo '<tr>';
                     echo "<th>编号</th>";
                     echo "<th>用户名</th>";
                     echo "<th>留言内容</th>";
                     echo "<th>留言时间</th>";
                     echo "<th>操作</th>";
                  echo '</tr>';
             echo '</thead>';

             $arr = explode('@^@', $content);
             array_pop($arr);
        
             foreach ($arr as $k => $v) {
             	$vals = explode('&^&', $v);
             	 echo '<tr>';
             	    echo '<td>'.$k.'</td>';
             	     echo '<td>'.$vals[0].'</td>';
             	      echo '<td>'.$vals[1].'</td>';
             	       echo '<td>'.date('Y-m-d H:i:s').'</td>';
             	        echo '<td>修改/删除</td>';
             	 echo '</tr>';
             }
        echo '</table>';
 ?>

</body>
</html>
