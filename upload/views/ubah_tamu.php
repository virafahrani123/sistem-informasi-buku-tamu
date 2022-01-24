<?php
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE id_tamu='$_GET[id]'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Form Update Data Tamu</h3>
        </div>
        <div class="panel-body">
          <!--membuat form untuk tambah data-->
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Tamu</label>
              <div class="col-sm-5">
                <input type="text" name="id" required value="<?=$data['id_tamu']?>"class="form-control"  placeholder="ID Tamu">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-5">
                <input type="text" name="nama" value="<?=$data['nama']?>"class="form-control"  placeholder="Nama">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-5">
                <textarea class="form-control" name="alamat" rows="3"><?=$data['alamat']?></textarea>
              </div>
            </div> 

            <div class="form-group">
              <label class="col-sm-2 control-label">No Hp</label>
              <div class="col-sm-5">
                <input type="text" name="no_hp" value="<?=$data['no_hp']?>"class="form-control"  placeholder="No Handphone">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-5">
                <select name="status" class="form-control">
                  <option value="<?=$data['status']?>"><?=$data['status']?></option>
                  <option value="Pemateri">Pemateri</option>
                  <option value="Tamu">Tamu</option>
                </select>
              </div>
            </div>
            <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
            <div class="form-group">
              <label class="col-sm-2 control-label">Dalam Kegiatan</label>
              <div class="col-sm-5">
                <select name="kegiatan" class="form-control">
                  <?php
                  $pos=mysqli_query($koneksi, "select * from tbl_kegiatan order by id_kegiatan");
                  while($r_pos=mysqli_fetch_array($pos) ){
                    ?>
                    <!--echo "<option value=\"$r_pos[id_paket]\">$r_pos[nama]</option>";-->
                    <option <?php if($data['id_kegiatan']==$r_pos['id_kegiatan']) {echo "selected"; } ?> value='<?php echo $r_pos['id_kegiatan'] ;?>'><?php echo $r_pos['nama'] ;?></option>
                    <?php
                  };
                  ?>
                </select>
              </div>
            </div>  

            <?php $tgl = date('Y-m-d'); ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal </label>
              <div class="col-sm-5">
                <input type="date" id="datepicker" class="form-control" name="tanggal" value="<?php echo $tgl ;?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" name="update" class="btn btn-success">
                  <span class="fa fa-edit"></span> Update Data </button>
                </div>
              </div>
            </form>


          </div>
          <div class="panel-footer">
            <a href="?page=index&actions=admin" class="btn btn-danger btn-sm">
              Kembali Ke Data Tamu
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php 
  if(isset($_POST['update'])){
    $query=mysqli_query($koneksi,"UPDATE tbl_tamu SET nama='$_POST[nama]', 
      alamat='$_POST[alamat]', 
      no_hp='$_POST[no_hp]', 
      status='$_POST[status]', 
      id_kegiatan='$_POST[kegiatan]',
      tanggal='$_POST[tanggal]'  
      WHERE id_tamu='$_POST[id]'")or die(mysqli_error());
    echo '<META HTTP-EQUIV="Refresh" Content="0;  URL=?page=index&actions=adm">';
  } 


  ?>


