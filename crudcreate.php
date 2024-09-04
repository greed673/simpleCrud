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
    <?php
        if(isset($_POST['submit'])) {
            //$id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $createdat = $_POST['createdat'];
            $updatedat = $_POST['updatedat'];

            $sql = 'INSERT INTO products (Name, Description, Price, Quantity, ToCreate, ToUpdate) VALUES (?, ?, ?, ?, ?, ?)';

            $stmt = $con->prepare($sql);

            $stmt->execute([$name, $description, $price, $quantity, $createdat, $updatedat]);

            if($stmt->rowCount() > 0) { ?>
                <div>User Data Saved Successfully</div>
            <?php } else { ?>
                <div>Oops, something went wrong!</div>
            <?php
            
            }
            
        }
    ?>
    <h2>PRODUCTS</h2>

    <div>
        <label>Name</label>
        <input type="text" placeholder="Enter Product Name" name="name" autocomplete="off">
    </div><br>
    <div>
        <label>Description</label>
        <input type="text" placeholder="Enter Product Description" name="description" autocomplete="off">
    </div><br>
    <div>
        <label>Price</label>
        <input type="text" placeholder="Enter Product Price" name="price" autocomplete="off">
    </div><br>
    <div>
        <label>Quantity</label>
        <input type="text" placeholder="Enter Product Quantity" name="quantity" autocomplete="off">
    </div><br>
    <div>
        <label>Created At</label>
        <input type="datetime-local" placeholder="Created At" name="createdat" autocomplete="off">
    </div><br>
    <div>
        <label>Updated At</label>
        <input type="datetime-local" placeholder="Updated At" name="updatedat" autocomplete="off">
    </div><br>
    <button type="submit" name="submit">Save</button><br>
<a href="crudretrieve.php" role="button">Retrieve Data</a>


    </form>
</body>
</html>
