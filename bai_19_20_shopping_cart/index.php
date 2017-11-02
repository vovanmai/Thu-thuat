<?php
/* =================================
// Shopping Cart system  			\\
// Coded by Mr Kenny				\\
// Website: www.qhonline.info		\\
// Email: kenny@qhonline.info		\\
// Phone: 0903087580				\\
=====================================*/
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Demo Shopping Cart - Created By My Kenny</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Demo Shopping Cart</h1>
<div id='cart'>
<?php
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	 {
		echo '<p>Ban khong co mon hang nao trong gio hang</p>';
	} else {
		$items = $_SESSION['cart'];
		echo '<p>Ban dang co <a href="cart.php">'.count($items).' mon hang trong gio hang</a></p>';
	}
?>
</div>
<?php
$connect=mysql_connect("localhost","root","root")
or die("Can not connect database");
mysql_select_db("shop",$connect);
$sql="select * from books order by id desc";
$query=mysql_query($sql);
if(mysql_num_rows($query) > 0)
{
	while($row=mysql_fetch_array($query))
	{
		echo "<div class='pro'>";
		echo "<h3>$row[title]</h3>";
		echo "Tac Gia: $row[author] - Gia: ".number_format($row[price],3)." VND";
		echo "<p align='right'><a href='addcart.php?item=$row[id]'>Mua Sach Nay</a></p>";
		echo "</div>";
	}
}
		
?>
</body>
</html>