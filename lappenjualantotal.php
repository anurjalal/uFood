<html>

<title> Laporan Penjualan </title>

<head>
<font face="courier" size=3><b>LAPORAN PENJUALAN</b></font>
<br> <br>
<?php

include ('publicfunction.php');


echo "<table border=1 style='border-collapse:collapse' width=100%>";
	  echo "<tr style='background-color:#00ffff;-webkit-print-color-adjust:exact'><th width=12.5%><font face=\"courier\" size=2> NO </font></th><th width=12.5%><font face=\"courier\" size=2> NO INVOICE </font></th><th width=12.5%><font face=\"courier\" size=2> NAMA PEMESAN </font></th><th width=12.5%><font face=\"courier\" size=2> JUMLAH SNACK </font></th><th width=12.5%><font face=\"courier\" size=2> JUMLAH MAKAN </font></th><th width=12.5%><font face=\"courier\" size=2> JUMLAH PRASMANAN </font></th><th width=12.5%><font face=\"courier\" size=2> TANGGAL KIRIM </font></th><th width=12.5%><font face=\"courier\" size=2> HARGA BELI </font></th><th width=12.5%><font face=\"courier\" size=2> HARGA KARDUS </font></th><th width=12.5%><font face=\"courier\" size=2> HARGA TOTAL </font></th><th width=12.5%><font face=\"courier\" size=2> HARGA JUAL </font></th><th width=12.5%><font face=\"courier\" size=2> TOTAL HARGA JUAL SNACK </font></th><th width=12.5%><font face=\"courier\" size=2> TOTAL HARGA JUAL MAKAN </font></th><th width=12.5%><font face=\"courier\" size=2> TOTAL HARGA JUAL PRASMANAN </font></th><th width=12.5%><font face=\"courier\" size=2> MARGIN @ </font></th><th width=12.5%><font face=\"courier\" size=2> QTY SNACK </font></th><th width=12.5%><font face=\"courier\" size=2> QTY MAKAN </font></th><th width=12.5%><font face=\"courier\" size=2> QTY PRASMANAN </font></th><th width=12.5%><font face=\"courier\" size=2> MARGIN TOTAL </font></th><th width=12.5%><font face=\"courier\" size=2> MARGIN MASING-MASING SNACK </font></th><th width=12.5%><font face=\"courier\" size=2> MARGIN MASING-MASING MAKAN </font></th><th width=12.5%><font face=\"courier\" size=2> MARGIN MASING-MASING PRASMANAN </font></th><th width=12.5%><font face=\"courier\" size=2> PEMBAYARAN </font></th><th width=12.5%><font face=\"courier\" size=2> TANGGAL DIBAYAR </font></th><th width=12.5%><font face=\"courier\" size=2> KETERANGAN </font></th></tr>";


?>

</head>

<body>
<br>
<?php
include_once ('db.php');

include ('connectdb.php');

$myquery1="SELECT * FROM penjualan where penjualan.tgl_penjualan order by penjualan.nama_customer";
$myresult1=mysql_query($myquery1);
$datapurchase1=mysql_fetch_array($myresult1);
//$myquery2="SELECT sum(total_harga) as total_harga, sum(pembulatan) as pembulatan, sum(nominal_yg_dibayar) as nominal_yg_dibayar FROM pembelian_detail where pembelian_detail.tgl_po between '$tanggalawal' and '$tanggalakhir' order by pembelian_detail.nama_supplier";
//$myresult2=mysql_query($myquery2);
//$datapurchase2=mysql_fetch_array($myresult2);
$total=0;
$nofaktur = '';
echo "</font>";
$myrows1=mysql_num_rows($myresult1);
$myresult1=mysql_query($myquery1);
$j = 1;

