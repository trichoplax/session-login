<?php
require_once('php/functions.php');

echo accountPageHtml($_POST['username'], $_POST['password'], $_SESSION['loggedIn']);



