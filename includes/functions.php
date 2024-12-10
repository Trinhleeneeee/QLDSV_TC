<?php
    // Xac dinh hang so cho dia cho tuyet doi
    define('BASE_URL', 'http://localhost/quanlisinhvien/');
	
   
      
    // Tai dinh huong nguoi dung ve trang mac dinh la index
    function redirect_to($page = 'index.php') {
        $url = BASE_URL . $page;
        header("Location: $url");
        exit();
    }
    
    