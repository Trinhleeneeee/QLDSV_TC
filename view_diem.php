<?php include('includes/header.php');?>
<?php include('includes/mysqli_connect.php');?>
<?php include('includes/sidebar-a.php'); ?>
    <div id="content">
	<h2>Xem bảng điểm</h2>
    <table>
    	<thead>
    		<tr>
    			<th><a href="view_diem.php?sort=hoten">Họ Tên</a></th>
    			<th><a href="view_diem.php?sort=masv">Mã SV</th>
    			<th><a href="">Ngày sinh</th>
                <th><a href="">Lớp</th>
                <th><a href="">Môn học</th>
                <th><a href="view_diem.php?sort=diem1">Điểm lần 1</th>
                <th><a href="view_diem.php?sort=diem2">Điểm lần 2</th>
                <th><a href="view_diem.php?sort=trinh">Số trình</th>
    		</tr>
    	</thead>
    	<tbody>
        <?php 
            // Sắp xếp theo thứ tự của bảng.
                if(isset($_GET['sort'])) {
                    switch ($_GET['sort']) {
                        case 'hoten': 
                        $order_by = 'Hoten';
                        break;
                        
                        case 'diem1': 
                        $order_by = 'diemlan1';
                        break;
                        
                        case 'diem2': 
                        $order_by = 'diemlan2';
                        break;
    
                        
                        default: 
                        $order_by = 'MaSV';
                        break;
                    }  // End Switch
                    }
                    else {
                        $order_by = 'sodonvihoctrinh';
                    }  // ENd isset ($_GET['sort']).
                    

            
            // Truy xuất csdl để hiển thị bảng điểm.
            /* $q = "SELECT t.MaSV, t.Hoten, t.Ngaysinh  ";
            $q .= " FROM thongtinsinhvien AS t ";
            $q .= " JOIN mon AS m USING (mon_id) ";
            $q .= " ORDER BY {$order_by} ASC ";
            $r = mysqli_query($dbc, $q) or die("Query{$q} \n <br/> MySQL Error: ".mysqli_error($dbc)); */
            
            
            $q = "SELECT * ";
            $q .= " FROM thongtinsinhvien AS t, monhoc AS m, diemmonhoc AS d, lop AS l, lopsinhvien AS lop";
            $q .= " WHERE  m.MaMH = d.MaMH and (t.MaSV = d.MaSV and d.MaSV = lop.MaSV) ";
            $q .= " ORDER BY {$order_by} ASC ";
            $r = mysqli_query($dbc, $q) or die("Query{$q} \n <br/> MySQL Error: ".mysqli_error($dbc));
            
            while($bangdiem = mysqli_fetch_array($r, MYSQL_ASSOC)) {
                echo "
                    <tr>
                        <td>{$bangdiem['Hoten']}</td>
                        <td>{$bangdiem['MaSV']}</td>
                        <td>{$bangdiem['Ngaysinh']}</td>
                        <td>{$bangdiem['Tenlop']}</td>
                        <td>{$bangdiem['TenMH']}</td>
                        <td>{$bangdiem['diemlan1']}</td> 
                        <td>{$bangdiem['diemlan2']}</td>
                        <td>{$bangdiem['sodonvihoctrinh']}</td>
                    </tr>             
                ";
            }
        ?>  
        
            
    	</tbody>
    </table>
</div><!--end content-->


<?php include('includes/footer.php'); ?>