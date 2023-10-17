<?php
session_start();
include("staticContent/header.html");
include("navbar.php");
include("alerts.php");
require("controllerClass/controller.php");


$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';
$id = $_GET['id'] ?? $_POST['id'] ?? '0';
 

if($section == 'Login'){
    include('controllers/login.php');
    $login = new Login();
    $login->runAction($action);
}
else if($section == 'Signup'){
    include('controllers/signup.php');
    $signUp = new Signup();
    $signUp->runAction($action);
}
else if($section == 'Logout'){
    include('logout.php');
}
else if($section == 'addProduct'){
    include('addProductHTML.php');
}
else if($section == 'shoppingCart'){
    include('shoppingCart.php');
}
else if($section == 'productDeatils'){
    include('productDeatils.php');
}
else if($section == 'addToCart'){
    include('shoppingCart/addToCart.php'); 
}
else if($section == 'product-details'){
    include('controllers/productDetails.php'); 
    $productDetails = new ProductDetails();
    $productDetails->runAction($action);
}
else if($section == 'edit-product'){
    include('controllers/editProduct.php');
    $editProduct = new EditProduct();
    $editProduct->runAction($action);
}
else if($section == 'profile'){
    include('controllers/profile.php');
    $profile = new Profile();
    $profile->runAction($action);
}
else if($section == 'search'){
    include('controllers/search.php');
    $search = new Search();
    $search->runAction($action);
}
else if($section == 'home'){
    include('home.php');
}



include("staticContent/footer.html");
?>