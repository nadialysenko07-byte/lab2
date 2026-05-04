<?php
require_once 'auth.php';
logoutAdmin();
header('Location: index.php');
exit;
