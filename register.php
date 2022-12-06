<?php
    include 'inc/header.php';
?>

<?php
  
    $m='';
        if(isset($_POST['submit'])){
            $name     = $_POST['name'];
            $u_name   = $_POST['username'];
            $email    = $_POST['email'] ? $_POST['email']: '';
            $password = $_POST['password'];
            $r_password   = $_POST['repeatPassword'];

            if($password === $r_password ){
                echo 'pass word match';
               $sql = "INSERT INTO `users_info`( `name`, `u_name`, `email`, `password`, `created_at`) VALUES ('$name','$u_name','$email','$password', now() )";
            // procedule procedure
             //  $submitData = mysqli_query($conn, $sql);
             //** */ object oriented procedure
             $submitData = $conn->query($sql);

               if($submitData){
                header('Location:login.php');
               }else {
                $m = 'Connection not established';
               }

            }else {
                $m = 'Password does not match';
            }
        }else {
           // echo 'not isset';
        }
           
?>


<div class="">
    <div class="container">
        <div>
            <?php
                if($m != ''){
                    echo $m;
                }
            ?>
        </div>
        <div class="register-form bg-dark rounded mt-4">
            <h1 class="text-center">Registration form</h1>
            <hr>
            <form enctype="multipart/form-data" action="" method="POST">
                <div>
                    <label htmfor="name">Your Name <span>*</span> </label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter you name" required>
                </div>
                <br>
                <div>
                    <label htmfor="username">Username <span>*</span></label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="User name"
                        required>
                </div>
                <br>
                <div>
                    <label htmfor="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Enter you email">
                </div>
                <br>
                <div>
                    <label htmfor="password">Password <span>*</span></label>
                    <input class="form-control" type="text" name="password" id="password" placeholder="Password"
                        required>
                </div>
                <br>
                <div>
                    <label htmfor="repeatPassword">Repeat Password <span>*</span></label>
                    <input class="form-control" type="text" name="repeatPassword" id="repeatPassword"
                        placeholder="Confirm Password" required>
                </div>
                <div>
                    <p class="text-center pt-1"> <span>***</span> By creating an account you agree to our Terms &
                        Privacy
                    </p>
                </div>
                <div class="text-center p-2">
                    <input name="submit" type="submit" class="btn btn-success" value="Submit">
                </div>
                <div>
                    <p class="text-center"> Already have an account ? <a href="login.php">Sing in</a> </p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>