for ($i=0;$i<$myrows1;$i++){
      $datapurchase1=mysql_fetch_array($myresult1);
      /*
	  echo "<tr>";
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<tr style='background-color:#ccccff;-webkit-print-color-adjust:exact' >
	  <th width=12.5%><font face=\"courier\" size=3> TGL TRANSAKSI </font></th>
      <th width=12.5%><font face=\"courier\" size=3> NO PO </font></th>
	  <th width=12.5%><font face=\"courier\" size=3> TGL PO </font></th>
	  <th width=12.5%><font face=\"courier\" size=3> SUPPLIER </font></th>	  
	  
	  <th width=12.5%><font face=\"courier\" size=3> SUBTOTAL </font></th>
	  <th width=12.5%><font face=\"courier\" size=3> DISKON </font></th>
	  <th width=12.5%><font face=\"courier\" size=3> HARGA TOTAL </font></th>
	        </tr>";
	  echo "<td width=12.5%><font face=\"Courier\" size=3>".date('d-m-Y',strtotime($datapurchase1['tgl_transaksi']))."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=3>".$datapurchase1['no_po']."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=3>".date('d-m-Y',strtotime($datapurchase1['tgl_po']))."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=3>".$datapurchase1['nama_supplier']."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }		  
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td align='right' width=12.5%><font face=\"Courier\" size=3>".number_format($dpp,0,',','.')."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td align='right' width=12.5%><font face=\"Courier\" size=3>".number_format($datapurchase1['diskon'],0,',','.')."</font></td>";
	  }
	  else
	  {
		  echo "";
	  }
	  if($nofaktur<>$datapurchase1['no_po'])
	  {
	  echo "<td align='right' width=12.5%><font face=\"Courier\" size=3>".number_format($datapurchase1['hargatotal'],0,',','.')."</font></td></tr><tr style='background-color:#00ffff;-webkit-print-color-adjust:exact'><th width=12.5%><font face=\"courier\" size=2> NO TIKET </font></th><th width=12.5%><font face=\"courier\" size=2> NO POLISI </font></th><th width=12.5%><font face=\"courier\" size=2> NAMA BARANG </font></th><th width=12.5%><font face=\"courier\" size=2> KUALITAS </font></th><th width=12.5%><font face=\"courier\" size=2> NAMA SUPIR </font></th><th width=12.5%><font face=\"courier\" size=2> BERAT NETTO </font></th><th width=12.5%><font face=\"courier\" size=2> JAM IN </font></th><th width=12.5%><font face=\"courier\" size=2> JAM OUT </font></th><th width=12.5%><font face=\"courier\" size=2> TGL IN </font></th><th width=12.5%><font face=\"courier\" size=2> TGL OUT </font></th><th width=12.5%><font face=\"courier\" size=2> HARGA PER TON </font></th><th width=12.5%><font face=\"courier\" size=2> TOTAL HARGA </font></th><th width=12.5%><font face=\"courier\" size=2> PEMBULATAN </font></th><th width=12.5%><font face=\"courier\" size=2> NO BAPB </font></th><th width=12.5%><font face=\"courier\" size=2> KETERANGAN </font></th></tr>";
	  }
	  else
	  {
		  echo "";
	  }
	*/
	  echo "<td width=12.5%><font face=\"Courier\" size=2>" . $j ."</font></td>";	

	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['no_invoice']."</font></td>";	
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['nama_customer']."</font></td>";
      if ($datapurchase1['tipe']=='Snack')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['jumlah']."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Makanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['jumlah']."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Prasmanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['jumlah']."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }	  
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".date('d-m-Y',strtotime($datapurchase1['tgl_kirim']))."</font></td>";
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargabeli'],0,',','.')."</font></td>";
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargakardus'],0,',','.')."</font></td>";	  
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargabelitotal'],0,',','.')."</font></td>";
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargajual'],0,',','.')."</font></td>";	  
      if ($datapurchase1['tipe']=='Snack')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargajualtotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Makanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargajualtotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Prasmanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['hargajualtotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['marginpersen'],0,',','.')."</font></td>";
      if ($datapurchase1['tipe']=='Snack')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['jumlah'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Makanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['jumlah'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Prasmanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['jumlah'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }	 
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['margintotal'],0,',','.')."</font></td>";
      if ($datapurchase1['tipe']=='Snack')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['margintotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Makanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['margintotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }
      if ($datapurchase1['tipe']=='Prasmanan')
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".number_format($datapurchase1['margintotal'],0,',','.')."</font></td>";
	  }
	  else
	  {
	  echo "<td width=12.5%><font face=\"Courier\" size=2></font></td>";		  
	  }		  
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['statusdibayar']."</font></td>";
      echo "<td width=12.5%><font face=\"Courier\" size=2>".date('d-m-Y',strtotime($datapurchase1['tgl_dibayar']))."</font></td>";
	  echo "<td width=12.5%><font face=\"Courier\" size=2>".$datapurchase1['keterangan']."</font></td>";	  	  		


      echo "</tr>";
	  $nofaktur=$datapurchase1['no_po'];
	  $j++;
}
echo "</table>";

?>

</body>

</html>
