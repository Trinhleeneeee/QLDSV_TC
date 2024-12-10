<?php
    // Ket noi voi CSDL
    $dbc = mysqli_connect('localhost', 'root', '', 'quanlisinhvien');
    
    // Neu connect khong thanh thi bao loi xay ra.
    if(!$dbc) {
        trigger_error("Could not connect to DB: " . mysqli_connect_errno());
    } else {
        // Dat phuong thuc ket noi la utf-8
        mysqli_set_charset($dbc, 'utf-8');
    }
?>