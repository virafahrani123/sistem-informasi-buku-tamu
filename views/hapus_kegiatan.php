<?php
//membuat query untuk hapus data
$sql="DELETE FROM tbl_kegiatan WHERE id_kegiatan ='".$_GET['id']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=index&actions=admin');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=data&actions=kegiatan');</scripr>";
}
