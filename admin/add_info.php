<?php include('../includes/header.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/sidebar-admin.php');?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gia tri ton tai, xu ly form
        $errors =  array();
        if(empty($_POST['hoten'])) {
            $errors[] = "ho_ten";
        } else {
            $Hoten = mysqli_real_escape_string($dbc, strip_tags($_POST['hoten']));
        }
        if(empty($_POST['masv'])) {
            $errors[] = "ma_sv";
        } else {
            $MaSV = mysqli_real_escape_string($dbc, strip_tags($_POST['masv']));
        }
        if(empty($_POST['ngaysinh'])) {
            $errors[] = "ngay_sinh";
        } else {
            $Ngaysinh = mysqli_real_escape_string($dbc, strip_tags($_POST['ngaysinh']));
        }
        /* if(empty($_POST['malop'])) {
            $errors[] = "ma_lop";
        } else {
            $Malop = mysqli_real_escape_string($dbc, strip_tags($_POST['malop']));
        }
        if(empty($_POST['tenlop'])) {
            $errors[] = "ten_lop";
        } else {
            $Tenlop = mysqli_real_escape_string($dbc, strip_tags($_POST['tenlop']));
        } */
        
        if(empty($errors)) {
            // Nếu không có lỗi xả ra thì chèn vào csdl.
        $q = "INSERT INTO thongtinsinhvien (MaSV, Hoten, Ngaysinh) VALUES ('{$MaSV}', '{$Hoten}', '{$Ngaysinh}')";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
        
       // $q1 = "INSERT INTO lop (Tenlop ) VALUES ('{$Tenlop}' )";
       // $r1 = mysqli_query($dbc, $q1) or die("Query {$q1} \n<br/> MySQL Error: " .mysqli_error($dbc));
        
        $q2 = "INSERT INTO lopsinhvien (MaSV) VALUES  ('{$MaSV}')";
        $r2 = mysqli_query($dbc, $q2) or die("Query {$q2} \n<br/> MySQL Error: " .mysqli_error($dbc));
        
        
         /* $q1 = "INSERT INTO thongtinsinhvien (MaSV, Hoten, Ngaysinh) VALUES ('{$MaSV}', '{$Hoten}', '{$Ngaysinh}')" ;
         $q2 = "INSERT INTO monhoc (TenMH) VALUES ('{$TenMH}')";
         $q3 = "INSERT INTO diemmonhoc(diemlan1, diemlan2) VALUES ('{$diemlan1}', '{$diemlan2}') "; */
        
        
        
        
        if(mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>Thêm thông tin thành công.</p>";
            } else {
                $messages = "<p class='warning'>Kết nối đến Database bị lỗi.</p>";
            }
        } else {
            $messages = "<p class='warning'>Vui lòng điền đầy đủ thông tin các trường</p>";
        
        }
    } // Ket thuc main IF submit
?>
    <div id="content">
    <h2>THÊM THÔNG TIN CHO SINH VIÊN</h2>
    <?php if(!empty($messages)) echo $messages; ?>
	<form id="add_info" action="" method="post">
    <fieldset>
    	<legend>THÊM THÔNG TIN</legend>
            <div>
                <label for="hoten"> Họ tên: <span class="required">*</span>
                    <?php 
                        if(isset($errors) && in_array('ho_ten', $errors)) {
                            echo "<p class='warning'>Vui lòng nhập tên Sinh Viên</p>";
                        }
                    ?>
                </label>
                <input type="text" name="hoten" id="hoten" value="" size="20" maxlength="150" tabindex="1" />
            </div>
            
            <div>
                <label for="masv"> Mã SV: <span class="required">*</span>
                    <?php 
                            if(isset($errors) && in_array('ma_sv', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập tên Mã Sinh Viên</p>";
                            }
                    ?>
                </label>
                <input type="text" name="masv" id="masv" value="" size="20" maxlength="150" tabindex="2" />
                    
                </select>
            </div>
            
            <div>
                <label for="ngaysinh"> Ngày sinh: <span class="required">*</span>
                     <?php 
                            if(isset($errors) && in_array('ngay_sinh', $errors)) {
                                echo "<p class='warning'> Vui lòng nhập vào ngày sinh</p>";
                            }
                    ?>
                </label>
                <input type="text" name="ngaysinh" id="ngaysinh" value="" size="20" maxlength="150" tabindex="3" />
            </div>
            
            
            
            <div>
                <label> Tên lớp: </label>
                    <select name="Tenlop">
                          <?php
                            $q = "SELECT Tenlop FROM lop";
                            $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                            while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                echo "<option value='{$hien_thi['Tenlop']}'";         
                                echo ">{$hien_thi['Tenlop']}</otption>";
                            }
                        ?>
                    </select>
            </div>

            
            <div>
                <label> Mã lớp: </label>
                    <select name="Malop">
                         <?php
                            $q = "SELECT Malop FROM lop";
                            $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                            while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                echo "<option value='{$hien_thi['Malop']}'";       
                                echo ">{$hien_thi['Malop']}</otption>";
                            }
                        ?>
                     </select>
            </div>
            
            
            
    </fieldset>
    <p><input type="submit" name="submit" value="ADD INFO" /></p>
</form>

</div><!--end content-->
<?php include('../includes/footer.php'); ?>