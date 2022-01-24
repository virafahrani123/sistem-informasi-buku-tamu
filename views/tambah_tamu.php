<?php 
include 'config/function.php';
 ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Tamu</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="no_rak" class="col-sm-2 control-label">NO ID Tamu</label>
                            <div class="col-sm-5">
                            <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor ID Tamu" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Tamu</label>
                            <div class="col-sm-5">
                            <input type="text" id="datepicker" class="form-control" name="nama" placeholder="Nama Lengkap">
                          </div>
                        </div>
						            <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" name="alamat" rows="3"></textarea>
                        </div>
                      </div> 

                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-5">
                            <input type="text" id="datepicker" class="form-control" name="no_hp" placeholder="Nomor Telepon">
                          </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-5">
                                <select name="status" class="form-control">
                            <option value="Pemateri">Pemateri</option>
                            <option value="Tamu">Tamu</option>
                             </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Dalam Kegiatan</label>
                            <div class="col-sm-5">
                                <select name="kegiatan" onchange="showUser(this.value)" class="form-control">
                            <option value="">Kegiatan</option>
                             <?php
                                $pos=mysqli_query($koneksi, "select * from tbl_kegiatan order by id_kegiatan");
                                while($r_pos=mysqli_fetch_array($pos)){
                                    echo "<option value=\"$r_pos[id_kegiatan]\">$r_pos[nama]</option>";
                                }
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
                            <div class="col-sm-offset-2 col-sm-3">
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Save</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=index&actions=admin" class="btn btn-danger btn-sm">
                        Kembali 
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



 <?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT id_tamu from tbl_tamu where id_tamu='".$_POST['id']."'"; 
    $ada=mysqli_query($koneksi, $cekdata) or die(mysqli_error());
    $data="SELECT * from tbl_tamu";
    $aya=mysqli_query($koneksi, $data) or die(mysqli_error());
    if(mysqli_num_rows($ada)>0) { 
      writeMsg('tamu.sama');
    } else { 
     $query="INSERT INTO tbl_tamu (id_tamu, nama,  alamat, no_hp, status,id_kegiatan,tanggal)
             VALUES ('".$_POST['id']."',
                    '".$_POST['nama']."',
                    '".$_POST['alamat']."',
                    '".$_POST['no_hp']."',
                    '".$_POST['status']."',
                    '".$_POST['kegiatan']."',
                    '".$_POST['tanggal']."')"; 
      mysqli_query($koneksi, $query) or die("Gagal menyimpan data karena :").mysqli_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=index&actions=admin">';
    } 
  } 

  ?>

