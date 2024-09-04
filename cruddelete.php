<?php
include 'crudcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Crud</title>
</head>
<body>
    <form action="" method="POST">
    <h2>Delete</h2>
                <?php
                $id = !empty($_GET['id']) ? $_GET['id'] : '';

                $sql = 'delete from products where ID = ?';

                $stmt = $con->prepare($sql);

                $stmt->execute(array($id));

                if($stmt->rowCount() > 0) { ?>
                    <div>User Data Deleted successfully</div>
                <?php } else { ?>
                    <div>Oopss, something went wrong!</div>
                <?php
                }
                ?>
                <a href="crudcreate.php"role="button">Add New</a>&nbsp;<a href="crudretrieve.php"  role="button">Updated User List</a>
           
    </form>
</body>
</html>
