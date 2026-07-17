<?php
$conn = mysqli_connect("localhost", "root", "", "data");
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT product_name, product_price, product_type, product_image, product_qty FROM product";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Products</title>
</head>
<body>
    <h2>Product List</h2>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
                <th>Image</th>
                <th>Quantity</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_price']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_type']); ?></td>
                    <td>
                        <?php if (!empty($row['product_image'])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($row['product_image']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>" width="100">
                        <?php else: ?>
                            No image
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['product_qty']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>

    <p><a href="product.php">Add New Product</a></p>
</body>
</html>

<?php
mysqli_close($conn);
?>