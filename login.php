<?php include 'inc/header.php'; 

    session_start();
    $_SESSION['user'] = '';
    $_SESSION['userid'] = '';

?>


<?php
    $m = '';
    if(isset($_POST['login_submit'])){
        $userName      = $_POST['user_name'];
        $loginPassword = $_POST['login_password'];    

        // 

        $sql = "SELECT * FROM users_info WHERE u_name='$userName' and password='$loginPassword'";

        $result = $conn->query($sql);

        // print_r($result);

        if(mysqli_num_rows($result) === 1){
            $user = mysqli_fetch_assoc($result);
          
            $_SESSION['user'] = $user['name'];
            $_SESSION['userid'] = $user['id'];
           // echo "<h1> User Exists! </h1>";
           header('Location:dashboard.php');

        }else {
           $m = 'Credentials mismatch!';
        }


    }
    
?>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10 col-11 pt-4 col-lg-6">
                <div class="bg-dark rounded p-4 text-white">
                    <h1 class="text-center">Login </h1>
                    <p class="text-danger p-4"><?php if($m != '') {echo $m;} ?></p>
                    <form action="" method="POST">
                        <div>
                            <label htmlfor="login">Username</label>
                            <input 
                              class="form-control"
                              type="text"
                              id="login"
                              name="user_name"
                              placeholder="username"
                             />
                        </div>
                        <br>
                        <div>
                            <label htmlfor="user_password">Password</label>
                            <div class="password_input">
                                <input 
                                    id="login_password" 
                                    class="form-control"
                                    type="password"
                                    id="user_password"
                                    name="login_password"
                                    placeholder="Password"
                                />
                                <i id="eye" class="fa-regular fa-eye"></i>
                                <i id="eye_slash" class="fa-regular fa-eye-slash"></i>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <input 
                             style="padding:8px 60px; font-size:20px; border-radius:35px;"
                             class="btn btn-warning text-bold text-white"
                             type="submit" 
                             name="login_submit"
                             value="Sing in"
                            />

                        </div>
                        <p class="text-center pt-2"> Not a user ? <a href="register.php">Sing up now!</a> </p>

                        <div>
                            <p style="font-size:12px ;" class="text-end ">
                                <a 
                                class="text-warning"
                                 href="forget.php"
                                 >Forget
                                    password?
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const x = document.getElementById('login_password')
    const eye = document.getElementById('eye')
    const eye_slash = document.getElementById('eye_slash')

    function myfunc() {

        if (x.type === 'password') {
            x.type = "text"
            eye.style.display = "block"
            eye_slash.style.display = "none"
        } else {
            x.type = "password"
            eye.style.display = "none"
            eye_slash.style.display = "block"
        }

    }


    eye.addEventListener('click', () => {     
        myfunc();
    })

    eye_slash.addEventListener('click', () => {
        myfunc();
    })

    // x.type = "text"
</script>

<?php include 'inc/footer.php'; ?>