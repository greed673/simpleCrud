<?php
include 'crudcon.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Crud</title>
</head>
<body>

                <?php

                $sql = 'select * from products';

                $stmt = $con->prepare($sql);

                $stmt->execute();

                $products = $stmt->fetchAll();
                ?>
    <form action="">
    <h2>PRODUCTS</h2>
    <div>
    <table>
                	<thead>
                		<tr>
                            <td>ID</td>
                			<td>Name</td>
                			<td>Description</td>
                			<td>Price</td>
                			<td>Quantity</td>
                            <td>Created At</td>
                            <td>Update At</td>
                		</tr>
                	</thead>
                	<tbody>
                		
                		<?php foreach($products as $product): ?>
                			<tr>
                				<td><?php echo $product['ID']; ?></td>
                				<td><?php echo $product['Name']; ?></td>
                				<td><?php echo $product['Description']; ?></td>
                                <td><?php echo $product['Price']; ?></td>
                                <td><?php echo $product['Quantity']; ?></td>
                                <td><?php echo $product['ToCreate']; ?></td>
                                <td><?php echo $product['ToUpdate']; ?></td>
                				
                                <td><a role="button" href="crudupdate.php?id=<?php echo $product['ID']; ?>">Update</a>&nbsp;<a role="button" href="cruddelete.php?id=<?php echo $product['ID']; ?>">Delete</a></td>
                               </tr>
                		<?php endforeach ?>
                	</tbody>
                </table>
    </div>
                    
                    <button type="submit" name="submit">Save</button><br>
                    <a href="crudcreate.php"role="button">Add New</a>
				  
    </form>
               
</body>
</html>