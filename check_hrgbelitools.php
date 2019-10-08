<?php
include "dbkoneksi2.php";

$line = $db->queryUniqueObject("SELECT hrg_beli from hrgbeli where nama_barang='".$_POST['nama_barang']."' and tgl_akhir>=now() and tgl_awal<=now() order by tgl_awal desc");
if ($line)
{
$hrg_beli=$line->hrg_beli;
}

if($line!=NULL)
{

$arr = array ("hrg_beli"=>"$hrg_beli");
echo json_encode($arr);

}
else
{
$arr1 = array ("hrg_beli"=>"0");
echo json_encode($arr1);

}
?>
