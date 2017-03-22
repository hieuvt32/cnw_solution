<?php
include("lib_db.php");
$id_sp = $_GET['id_sp'];
$error_ten_sp = isset($_REQUEST['error_ten_sp']) ? $_REQUEST['error_ten_sp']:"";
$error_anh_sp = isset($_REQUEST['error_anh_sp']) ? $_REQUEST['error_anh_sp']:"";
$error_gia_sp = isset($_REQUEST['error_gia_sp']) ? $_REQUEST['error_gia_sp']:"";
$error_id_hang = isset($_REQUEST['error_id_hang']) ? $_REQUEST['error_id_hang']:"";
$error_id_dm = isset($_REQUEST['error_id_dm']) ? $_REQUEST['error_id_dm']:"";
$error_trang_thai = isset($_REQUEST['error_trang_thai']) ? $_REQUEST['error_trang_thai']:"";
$error_chi_tiet = isset($_REQUEST['error_chi_tiet']) ? $_REQUEST['error_chi_tiet']:"";
$foldername = str_replace("\\","//",dirname(__FILE__));
// Lấy Thông tin của sản phẩm trong CSDL
$sql = "SELECT * FROM sanpham WHERE id_sp = {$id_sp}";
$row = select_one($sql);

// Lấy thông tin Danh mục Sản phẩm Selectbox
$sqlDm = "SELECT * FROM category";
$queryDm = select_list($sqlDm);
// Lấy thông tin hãng Sản phẩm Selectbox
$sqlHang = "SELECT * FROM hangsp";
$queryHang = select_list($sqlHang);
?>
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Edit product</div>
      <div class="panel-body">
        <form method="post" action="edit_exec.php" enctype="multipart/form-data">
          <input type="hidden" name="id_sp" class="form-control" value="<?php echo $row['id_sp']; ?>" />
          <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="ten_sp" class="form-control" value="<?php echo $row['ten_sp'];?>" />
            <p class="help-block">
              <?php echo $error_ten_sp;?>
            </p>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <input id="image_file" type="file" name="image_file" />
            <input id="select_file" type="hidden" value="<?php echo $row['anh_sp']; ?>" name="anh_sp"/>
            <input id="path_file" type="hidden" value="" name="path_img" />
            <p class="help-block"></p>
          </div>
          <div class="form-group">
            <label for="exampleInputPrice">Price</label>
            <input id="price" type="number" name="gia_sp" value="<?php echo $row['gia_sp'];?>" class="form-control" />
            <p class="help-block">
              <?php echo $error_gia_sp;?>
            </p>
          </div>
          <div class="form-group">
            <label for="exampleInputCompany">Company</label>
            <select name="id_hang" id="id_hang" class="form-control" value="<?php echo $row['id_hang'];?>">
              <option value="">Choose the Company</option>
              <?php foreach($queryHang as $rowHang){?>
                <option value="<?php echo $rowHang['id_hang']?>">
                  <?php echo $rowHang['ten_hang']?>
                </option>
                <?php }?>
            </select>
            <p class="help-block">
              <?php echo $error_id_hang;?>
            </p>
          </div>
          <div class="form-group">
            <label for="exampleInputCategory">Category</label>
            <select name="id_dm" id="id_dm" class="form-control" value="<?php echo $row['id_dm'];?>">
              <option value="">Choose the Category</option>
              <?php foreach($queryDm as $rowDm){?>
                <option value="<?php echo $rowDm['id_dm']?>">
                  <?php echo $rowDm['ten_dm']?>
                </option>
                <?php } ?>
            </select>
            <p class="help-block">
              <?php echo $error_id_dm;?>
            </p>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Trang thai</label>
            <input type="checkbox" name="trang_thai" value="<?php echo $row['trang_thai'] ?>" <?php echo $row[ 'trang_thai']? "checked" : ""?> />
            <p class="help-block">
              <?php echo $error_trang_thai; ?>
            </p>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Special</label>
            Yes
            <input type="radio" name="dac_biet[]" value=1 <?php echo $row[ 'dac_biet'] ? "checked" : "";?>/> No
            <input type="radio" name="dac_biet[]" value=0 <?php echo !$row[ 'dac_biet'] ? "checked" : "";?> />

          </div>
          <div class="form-group">
            <label for="exampleInputDetail">Detail</label>
            <textarea id="ckeditor" class="ckeditor" name="chi_tiet" value="<?php echo $row['chi_tiet'];?>"></textarea>
            <script>
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace('chi_tiet');
            </script>
            <p class="help-block">
              <?php echo $error_chi_tiet;?>
            </p>
          </div>
          <input class="btn btn-warning" type="submit" name="submit" value="Update" />
          <input class="btn btn-warning" type="reset" name="reset" value="reset" />
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#image_file').change(function(e) {
        var filename = $(this)[0].files[0];
        $('#select_file').val(filename.name);
        var tmppath = URL.createObjectURL(e.target.files[0]);
        console.log(e.target.files[0]);
        var data = document.getElementById('image_file').path;
        console.log(data);
      });
      $("#ckeditor").val(`<?php echo $row['chi_tiet'];?>`);
      $("#id_dm").val("<?php echo $row['id_dm'];?>");
      $("#id_hang").val("<?php echo $row['id_hang'];?>");
    });
  </script>