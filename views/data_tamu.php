<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Tamu</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT tbl_tamu.*, tbl_kegiatan.nama as nama_kegiatan from tbl_tamu left join tbl_kegiatan on tbl_tamu.id_paket=tbl_kegiatan.id_kegiatan where tbl_tamu.id_tamu='$_GET[id]'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">ID Pelanggan</td> <td><?= $data['id_pelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td> <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td> <td><?= $data['alamat'] ?></td>
                        </tr>
						<tr>
                            <td>No Hp</td> <td><?= $data['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td> <td><?= $data['status'] ?></td>
                        </tr>
						<tr>
                            <td>Kegiatan</td> <td><?= $data['kegiatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td> <td><?php $data['tanggal'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=v&actions=pelanggan" class="btn btn-success btn-sm">
                        Kembali ke Data Pelanggan </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

