<?php

try {
    $db = new PDO( 'mysql:host=localhost;dbname=hall_booking;charset=utf8', 'root', '' );
}

catch(Exception $e) {
    echo "An error has occurred";
}

?>
