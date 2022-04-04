<?php
$conn = mysqli_connect('localhost', 'root', 'nf16Mysql', 'vaidic_sanskriti_sansthaanam');
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
