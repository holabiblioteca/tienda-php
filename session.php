<?php
session_start();
   
if(!isset($_SESSION['user'])){
	echo'<script type="text/javascript">;
	window.location.href="index.php";</script>';
	}

	else {
		$name = $_SESSION["user"];
	}
