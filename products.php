<?php include './inc/header.php'; ?>

<?php include './inc//navigation.php'; ?>

<?php

$sql = "SELECT * FROM products";

$products = $conn->query($sql);

$sql = "SELECT COUNT(*) as total_products FROM products";
$totalProducts = mysqli_fetch_assoc($conn->query($sql));

$sql = "SELECT SUM(bought) as total_bought FROM products";
$totalBoughts = mysqli_fetch_assoc($conn->query($sql));


$sql = "SELECT SUM(sold) as total_sold FROM products";
$totalSold = mysqli_fetch_assoc($conn->query($sql));

$stockAvailable = $totalBoughts['total_bought'] - $totalSold['total_sold'];


?>

<?php
// add products

if (isset($_POST['img_submit'])) {
    $productName         = $_POST['pname'];
    $buy                 = $_POST['buy'];
    $image               = $_FILES['pimage'];
    $image_name        = $_FILES['pimage']['name'];
    $image_tmp           = $_FILES['pimage']['tmp_name'];
    $image_type          = $_FILES['pimage']['type'];
    $image_size          = $_FILES['pimage']['size'];

    print_r($image);
    $img = rand(1, 999999) . '-' . $image_name;
    move_uploaded_file($image_tmp, "images/" . $img);
}
?>


<div class="pt-4">
    <div class="row w-100 p-0 m-0" style="padding-top: 40px;">
        <div class="col-9">
            <div class="pb-4">
                <section class="row" style="padding-left: 20px; padding-right: 20px;">
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-green bg-success text-white
                         d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Total Products </h6>
                            <h2 style="color: #282828; text-align: center;">
                                <?php echo $totalProducts['total_products'];
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-yellow bg-warning text-white
                         d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Products Bought </h6>
                            <h2 style="color: #282828; text-align: center;">
                                <?php echo $totalBoughts['total_bought'];
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <div style="height:150px ;" class="card card-blue bg-info text-white
                          d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Products Sold </h6>
                            <h2 style="color: #282828; text-align: center;">
                                <?php echo $totalSold['total_sold'];
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-red bg-danger text-white
                          d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Available Stock </h6>
                            <h2 style="color: #282828; text-align: center;">
                                <?php // echo $stockAvailable;  
                                ?>
                            </h2>
                        </div>
                    </div>
                </section>
            </div>
            <!-- below table -->
            <div class="card bg-dark">
                <div class="table_container">
                    <!-- add product with modal -->
                    <div class="pt-3 pb-3 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add new product
                        </button>
                        <!-- Modal -->
                        <?php include 'addNewProductModal.php'; ?>
                    </div>
                    <!-- add product with modal section end-->
                    <h1 class="text-warning" style="text-align: center;">Products Table</h1>
                    <div class="table-responsive">
                        <table class="table table-dark text-center" id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead class="thead text-warning">
                                <tr>
                                    <th data-field="date" data-filter-control="select" data-sortable="true">Product Name</th>
                                    <th data-field="examen" data-filter-control="select" data-sortable="true"> Bought</th>
                                    <th data-field="note" data-sortable="true">Sold</th>
                                    <th data-field="note" data-sortable="true">Available in Stock</th>
                                    <th data-field="note" data-sortable="true">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-info">
                                <?php
                                if (mysqli_num_rows($products) > 0) {
                                    while ($row = mysqli_fetch_assoc($products)) {
                                        $stock = $row['bought'] - $row['sold'];
                                ?>
                                        <tr>
                                            <td class="text-capitalize"><?php echo $row['name']; ?></td>
                                            <td class=""><?php echo  $row['bought']; ?></td>
                                            <td class=""><?php echo  $row['sold']; ?></td>
                                            <td class=""><?php echo  $stock; ?></td>
                                            <td class="">
                                                <a class="btn btn-success" href="<?php echo 'viewProduct.php?id=' . $row['id'] ?>">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning" href="<?php echo 'editProduct.php?id=' . $row['id'] ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a class="btn btn-danger" href="<?php echo 'deleteProduct.php?id=' . $row['id'] ?>">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<p> No Products found </p>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card  text-center">
                <h2>About User</h2>
                <div style="height:100px;"><img src="<?php // echo $thisUser['avatar']; 
                                                        ?>" height="100px;" width="100px;" class="img-circle" alt="Please Select your avatar"></div>
                <p>
                <h4><?php // echo $thisUser['name'];  
                    ?></h4> is working here since <h4><?php // echo date('F j, Y', strtotime($thisUser['created_at'])); 
                                                        ?></h4>
                </p>
            </div>
            <div class="card text-center">
                <h2>Owners Info</h2>
                <p>Some text..</p>
            </div>
        </div>
    </div>
</div>


<?php include './inc/footer.php'; ?>