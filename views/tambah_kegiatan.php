<?php 
include "./config/function.php"
 ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="POST">

						<div class="form-group">
                            <label for="" class="col-sm-3 control-label">Kode Kegiatan</label>
                            <div class="col-sm-3">
                                <input type="text" name="kode" class="form-control" id="inputEmail3" placeholder="Kode Kegiatan">
                            </div>
                        </div>

						<div class="form-group">
                            <label class="col-sm-3 control-label">Nama Kegiatan</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama Kegiatan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="reset" class="btn btn-primary btn-sm-3">
                                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=index&actions=admin" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-arrow-left"> Back </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



<?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT id_kegiatan from tbl_kegiatan where id_kegiatan='".$_POST['kode']."'";
    $ada=mysqli_query($koneksi, $cekdata) or die(mysqli_error()); 
    $data="SELECT * from tbl_kegiatan";
    $aya=mysqli_query($koneksi, $data) or die(mysqli_error());
    if(mysqli_num_rows($ada)>0) { 
      writeMsg('kegiatan.sama');
    } else if(mysqli_num_rows($aya)>=5){
      writeMsg('kegiatan.lebih');
    } else { 
      $query="INSERT INTO tbl_kegiatan (id_kegiatan, nama) VALUES ('".$_POST['kode']."','".$_POST['nama']."')";
      mysqli_query($koneksi, $query) or die("Gagal menyimpan data karena :").mysqli_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=data&actions=kegiatan">';
    } 
  } 

  ?>
