<?
/* =================================
// Shopping Cart system  			\\
// Coded by Mr Kenny				\\
// Website: www.qhonline.info		\\
// Email: kenny@qhonline.info		\\
// Phone: 0903087580				\\
=====================================*/
session_start();
$id=$_GET['item'];
if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;
}
else
{
	$qty=1;
}
$_SESSION['cart'][$id]=$qty;
header("location:cart.php");
exit();
?>