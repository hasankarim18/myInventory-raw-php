<?php include './inc/header.php'; ?>
<?php include './inc/navigation.php'; ?>

<?php
$product_id = $_GET['id'];

$eidtProductSql = "SELECT `id`, `name`, `bought`, `sold`, `image`, `created_at`, `updated_at` FROM `products` WHERE id='$product_id'";

$result = $conn->query($eidtProductSql);

$product_data = mysqli_fetch_assoc($result);

// print_r($product_data);

$product_name            = $product_data['name'];
$product_bought          = $product_data['bought'];
$product_sold            = $product_data['sold'];
$product_sold            = $product_data['sold'];
$product_created_at      = $product_data['created_at'];
$image                   = $product_data['image'];

?>

<?php

$err = '';
// update product data 
if (isset($_POST['edit_submit'])) {

    $edit_name         = $_POST['edit_name'];
    $edit_bought       = $_POST['edit_bought'];
    $edit_sold         = $_POST['edit_sold'];
    // images
    $edit_image        = $_FILES['edit_image'];
    $edit_image_name   = $_FILES['edit_image']['name'];
    $edit_image_tmp    = $_FILES['edit_image']['tmp_name'];
    $edit_image_size   = $_FILES['edit_image']['size'];

    //  echo $edit_image_name; echo '<br />';
    $img_type = explode('.', $edit_image_name);
    $img_type = end($img_type);

    $accepted_image_type = ['jpg', 'png', 'jpeg'];

    if ($edit_image_name != '') {
        if (in_array(strtolower($img_type), $accepted_image_type)) {
            // echo gettype($edit_image_size); echo '<br>';
            //echo $edit_image_size; echo '<br>';
            if ($edit_image_size < 524288) {
                $err = 'Valid Image';

                $imgEx = explode(" ",$edit_image_name);
                $imgJoin = join('-',$imgEx);

                $img = rand(1, 999999) . '-' . $imgJoin;

                $update_sql = "UPDATE `products` SET `name`='$edit_name',`bought`='$edit_bought',`sold`='$edit_sold',`image`='$img' WHERE id='$product_id'";

              $update= $conn->query($update_sql); 

                if($update){                   
                    move_uploaded_file($edit_image_tmp, "images/" . $img);
                    if($image != ''){
                        $file_path = "images/" . $image;
                        unlink($file_path);
                    }
                    header('Location:products.php');
                   
                }else {
                    $err = 'Update error!';
                }
                
            } else {
                $err = 'Image size too large. Image must be less than 500kb';
            }
            // 1048576
        } else {
            $err = 'Image type didnt match. Image must be in jpg, jpeg or png formate';
        }
    } else {
        echo 'no image found update without image'; echo "<br>";
        echo $product_id;
    }

}

?>

<div class="container pt-4">
    <div class="row ">
        <div class="col-sm-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row bg-dark text-white pt-4 pb-4">
                    <div class="col-sm-4">
                        <div class="bg-white rounded">
                            <img class="img-fluid" src="<?php echo "images/" . $image; ?>" alt="<?php echo $product_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="pb-2">
                            <label for="">Product Name:</label>
                            <input type="text" name="edit_name" class="form-control text-capitalize text-bold" value="<?php echo $product_name; ?>" />
                        </div>
                        <div class="pb-2">
                            <label for="">Product Bought:</label>
                            <input type="text" name="edit_bought" class="form-control text-capitalize text-bold" value="<?php echo $product_bought; ?>" />
                        </div>
                        <div class="pb-2">
                            <label for="">Product Sold:</label>
                            <input type="text" name="edit_sold" class="form-control text-capitalize text-bold" value="<?php echo $product_sold; ?>" />
                        </div>
                        <div class="pb-2">
                            <label for="">Upload New Image:</label>
                            <input type="file" name="edit_image" class="form-control text-capitalize text-bold" />
                        </div>
                            <!-- submit button -->
                            <div class="text-right">
                                <input value="Submit" type="submit" name="edit_submit" class="btn btn-info">
                            </div>
                            <?php
                            // warning
                            if ($err != '') {                            ?>
                                <div class="p-2 mt-4 bg-danger text-white rounded">
                                    <?php echo $err; ?>
                                </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            info
        </div>
    </div>
</div>



<?php include './inc/footer.php'; ?>