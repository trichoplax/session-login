<?php

define('PASSWORDS', ['Alice' => 'password1']);

/**
 * Decide what html to use for the account page.
 *
 * @param $username
 * @param $password
 * @param $loggedIn
 *
 * @return string
 */
function accountPageHtml($username, $password, $loggedIn) {
    session_start();
    $htmlText = '';
    if (isLoggedIn($username, $password, $loggedIn)) {
        $_SESSION['loggedIn'] = true;
        $htmlText .= '<p>Congratulations you are logged in!</p>';
        $htmlText .= '<a href="index.php">Log out</a>';
    } else {
        $htmlText .= 'Log in failed.';
        $htmlText .= '<a href="index.php">Try again</a>';
    }
    return $htmlText;
}

/**
 * Determine whether logged in (now or previously).
 * @param $username
 * @param $password
 * @param $loggedIn
 */
function isLoggedIn($username, $password, $loggedIn) {
    $response = false;
    if ($loggedIn) {
        $response = true;
    }
    if (isValidLogin($username, $password)) {
        $response = true;
    }
    return $response;
}

/**
 * Check if password is correct for username.
 *
 * @param $username
 * @param $password
 *
 * @return bool True if password is correct.
 */
function isValidLogin($username, $password) {
    if (PASSWORDS[$username] === $password) {
        $response = true;
    } else {
        $response = false;
    }
    return $response;
}