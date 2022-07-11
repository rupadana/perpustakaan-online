<?php

include "./helpers/loaders.php";

@ob_start();
session_start();
if (!empty($_SESSION['admin'])) {
	if (isset($_GET['page']) && in_array($_GET['page'], config("app.view-only"))) {
		include __DIR__ . '/views/' . $_GET['page'] . '/index.php';
	} else {
		include __DIR__ . '/views/layouts/header.php';

		if (!empty($_GET['page'])) {
			include __DIR__ . '/views/' . $_GET['page'] . '/index.php';
		} else {
			include __DIR__ . '/views/layouts/home.php';
		}
		include __DIR__ . '/views/layouts/footer.php';
	}
} else {

	include __DIR__ . "/views/auth/login.php";
}
