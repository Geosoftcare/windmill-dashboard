<?php
session_start();

if (isset($_SESSION['usr_email'])) {
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_email']);
	header("Location: pages/login");
} else {
	header("Location: pages/login");
}

session_destroy();
