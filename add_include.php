<?php include("lib_db.php"); ?>
  <?php
// Lấy thông tin hãng Sản phẩm Selectbox
$error_ten_sp = isset($_REQUEST['error_ten_sp']) ? $_REQUEST['error_ten_sp']:"";
$error_anh_sp = isset($_REQUEST['error_anh_sp']) ? $_REQUEST['error_anh_sp']:"";
$error_gia_sp = isset($_REQUEST['error_gia_sp']) ? $_REQUEST['error_gia_sp']:"";
$error_id_hang = isset($_REQUEST['error_id_hang']) ? $_REQUEST['error_id_hang']:"";
$error_id_dm = isset($_REQUEST['error_id_dm']) ? $_REQUEST['error_id_dm']:"";
$error_trang_thai = isset($_REQUEST['error_trang_thai']) ? $_REQUEST['error_trang_thai']:"";
$error_chi_tiet = isset($_REQUEST['error_chi_tiet']) ? $_REQUEST['error_chi_tiet']:"";

$sqlHang = "SELECT * FROM hangsp";
$queryHang = select_list($sqlHang);

$sqlCate = "SELECT * FROM category";
$queryCate = select_list($sqlCate);

?>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add product</div>
        <div class="panel-body">
          <form method="post" action="add_exec.php"  enctype="multipart/form-data">
            <input type="hidden" name="id_sp" />
            <div class="form-group">
              <label for="exampleInputName">Name</label>
              <input type="text" name="ten_sp" class="form-control" />
              <p class="help-block">
                <?php echo $error_ten_sp;?>
              </p>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <input id="image_file" type="file" name="image_file" />
              <input id="select_file" type="hidden" name="anh_sp"/>
              <input id="path_file" type="hidden" value="" name="path_img" />
              <p class="help-block">
                <?php echo $error_anh_sp;?>
              </p>
            </div>
            <div class="form-group">
              <label for="exampleInputPrice">Price</label>
              <input id="price" type="number" name="gia_sp" class="form-control" />
              <p class="help-block">
                <?php echo $error_gia_sp;?>
              </p>
            </div>
            <div class="form-group">
              <label for="exampleInputCompany">Company</label>
              <select name="id_hang" class="form-control">
                <option value="" selected="selected">Choose the Company</option>
                <?php foreach ($queryHang as $obj) {?>
                  <option value=<?php echo $obj[ 'id_hang']?>>
                    <?php echo $obj['ten_hang']?>
                  </option>
                  <?php } ?>
              </select>
              <p class="help-block">
                <?php echo $error_id_hang;?>
              </p>
            </div>
            <div class="clearfix"></div>
            </br>
            <div class="form-group">
              <label for="exampleInputCategory">Category</label>
              <select name="id_dm" class="form-control">
                <option value="" selected="selected">Choose the Category</option>
                <?php foreach ($queryCate as $obj) {?>
                  <option value=<?php echo $obj[ 'id_dm']?>>
                    <?php echo $obj['ten_dm']?>
                  </option>
                  <?php } ?>
              </select>
              <p class="help-block">
                <?php echo $error_id_dm;?>
              </p>
            </div>
            <div class="clearfix"></div>
            </br>
            <div class="form-group">
              <label for="exampleInputFile">Trang thai</label>
              <input type="checkbox" name="trang_thai" value="1" />
              <p class="help-block">
                <?php echo $error_trang_thai; ?>
              </p>
            </div>
            <div class="form-group">
              <label>Special</label>
              Yes
              <input type="radio" name="dac_biet[]" value=1 /> No
              <input type="radio" name="dac_biet[]" value=0 />
            </div>
            <div class="form-group">
              <label for="exampleInputDetail">Detail</label>
              <textarea id="ckeditor" class="ckeditor" name="chi_tiet"></textarea>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('chi_tiet');
              </script>
              <p class="help-block">
                <?php echo $error_chi_tiet;?>
              </p>
            </div>

            <p class="text-right">
              <input class="btn btn-warning" type="submit" name="submit" value="Add" />
              <input class="btn btn-warning" type="reset" name="reset" value="reset" />
            </p>

        </div>
        </form>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#image_file').change(function() {
          var filename = $('#image_file')[0].files[0];
          $('#select_file').val(filename.name);
        });
      });
    </script>