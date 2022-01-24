<?php
include "./config/function.php";
 ?>
<div class="container">
    <div class="row">
        <div class ="col-xs-12">

            <div class="alert alert-info">
                Selamat datang kembali <strong><?=$_SESSION['nama']?></strong>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Halaman Buku Tamu</h3>
                </div>

                 <div class="panel-body">
                   <tr>
                    <td >
                        <a href="?page=tambah&actions=tamu" class="btn btn-success btn-sm">
                            Tambah Data Tamu
                        </a>
                    </td>

                            
                     </tr>
                     <table class="table table-hover table-bordered table-striped">
                         <thead>
                            <tr class="info">
                                <th>No.</th>
                                <th width="30%">Nama</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Status</th>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                      <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT tbl_tamu.*, tbl_kegiatan.nama as nama_kegiatan from tbl_tamu inner join tbl_kegiatan on tbl_tamu.id_kegiatan=tbl_kegiatan.id_kegiatan where tbl_tamu.id_kegiatan=tbl_kegiatan.id_kegiatan";
                
                            $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['no_hp'] ?></td>
                                   
                                   
                                
                                    <td><?php if ($data['status']=='Pemateri'){ ?>
                                    <span class="label label-success"><?php echo ucfirst($data['status']) ?></span>
                                     <?php }else{ ?>
                                     <span class="label label-danger"><?php echo ucfirst($data['status']) ?></span>
                                        <?php }?>
                                    </td>
                                    <td><?= $data['nama_kegiatan'] ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                 
                      
                              <td align="center">          
                                
                                <a href="?page=ubah&actions=tamu&id=<?php echo $data['id_tamu'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                <a href="?page=hapus&actions=tamu&id=<?php echo $data['id_tamu'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>         
                                </td>      
                              </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        <tfoot>

                             <?php 
                    $dt=mysqli_query($koneksi,"SELECT count(*) as total from tbl_tamu");
                    $dttamu=mysqli_fetch_assoc($dt); ?>
                       
                    <td colspan="7">Total Tamu Hari Ini <?php echo date('l, d-m-Y  H:i:s'); ?> = <?php echo $dttamu["total"]; ?> </td>
                           
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
</div>
