<?php include('../includes/header.php');?>
<?php include('../includes/mysqli_connect.php');?>
<?php include('../includes/functions.php');?>
<?php include('../includes/sidebar-admin.php');?>

<?php 
    // Xac nhan bien GET ton tai va thuoc loai du lieu cho phep
    if(isset($_GET['cid'])) //&& filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' =>1))) 
    {
        $cid = $_GET['cid'];
    } else {
       redirect_to();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gia tri ton tai, xu ly form
        $errors =  array();
        
        // Kiem tra diemlan1
        if(empty($_POST['diemlan1'])) {
            $errors[] = "diem_lan1";
        } else {
            $diemlan1 = $_POST['diemlan1'];
        }
        
        //Kiem tra diem lan 2
        if(empty($_POST['diemlan2'])) {
            $errors[] = "diem_lan2";
        } else {
            $diemlan2 = $_POST['diemlan2'];
        }
        
        if(empty($errors)) {
            // Nếu không có lỗi xả ra thì chèn vào csdl.
        $q = "UPDATE diemmonhoc (diemlan1, diemlan2) SET diemlan1 = {$diemlan1}, diemlan2 = {$diemlan2}";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
        
        if(mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>Sửa điểm thành công.</p>";
            } else {
                $messages = "<p class='warning'>Kết nối đến Database bị lỗi.</p>";
            }
        } else {
            $messages = "<p class='warning'>Vui lòng điền đầy đủ thông tin các trường</p>";
        
        }
    } // Ket thuc main IF submit
?>
    <div id="content">
    <?php 
          $q = "SELECT diemlan1, diemlan2, MaSV, Hoten, MaMH FROM monhoc, thongtinsinhvien, diemmonhoc WHERE Hoten = {$cid} ";
         $r = mysqli_query($dbc, $q) or die("Query{$q} \n <br/> MySQL Error: ".mysqli_error($dbc));
         if(mysqli_num_rows($r) == 1) {
            // Neu cac truong ton tai trong bang diem,, dua vao CID, xuat du lieu
            list($Hoten, $MaSV, $diemlan1, $diemlan2) =  mysqli_fetch_array($r, MYSQLI_NUM);
        } else {
            // Neu CID khong hop le se khong the hien thi ra bang diem
            $message = "<p class= 'warning'> Trường này không có.<p>";
        }
    ?>
    
    <h2>SỬA ĐIỂM CHO SINH VIÊN</h2>
    <?php 
        if(!empty($messages)) echo $messages; 
    ?>
	<form id="edit_diem" action="" method="post">
    <fieldset>
    	<legend>SỬA ĐIỂM</legend>
            
            <div>
                <label> Ma SV: </label>
                <select name="" tabindex='1'>
                    <?php
                        $q = "SELECT MaSV, Hoten FROM thongtinsinhvien";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                            echo "<option value=''";
                                    
                            echo ">{$hien_thi['Hoten']}</otption>";
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <label> Mã môn học: </label>
                <select name="" tabindex='2'>
                    <?php
                        $q = "SELECT MaMH FROM monhoc";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        while($hien_thi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                            echo "<option value=''";
                                    
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
                <input type="text" name="diemlan1" id="diemlan1" value="<?php if(isset($diemlan1)) echo $diemlan1 ?>" size="20" maxlength="150" tabindex="3" />
                    
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
                <input type="text" name="diemlan2" id="diemlan2" value="<?php if(isset($diemlan2)) echo $diemlan2 ?>" size="20" maxlength="150" tabindex="4" />
                    
                </select>
            </div>
            
            
            
        </fieldset>
        <p><input type="submit" name="submit" value="ADD ĐIỂM" /></p>
    </form>

</div><!--end content-->
<?php include('../includes/footer.php'); ?>