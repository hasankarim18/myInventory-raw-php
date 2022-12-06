<?php include './inc/header.php'; ?>
<div class="w-100 h-100 d-flex justify-content-center align-items-center flex-column vh-100">
    <div>
        <div class="container">
            <h1 class="text-center">Welcome to your Inventory!</h1>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-end">
                    <a href="login.php">
                        <input type="button" class="btn-danger btn" value="Login">
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="register.php">
                        <input type="button" class="btn-success btn pull-left" value="Register">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './inc/footer.php'; ?>