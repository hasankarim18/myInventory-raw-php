<?php
include './inc/header.php';

?>
<?php
//  session_start();
include './inc/navigation.php';
$lastDate = date('Y-m-d', strtotime('-7 days'));

$sql = "SELECT * FROM products WHERE updated_at>'$lastDate'";

$products = $conn->query($sql);

$sql = "SELECT COUNT(*) as total_products FROM products";
$totalProducts = mysqli_fetch_assoc($conn->query($sql));

$sql = "SELECT SUM(bought) as total_bought FROM products";
$totalBoughts = mysqli_fetch_assoc($conn->query($sql));


$sql = "SELECT SUM(sold) as total_sold FROM products";
$totalSold = mysqli_fetch_assoc($conn->query($sql));

 $stockAvailable = $totalBoughts['total_bought']-$totalSold['total_sold'];

?>
<div class="pt-4">
    <div class="row w-100 p-0 m-0" style="padding-top: 40px;">
        <div class="col-8">
            <div class="pb-4">
                <section class="row" style="padding-left: 20px; padding-right: 20px;">
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-green bg-success text-white
                         d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Total Products </h6>
                            <h2 style="color: #282828; text-align: center;">
                               <?php echo $totalProducts['total_products'];  ?>
                           </h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-yellow bg-warning text-white
                         d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Products Bought </h6>
                            <h2 style="color: #282828; text-align: center;">
                               <?php  echo $totalBoughts['total_bought']; ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <div style="height:150px ;" class="card card-blue bg-info text-white
                          d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Products Sold </h6>
                            <h2 style="color: #282828; text-align: center;">
                              <?php  echo $totalSold['total_sold']; ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <div style="height:150px ;" class="card card-red bg-danger text-white
                          d-flex justify-content-center align-items-center flex-column

                        ">
                            <h6>Available Stock </h6>
                            <h2 style="color: #282828; text-align: center;">
                               <?php  echo $stockAvailable;  ?>
                            </h2>
                        </div>
                    </div>
                </section>
            </div>
            <!-- below table -->
            <div class="card bg-dark">
                <div class="table_container">
                    <h1 class="text-warning" style="text-align: center;">Products Table</h1>
                    <div class="table-responsive">
                        <table class="table table-dark" id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead class="thead text-warning">
                                <tr>
                                    <th data-field="date" data-filter-control="select" data-sortable="true">Product Name</th>
                                    <th data-field="examen" data-filter-control="select" data-sortable="true"> Bought</th>
                                    <th data-field="note" data-sortable="true">Sold</th>
                                    <th data-field="note" data-sortable="true">Available in Stock</th>
                                </tr>
                            </thead>
                            <tbody class="text-info">
                                <?php
                                if(mysqli_num_rows($products) > 0){{                                  
                                    while ($row = mysqli_fetch_assoc($products)) {
                                    $stock = $row['bought'] - $row['sold'];
                                       ?>
                                    <tr>
                                        <td class="text-capitalize"><?php echo $row['name']; ?></td>
                                        <td class=""><?php echo $row['bought']; ?></td>
                                        <td class=""><?php echo $row['sold']; ?></td>
                                        <td class=""><?php echo $stock; ?></td>
                                    </tr>
                                    <?php 
                                    }
                                }}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
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



<?php
include './inc/footer.php';
?>