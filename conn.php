<?php 
    $conn = mysqli_connect('localhost', 'waseem', '123456789', 'harirod');
    if(!$conn) {
        echo 'Connection error : ' .mysqli_connect_error();
    }
?> 