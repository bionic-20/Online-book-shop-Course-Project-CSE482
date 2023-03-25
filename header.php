<?php
    session_start();

    if(isset($_COOKIE["shopcart"]) && (!isset($_SESSION['cart'])))
{
    $_SESSION['cart'] = [];
    $_SESSION['cart'] = json_decode($_COOKIE['shopcart'], true);
}
?>

<div class="header">

    <a href="index.php" id="logo">Bookstore</a>   
    <form action="searchpage.php" method="GET" class="search-bar">
    <input type="text" name="query" autocomplete="off" placeholder="Search by books">
    <input type="submit" class="button" value="Go">
     </form>

    <?php 
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) : ?>
        <a href="logout.php" style="float: right">Sign Out</a>
        <a href="" style="float: right">Hi <?php echo htmlspecialchars($_SESSION["username"]); ?></a>

    <?php else : ?>
        <a href="register.php" style="float: right;" href="#" id="logo">Register</a>
        <a href="login.php"style="float: right;" href="#" id="logo">Login</a>
    <?php endif; ?>
</div>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="aboutus.php">About</a>
    <a href="books.php">Books</a>
    <a href="contactus.php">Contact</a>

    <?php 
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) : ?>
    <a style="float:right" href="cart.php">Cart</a>
    <?php endif; ?>
    
</div>