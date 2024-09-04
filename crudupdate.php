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
                    $id = $_POST['id'];
					$name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $createdat = $_POST['createdat'];
            $updatedat = $_POST['updatedat'];

					$sql = 'update products set Name = ?, Description = ?, Price = ?, Quantity = ?, ToCreate = ?, ToUpdate = ? where ID = ?';

					$stmt = $con->prepare($sql);

					$stmt->execute(array($name, $description, $price, $quantity, $createdat, $updatedat,$id));
					if($stmt->rowCount() > 0) { ?>
						<div>Saved Successfully</div>
					<?php } else { ?>
						<div>Oopss, something went wrong!</div>
					<?php
					}
				}
				?>
                <?php
                $id = !empty($_GET['id']) ? $_GET['id'] : '';

                $sql = 'select * from products where ID = ?';

                $stmt = $con->prepare($sql);

                $stmt->execute(array($id));

                $products = $stmt->fetch();
                ?>
    
    <h2>PRODUCTS</h2>

    <div>
        <label>Name</label>
        <input type="text" placeholder="Enter Product Name" name="name" autocomplete="off" value="<?php echo $products['Name'];?>">
        <input type="hidden" name="id" value="<?php echo $id;?>">
    </div><br>
    <div>
        <label>Description</label>
        <input type="text" placeholder="Enter Product Description" name="description" autocomplete="off"value="<?php echo $products['Description'];?>">
    </div><br>
    <div>
        <label>Price</label>
        <input type="text" placeholder="Enter Product Price" name="price" autocomplete="off"value="<?php echo $products['Price'];?>">
    </div><br>
    <div>
        <label>Quantity</label>
        <input type="text" placeholder="Enter Product Quantity" name="quantity" autocomplete="off"value="<?php echo $products['Quantity'];?>">
    </div><br>
    <div>
        <label>Created At</label>
        <input type="datetime-local" placeholder="Created At" name="createdat" autocomplete="off"value="<?php echo $products['ToCreate'];?>" readonly>
    </div><br>
    <div>
        <label>Updated At</label>
        <input type="datetime-local" placeholder="Updated At" name="updatedat" autocomplete="off"value="<?php echo $products['ToUpdate'];?>">
    </div><br>
    <button type="submit" name="submit">Update</button>&nbsp;<a href="crudretrieve.php" role="button">Update List</a>
    


    </form>
</body>
</html>