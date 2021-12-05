<?php

if (!isset($_SERVER['PATH_INFO'])) {
	echo 'Home page';
	exit();
}

echo "Page: " . $_SERVER['PATH_INFO'];
