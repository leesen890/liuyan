<?php 

$user = $_POST['username'] ?? "";
$content = $_POST['content'] ?? "";
if($user !="" && $content!=""){


$newstr = $user.'&^&'.$content.'&^&'. time().'@^@';
echo "$newstr";
    
    $file = fopen('mysql.txt', 'a');

    if( flock($file, LOCK_EX) ){
    	#写入
    	$result_int = fwrite($file, $newstr);
    	flock($file, LOCK_UN);
    }
    fclose($file);

    if ($result_int) {
    	echo '<script>alert("留言成功"); location="show.php"</script>';
    }
    else{
    	echo '<script> alert("留言失败"); location="index.html"</script>';
    }
 }
 else{

 	echo "<script> alert('用户名或留言内容为空username or message content is empty') </script>"; 

 echo ' <script> location="index.html" </script>';


 }
 ?>