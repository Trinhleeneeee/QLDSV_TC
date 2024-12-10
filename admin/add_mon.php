<?php include('../includes/header.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/sidebar-admin.php');?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gia tri ton tai, xu ly form
        $errors =  array();
        if(empty($_POST['tenmon'])) {
            $errors[] = "ten_mon";
        } else {
            $TenMH = mysqli_real_escape_string($dbc, strip_tags($_POST['tenmon']));
        }
        if(empty($_POST['mamon'])) {
            $errors[] = "ma_mon";
        } else {
            $MaMH = mysqli_real_escape_string($dbc, strip_tags($_POST['mamon']));
        }
        if(empty($_POST['sotrinh'])) {
            $errors[] = "so_trinh";
        } else {
            $sodonvihoctrinh = mysqli_real_escape_string($dbc, strip_tags($_POST['sotrinh']));
        }
        
        
        if(empty($errors)) {
            // Nếu không có lỗi xả ra thì chèn vào csdl.
        $q = "INSERT INTO monhoc (TenMH, MaMH, sodonvihoctrinh) VALUES ('{$TenMH}', '{$MaMH}', '{$sodonvihoctrinh}')";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));

        if(mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>Thêm môn thành công.</p>";
            } else {
                $messages = "<p class='warning'>Kết nối đến Database bị lỗi.</p>";
            }
        } else {
            $messages = "<p class='warning'>Vui lòng điền đầy đủ thông tin các trường</p>";
        
        }
    } // Ket thuc main IF submit
?>
    <div id="content">
    <h2>THÊM MÔN HỌC</h2>
    <?php if(!empty($messages)) echo $messages; ?>
	<form id="add_mon" action="" method="post">
    <fieldset>
    	<legend>THÊM MÔN</legend>
            <div>
                <label for="tenmon"> Môn học: <span class="required">*</span>
                    <?php 
                        if(isset($errors) && in_array('ten_mon', $errors)) {
                            echo "<p class='warning'>Vui lòng nhập tên môn học</p>";
                        }
                    ?>
                </label>
                <input type="text" name="tenmon" id="tenmon" value="" size="20" maxlength="150" tabindex="1" />
            </div>
            
            <div>
                <label for="mamon"> Mã môn: <span class="required">*</span>
                    <?php 
                            if(isset($errors) && in_array('ma_mon', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập mã môn học</p>";
                            }
                    ?>
                </label>
                <input type="text" name="mamon" id="mamon" value="" size="20" maxlength="150" tabindex="2" />
                    
                </select>
            </div>
            
            <div>
                <label for="sotrinh"> Số trình: <span class="required">*</span>
                     <?php 
                            if(isset($errors) && in_array('so_trinh', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập vào số trình</p>";
                            }
                    ?>
                </label>
                <input type="text" name="sotrinh" id="sotrinh" value="" size="20" maxlength="150" tabindex="3" />

            
    </fieldset>
    <p><input type="submit" name="submit" value="ADD MÔN" /></p>
</form>

</div><!--end content-->
<?php include('../includes/footer.php'); ?>