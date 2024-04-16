<?php  
    //connect to the database
    $conn = mysqli_connect('localhost:4306','aman','aman1234','aman_pizza');
    if (!$conn) {
        echo("Connection error: " . mysqli_connect_error());
}



?> 