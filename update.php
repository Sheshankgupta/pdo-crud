<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once('connection1.php');
$sql='SELECT * from posts where id='.$_GET['id'];
$prepare=$conn->prepare($sql);
$execute=$prepare->execute();
$fetch=$prepare->fetchALL();
var_dump($fetch);
if(!empty($_POST['update'])){
    $sql='UPDATE posts set post_title="'.$_POST['title'].'", description="'. $_POST['desc'] .'",post_at="'. $_POST['post_at'] .'" where id='. $_GET['id'];
    echo $sql;
    $prepare=$conn->prepare($sql);
    $execute=$prepare->execute();
    header('location:read.php') ;
}
?>
<html>
    <body>
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" value=<?php echo $fetch[0]['post_title']; ?> name="title" id="title" required> <br><br>
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $fetch[0]['description'] ?></textarea> <br><br>
            <label for="title">Title</label>
            <input type="date" value=<?php echo $fetch[0]['post_at']; ?> name="post_at" id="post_at" required> <br><br>
            <input type="submit" value="Update Data" name="update">
        </form>
    </body>
</html>