<?php include('../includes/header.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/sidebar-admin.php');?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gia tri ton tai, xu ly form
        $errors =  array();
        
        if(empty($_POST['diemlan1'])) {
            $errors[] = "diem_lan1";
        } else {
            $diemlan1 = mysqli_real_escape_string($dbc, strip_tags($_POST['diemlan1']));
        }
        if(empty($_POST['diemlan2'])) {
            $errors[] = "diem_lan2";
        } else {
            $diemlan2 = mysqli_real_escape_string($dbc, strip_tags($_POST['diemlan2']));
        }
        
        if(empty($errors)) { 
            // $Hoten = $_POST['Hoten'];
            $MaMH = $_POST['MaMH'];
            $MaSV = $_POST['MaSV'];
            // Nếu không có lỗi xả ra thì chèn vào csdl.
        $q = "INSERT INTO diemmonhoc ( MaMH, MaSV, diemlan1, diemlan2) VALUES ('{$MaMH}','{$MaSV}','{$diemlan1}', '{$diemlan2}')";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                
        
        if(mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>Thêm điểm thành công.</p>";
            } else {
                $messages = "<p class='warning'>Kết nối đến Database bị lỗi.</p>";
            }
        } else {
            $messages = "<p class='warning'>Vui lòng điền đầy đủ thông tin các trường</p>";
        
        }
    } // Ket thuc main IF submit
?>

    <div id="content">
    <h2>THÊM ĐIỂM CHO SINH VIÊN</h2>
    <?php if(!empty($messages)) echo $messages; ?>
	<form id="add_diem" action="" method="post">
    <fieldset>
    	<legend>THÊM ĐIỂM</legend>
            
            <div>
                <label> Họ tên: </label>
                <select name="Hoten" tabindex='1'>
                    <?php
                        $q = "SELECT MaSV, Hoten FROM thongtinsinhvien";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                            echo "<option value='{$hien_thi['Hoten']}'";        
                            echo ">{$hien_thi['Hoten']}</otption>";
                        }
                    ?>
                </select>
            </div>
            
           <div>
                <label> MaSV: </label>
                <select name="MaSV" tabindex='1'>
                    <?php
                        $q = "SELECT MaSV, Hoten FROM thongtinsinhvien";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                            echo "<option value='{$hien_thi['MaSV']}'";
                                    
                            echo ">{$hien_thi['MaSV']}</otption>";
                        }
                    ?>
                </select>
            </div>
    
            <div>
                <label> Mã môn học: </label>
                <select name="MaMH" tabindex='2'>
                    <?php
                        $q = "SELECT MaMH FROM monhoc";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                            echo "<option value='{$hien_thi['MaMH']}'";
                                    
                            echo ">{$hien_thi['MaMH']}</otption>";
                        }
                    ?>
                </select>
            </div>
        
            <div>
                <label for="diemlan1"> Điểm lần 1: <span class="required">*</span>
                     <?php 
                            if(isset($errors) && in_array('diem_lan1', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập điểm lần 1 cho SV</p>";
                            }
                    ?>
                </label>
                <input type="text" name="diemlan1" id="diemlan1" value="" size="20" maxlength="150" tabindex="3" />
                    
                </select>
            </div>
            
            <div>
                <label for="diemlan2"> Điểm lần 2: <span class="required">*</span>
                     <?php 
                            if(isset($errors) && in_array('diem_lan2', $errors)) {
                                echo "<p class='warning'>Vui lòng nhập điểm lần 2 cho SV</p>";
                            }
                    ?>
                </label>
                <input type="text" name="diemlan2" id="diemlan2" value="" size="20" maxlength="150" tabindex="4" />
                    
                </select>
            </div>
            
            
            
        </fieldset>
        <p><input type="submit" name="submit" value="ADD ĐIỂM" /></p>
    </form>

</div><!--end content-->
<?php include('../includes/footer.php'); ?>