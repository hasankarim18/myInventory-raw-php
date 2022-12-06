<?php include './inc/header.php'; ?>
<?php include './inc/navigation.php'; ?>

<?php
$product_id = $_GET['id'];

$sql = "SELECT `id`, `name`, `bought`, `sold`, `image`, `created_at`, `updated_at` FROM `products` WHERE id='$product_id'";

$result = $conn->query($sql);
$productData = mysqli_fetch_assoc($result);
// print_r($productData);
$product_name        = $productData['name'];
$product_bought      = $productData['bought'];
$product_sold        = $productData['sold'];
$product_created_at  = $productData['created_at'];
$product_updated_at  = $productData['updated_at'];
$product_updated_at  = $productData['updated_at'];
$product_image       = $productData['image'];

?>

<div class="p-4">
    <h1>Delete Products id: <?php echo $product_id; ?> </h1>
    <div class="container">
        <div class="row ">
            <div class="col-sm-8">
                <div class="row bg-dark text-white pt-4 pb-4">
                    <div class="col-sm-4">
                        <div class="bg-white rounded">
                            <img class="img-fluid" src="<?php echo "images/" . $product_image; ?>" alt="<?php echo $product_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3>Product Name: <?php echo $product_name; ?> </h3>
                        <h6> Bought: <?php echo $product_bought; ?> </h6>
                        <h6> Sold: <?php echo $product_sold; ?> </h6>
                        <h6> Update date: <?php echo $product_updated_at; ?> </h6>
                        <h6> Created date: <?php echo $product_created_at; ?></h6>
                    </div>
                    <div class="col-12">
                        <form action="" method="POST">
                            <input name="delete_id" type="hidden" value="<?php echo $product_id; ?>">
                            <div class="text-right">
                                <input value="Delete?" type="submit" name="delete_submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                info
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['delete_submit'])) {
    // echo 'delete';
    $delte_id = $_POST['delete_id'];
    echo $delte_id;

    $deleteSql = "DELETE FROM `products` WHERE id='$delte_id'";

    $conn->query($deleteSql);
    $file_path = "images/".$product_image;
    unlink($file_path);

    header('Location:products.php');
}
?>



<?php include './inc/footer.php'; ?>