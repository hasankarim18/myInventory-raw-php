<?php
session_start();
$user = $_SESSION['user'];
$userId = $_SESSION['userid'];

$url = $_SERVER['SCRIPT_NAME'];
$page = '/projects/inventory';


?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark p-0 ps-4 pe-4 dahsboard-nav">
    <a class="navbar-brand pt-0" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo $url == $page . '/dashboard.php' ? 'active' : ''; ?> transition">
                <a class="nav-link" href="dashboard.php">MyInventory <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo $url == $page . '/products.php' ? 'active' : ''; ?> transition">
                <a class="nav-link" href="products.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo $url == $page . '/users.php' ? 'active' : ''; ?> transition">
                <a class="nav-link" href="users.php">Users</a>
            </li>

            <li class="nav-item <?php echo $url == $page . '/customers.php' ? 'active' : ''; ?> transition">
                <a class="nav-link " href="customers.php">Customers</a>
            </li>

        </ul>
        <ul class="navbar-nav logged-in">
            <li class="nav-item bg-dark transition">
                <a class="nav-link transition" href="#">
                    Logged in as <b class="user" style="color:gold;"> <?php echo $user ?> </b>
                </a>
            </li>
            <li class="nav-item bg-dark transition">
                <a class="btn btn-danger" href="logout.php">
                    Logout
                </a>
            </li>
        </ul>


    </div>
</nav>