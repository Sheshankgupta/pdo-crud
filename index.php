<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require('connection1.php');
$sql='SELECT * from posts order by id desc';
$prepare=$conn->prepare($sql);
$execute=$prepare->execute();
$result=$prepare->fetchAll();
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>
    <body>
        <table class="text-center table table-stripped">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <tbody>
                <?php
                  if(!empty($result)){
                    foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['post_title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['post_at'] ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id'] ?>" title='Edit' class='text-decoration-none text-success'><i class="bi bi-pen"></i> Edit</a> &emsp;
                                <a href="remove.php?id=<?php echo $row['id'] ?>" title='Delete' class='text-decoration-none text-danger'><i class="bi bi-trash3-fill"></i> Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                  }
                ?>
            </tbody>
        </table>
    </body>
</html>