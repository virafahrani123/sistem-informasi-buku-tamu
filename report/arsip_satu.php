<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Arsip</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM t_transaksi WHERE id_transaksi='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                       <h2>Sistem Informasi Pembayaran Paket Internet </h2>
                        <h4>Jalan Sisingamangaraja , Kisaran,  <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA ARSIP</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								
                                <tr>
                                    <td width="200">Id Pelanggan</td> <td><?= $data['id_pelanggan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nominal</td> <td><?= $data['nominal'] ?></td>
                                </tr>
								<tr>
                                    <td>Tanggal Bayar</td> <td><?= $data['tgl_bayar'] ?></td>
                                </tr>
								<tr>
                                    <td>Tanggal Validasi</td> <td><?= $data['tgl_validasi'] ?></td>
                                </tr>
								<tr>
                                    <td>Status</td> <td><?= $data['status'] ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Ahmad Amin Matondang,<strong></u><br>
                                        NIM.14221683
									</td>
								</tr>
							</tfoot> 
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>