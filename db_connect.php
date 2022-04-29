<?php
$conn = mysqli_connect('{db_host}', '{db_user}', '{db_pass}', '{db_name}');
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
