<?php
session_start();
require_once '../includes/functions.php';

redirect(isLoggedIn() ? 'dashboard.php' : 'login.php');
