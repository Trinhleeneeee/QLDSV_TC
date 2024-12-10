<?php include('../includes/header.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/sidebar-admin.php');?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gia tri ton tai, xu ly form
        $errors =  array();
        if(empty($_POST['malop'])) {
            $errors[] = "ma_lop";
        } else {
            $Malop = mysqli_real_escape_string($dbc, strip_tags($_POST['malop']));
        }
        if(empty($_POST['tenlop'])) {
            $errors[] = "ten_lop";
        } else {
            $Tenlop = mysqli_real_escape_string($dbc, strip_tags($_POST['tenlop']));
        }
        if(empty($errors)) {
            // Nếu không có lỗi xả ra thì chèn vào csdl.
        $q = "INSERT INTO lop (Malop, Tenlop) VALUES ('{$Malop}', '{$Tenlop}')";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
        
        $q2 = "INSERT INTO lopsinhvien (Malop) VALUES  ('{$Malop}')";
        $r2 = mysqli_query($dbc, $q2) or die("Query {$q2} \n<br/> MySQL Error: " .mysqli_error($dbc));

        if(mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>Thêm lớp thành công.</p>";
            } else {
                $messages = "<p class='warning'>Kết nối đến Database bị lỗi.</p>";
            }
        } else {
            $messages = "<p class='warning'>Vui lòng điền đầy đủ thông tin các trường</p>";
        
        }
    } // Ket thuc main IF submit
?>
    <div id="content">
    <h2>THÊM LỚP HỌC</h2>
    <?php if(!empty($messages)) echo $messages; ?>
	<form id="add_lop" action="" method="post">
    <fieldset>
    	<legend>THÔNG TIN LỚP HỌC</legend>
            <div>
                <label for="malop"> Mã Lớp: <span class="required">*</span>
                    <?php 
                        if(isset($errors) && in_array('ma_lop', $errors)) {
                            echo "<p class='warning'>Vui lòng nhập mã lớp học</p>";
                        }
                    ?>
                </label>
                <input type="text" name="malop" id="malop" value="" size="20" maxlength="150" tabindex="1" />
            </div>
            
            <div>
                <label for="tenlop"> Tên Lớp: <span class="required">*</span>
                    <?php 
                            if(isset($errors) && in_array('ten_lop', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập lớp học</p>";
                            }
                    ?>
                </label>
                <input type="text" name="tenlop" id="tenlop" value="" size="20" maxlength="150" tabindex="2" />
                    
                </select>
            </div>
    </fieldset>
    <p><input type="submit" name="submit" value="ADD LỚP" /></p>
</form>

</div><!--end content-->
<?php include('../includes/footer.php'); ?>