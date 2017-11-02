<?php
	$mysqli=new mysqli("localhost","root","123456","2cwebvn_demo");
	$mysqli->set_charset("utf8");
	if(mysqli_connect_errno()){
		echo 'Lỗi kết nối database'.mysqli_connect_error();

	}

	include "Pagination.php";

	$queryTSD="SELECT count(id) AS tongsodong FROM paging";
	$pagination=new Pagination();
	$resultTSD=$mysqli->query($queryTSD);
	$arTSD=mysqli_fetch_assoc($resultTSD);
	$tongsodong=$arTSD['tongsodong'];
	$row_count=2;		
	//tổng số trang
	$sotrang=ceil($tongsodong/$row_count);

	$current_page=$_GET['current_page'];
	$offset=($current_page-1)*$row_count;
	
	$query="SELECT * FROM paging LIMIT $offset,{$row_count}";
	$result=$mysqli->query($query);
	$html='';
	while($ars=mysqli_fetch_assoc($result)){
		$html=$html.'<tr>
						<td>'.$ars["id"].'</td>
						<td>'.$ars["msg"].'</td>
					</tr>';
	}
	
	if($current_page>=7){
		$start=$current_page-3;
		if($sotrang>=$current_page+3){
			$end=$current_page+3;
		}else{
			$start=$sotrang-6;
			$end=$sotrang;
		}
	}else{
		if($sotrang>7){
			$start=1;
			$end=7;
		}else{
			$start=1;
			$end=$sotrang;
		}
	}
	$pagination_html="";
	if($current_page>1&&$sotrang>1){
			$pagination_html=$pagination_html.' <li><a href="javascript:void(0)" onclick="myajax('.(1).')" id="'.(1).'">First</a></li>';
			$pagination_html=$pagination_html.' <li><a href="javascript:void(0)" onclick="myajax('.($current_page-1).')" id="'.($current_page-1).'">Previous</a></li>';
		}
	for ($m=$start; $m <=$end ; $m++) {

		if($m==$current_page){
			$pagination_html=$pagination_html.' <li class="active"><a href="javascript:void(0)" onclick="myajax('.$m.')" id="'.$m.'">'.$m.'</a></li>';
		}else{
			$pagination_html=$pagination_html.' <li><a href="javascript:void(0)" onclick="myajax('.$m.')" id="'.$m.'">'.$m.'</a></li>';

		}
	}

	if($current_page<$sotrang&&$sotrang>1){
		$pagination_html=$pagination_html.' <li><a href="javascript:void(0)" onclick="myajax('.($current_page+1).')" id="'.($current_page+1).'">Next</a></li>';
		$pagination_html=$pagination_html.' <li><a href="javascript:void(0)" onclick="myajax('.$sotrang.')" id="'.$sotrang.'">Last</a></li>';
	}
	$array = array('html' =>$html,
					'pagination_html'=>$pagination_html
					);
	echo json_encode($array);	
?>