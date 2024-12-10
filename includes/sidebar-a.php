<div id="content-container">
    <div id="section-navigation">
	   <ul class="navi">
       <?php
       /* 
            $q = "SELECT *FROM diem";
            $r = mysqli_query($dbc, $q)  or die("Query{$q} \n <br/> MySQL Error: ".mysqli_error($dbc));
            
            // hiển thị từng cái ra một
       while($diems = mysqli_fetch_array($r, MySQLI_ASSOC)) { 
            echo "<li><a href=''> " . $diems['ten_sv']. "</a>";
       }
       */
        ?> 
            
       <li><a href="view_diem.php">Bảng điểm Sinh Viên</a></li>
	   </ul>
</div><!--end section-navigation-->