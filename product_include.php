<?php
include_once("lib_db.php");
$sql = "SELECT * FROM sanpham
INNER JOIN category
ON sanpham.id_dm = category.id_dm
INNER JOIN hangsp
ON sanpham.id_hang = hangsp.id_hang";
$query = select_list($sql);

setlocale(LC_MONETARY, 'en_US');
?>
  <div class="col-xs-12">

    <p class="text-right">
      <h2 class="pull-left">List of product</h2>
      <span class="btn btn-warning pull-right"><a href="add.php">Add product</a></span>
    </p>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="btn-warning">
            <th>ID</th>
            <th>Products name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Company</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($query as $row){?>
            <tr>
              <th><span><?php echo $row['id_sp'];?></span></th>
              <th>
                <a href="#">
                  <?php echo $row['ten_sp'];?>
                </a>
              </th>
              <th><span class="thumb"><img width="80" src="images/<?php echo $row['anh_sp'];?>" /></span></th>
              <th><span class="price"><?php echo number_format($row['gia_sp'], 2);?></span>$</th>
              <th>
                <?php echo $row['ten_dm'];?>
              </th>
              <th>
                <?php echo $row['ten_hang'];?>
              </th>
              <th><a href="edit.php?id_sp=<?php echo $row['id_sp']; ?>"><span>Edit</span></a></th>
              <th><a onclick=" return confirm('Bạn có muốn xóa ?');" href="delete.php?id_sp=<?php echo $row['id_sp']; ?>"><span>Delete</span></a></th>
            </tr>
            <?php }?>
        </tbody>
      </table>
      <div class="text-right">
        <ul class="pagination" style="padding:0px;">
          <li class="active"><a href="">1</a></li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>