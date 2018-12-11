<?php

	require_once('modules/webpais.php');
	require_once('conf.php');
	if (isset($_REQUEST['content'])){
		die(webpaisDec(htmlspecialchars($_REQUEST['content'])));
	} else {
		die('require request "content"');
	}