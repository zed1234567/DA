<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../../../../../Do_an_web/index.php?message=Log+out+success");
?>