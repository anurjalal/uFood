<html>

<title> Laporan Hutang </title>

<head>
<font face="courier" size=3><b>LAPORAN HUTANG BBN</b></font>

<?php
include ('publicfunction.php');


echo "<br>";
echo "<br>";

?>

</head>

<body>
<?php
include ('connectdb.php');
include 'db.php'; 

echo "<table border=1 style='border-collapse: collapse;' width=100%>";
echo "<tr style='background-color:#ccccff; -webkit-print-color-adjust:exact'>
        <th><font face=\"courier\" size=3>NO. PENJUALAN</th>
        <th><font face=\"courier\" size=3>TGL. PENJUALAN</th>
        <th><font face=\"courier\" size=3>NAMA CUSTOMER</th>
        <th><font face=\"courier\" size=3>HUTANG BBN</th>

      </tr>";

//$myquery1="SELECT * FROM trjual WHERE tgl_nota = '$today'";
$myquery1="SELECT * from hutang where status='BELUM' and bbn=1";
$myresult1=mysql_query($myquery1);

$myrows=mysql_num_rows($myresult1);
$myquery2="SELECT sum(kredit)-sum(debit) as hutang from hutang where bbn=1";
$myresult2=mysql_query($myquery2);

$total=mysql_fetch_array($myresult2);
for ($i=0;$i<$myrows;$i++){
      $data=mysql_fetch_array($myresult1);
      $balance=$db->queryUniqueValue("select sum(kredit) - sum(debit) from hutang where no_penjualan='".$data['NO_PENJUALAN']."' and bbn=1");
      echo "<tr>";
      echo "<td width=15%><font face=\"Courier\" size=2><b>".$data['NO_PENJUALAN']."</font></td>";
	  echo "<td width=20%><font face=\"Courier\" size=2><b>".date('Y-m-d', strtotime(str_replace('-','/', $data['TGL_PENJUALAN'])))."</font></td>";
      echo "<td width=20%><font face=\"Courier\" size=2><b>".$data['NM_CUST']."</font></td>";
      echo "<td align='right' width=20%><font face=\"Courier\" size=2><b>".number_format($balance,0,',','.')."</font></td>";


      echo "</tr>";
      
}

;
echo "</table>";
echo "<font face=\"Courier\" size=4><b><p align='right'>TOTAL HUTANG BBN ".number_format(abs($total['hutang']),0,',','.')."</font></b></p></td>";?>            

</body>

</html>
