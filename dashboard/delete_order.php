<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strcreate_course_id"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";

	header("location:show_order_list.php");
?>