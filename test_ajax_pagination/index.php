<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   </br>
   </br>
   </br>
   </br>	
	<?php
		$mysqli=new mysqli("localhost","root","123456","2cwebvn_demo");
		$mysqli->set_charset("utf8");
		if(mysqli_connect_errno()){
			echo 'Lỗi kết nối database'.mysqli_connect_error();

		}
	?>
	<table class="table table-condensed">
	    <thead>
	      <tr>
	        <th>Firstname</th>
	        <th>Lastname</th>
	      </tr>
	    </thead>
	    <tbody class="tbody_ajax">
	    <?php
	    	$queryTSD="SELECT count(id) AS tongsodong FROM paging";
			$resultTSD=$mysqli->query($queryTSD);
			$arTSD=mysqli_fetch_assoc($resultTSD);
			$tongsodong=$arTSD['tongsodong'];
			//die($tongsodong);
			$row_count=2;		
			//tổng số trang
			$sotrang=ceil($tongsodong/$row_count);
			//die($sotrang);
	    	$query="SELECT * FROM paging LIMIT 0,{$row_count}";
	    	$result=$mysqli->query($query);
	    	while($ars=mysqli_fetch_assoc($result)){
	    ?>
	      <tr>
	        <td><?php echo $ars['id']; ?></td>
	        <td><?php echo $ars['msg']; ?></td>
	      </tr>
	    <?php } ?>  
	    </tbody>
	    
	</table>

	<?php 
		if($sotrang>=7){
			$end_loop=7;
		}else{
			$end_loop=$sotrang;
		}
	?>
	<ul class="pagination">
			
		
		<?php 
			for ($start=1; $start <=$end_loop; $start++) { 	
		?>
	    <li class="<?php if($start==1) echo "active"; ?>"><a href="javascript:void(0)" onclick="myajax(<?php echo $start;?>)" id="<?php echo $start;?>"><?php echo $start; ?></a></li>
	    <?php } ?>

	    <li><a href="javascript:void(0)" title="" onclick="myajax(2)">Next</a></li>
	    <li><a href="javascript:void(0)" title="" onclick="myajax(<?php echo $sotrang;?>)">Last</a></li>
	</ul>
</div>
<script>
  
		function myajax($start){    	
            current_page=$start;
            $.ajax({
                url: "ajax.php",
                type: "GET",
                dataType: "json",
                data: {
                    'current_page':current_page
                },
                success: function(data) {

                    $(".tbody_ajax").html(data['html']);
                    $(".pagination").html(data['pagination_html']);
                }
            });
   		}

</script>
</body>
</html>
