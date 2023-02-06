<?php
if(!empty($_POST['add'])){
    require('connection1.php');
    $sql='INSERT INTO posts (post_title,description,post_at) VALUES (:post_title,:desc,:post_at)';
    $prepare=$conn->prepare($sql);
    $execute=$prepare->execute(array(':post_title'=>$_POST['post_title'],':desc'=>$_POST['desc'],':post_at'=>$_POST['post_at']));
    if(!empty($execute)){
        header('location:index.php');
    }
}
?>
<html>
    <body>
        <form action="" method="post">
            <input type="text" name="post_title" id="post_title"><br/><br/>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea><br/><br/>
            <input type="date" name="post_at" id="post_at"><br/><br/>
            <input type="submit" value="Add Data" name='add'>
        </form>
    </body>
</html>