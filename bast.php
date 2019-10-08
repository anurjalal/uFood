<html>
<?php
	include_once "db.php";
	error_reporting (E_ALL ^ E_NOTICE);
?>
<?php
function indonesian_date ($timestamp = '', $date_format = 'l, j F Y') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date}";
    return $date;
} 
?>
<head>
<title>Berita Acara Serah Terima</title>
</head>

<body style="text-align: center; font-weight: bold;">
<p>BERITA ACARA SERAH TERIMA</p>

				  <?php
				  if(isset($_GET['id']))
				  {
				  $id=$_GET['id'];
				  $username = $_SESSION['LOGIN_NAME'];
				  $nm_user = $db->queryUniqueValue("select nm_user from userlog WHERE login_name='$username'");
				  $idgroup = $db->queryUniqueValue("select idgroup from userlog WHERE login_name='$username'");
				  $line = $db->queryUniqueObject("SELECT * FROM trjual WHERE no_rangka='$id'");
                  $line2 = $db->queryUniqueObject("SELECT * FROM mstsales WHERE kd_sales='$line->KD_SALES'");
                  $line3 = $db->queryUniqueObject("SELECT * FROM mstcust WHERE kd_cust='$line->KD_CUST'");
				  $line4 = $db->queryUniqueObject("SELECT * FROM mstwarna WHERE kd_warna='$line->KD_WARNA'");
				  }
				  ?>
				  
<p style="text-align: left; font-weight: normal;">Yang bertanda tangan dibawah ini:</p>
<table>
        <tr>
        <td style="padding-left:30px" align="right">I.</td>
        <td>Nama</td>
        <td>:</td>
		<td><?php echo $nm_user;?></td>
        </tr>
        <tr>
        <td></td>
        <td>Jabatan</td>
        <td>:</td>
		<td><?php echo $idgroup;?></td>
        </tr>
		<tr>
		<td></td>
		<td colspan="100%">selanjutnya disebut sebagai PIHAK PERTAMA</td>
		</tr>
		<tr>
        <td align="right">II.</td>
        <td>Nama</td>
        <td>:</td>
		<td><?php echo $line3->NM_CUST;?></td>
        </tr>
        <tr>
        <td></td>
        <td>Alamat</td>
        <td>:</td>
		<td><?php echo $line3->ALMT_CUST;?></td>
        </tr>
		<tr>
        <td></td>
        <td></td>
        <td></td>
		<td><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KELURAHAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
        </tr>
		<tr>
        <td></td>
        <td>No. DO</td>
        <td>:</td>
		<td><?php echo $line->NO_FAKTUR;?></td>
        </tr>
		<tr>
		<td></td>
		<td colspan="100%">selanjutnya disebut sebagai PIHAK KEDUA</td>
		</tr>
		</table>
<p style="text-align: left; font-weight: normal;">PIHAK PERTAMA sebagai penjual telah menyerahkan kepada PIHAK KEDUA sebagai pembeli pada hari <?php echo indonesian_date();?> atas SATU unit kendaraan : </p>
<table>
        <tr>
        <td style="padding-left:30px" align="left">Merk/Type/Warna/Tahun</td>
        <td></td>
		<td>:</td>
        <td></td>
		<td>HONDA / <?php echo $line->KD_TIPE;?> / <?php echo $line4->NM_WARNA;?> / <?php echo $line->TAHUN;?></td>
        </tr>
		<tr>
        <td style="padding-left:30px" align="left">No.mesin/No.rangka</td>
        <td></td>
		<td>:</td>
        <td></td>
		<td><?php echo $line->NO_MESIN;?> / <?php echo $line->NO_RANGKA;?></td>
        </tr>
</table>
<p style="text-align: left; font-weight: normal;">Dan oleh PIHAK KEDUA kendaraan tersebut telah diperiksa dengan seksama dan selanjutnya diterima dalam keadaan 100% baru, lengkap dengan aksesorisya serta BUKU PEDOMAN PEMILIK dan kendaraan tersebut sesuai dengan yang telah disepakati bersama oleh kedua belah pihak. Dan selanjutnya PIHAK KEDUA menyatakan telah menerima kendaraan tersebut diatas. Setelah dibaca dan disetujui, Berita Penyerahan kendaraan ini ditandatangani bersama. Kendaraan yang diterima dalam keadaan BARU TANPA CACAT, lengkap dengan aksesoris : Helm, Tool set dan Jaket. </p>
<table>
<tr>
<td>ORDER STNK/BPKB:</td>
</tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><?php echo $line3->NM_CUST;?></td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><?php echo $line3->ALMT_CUST;?></td>
</tr>
<tr>
<td>No. DO</td>
<td>:</td>
<td><?php echo $line->NO_FAKTUR;?></td>
</tr>
</table>
<table>
<tr>
<td>NB: Harap dibawa ketika mengambil STNK/BPKB</td>
</tr>
</table>
<br/>
<br/>
<table align="center" width="100%">
  <tr>
    <td align="center">Yang menerima,</td>
    <td align="center">&nbsp;</td>
    <td align="center">Yang menyerahkan,</td>
  </tr>
  <tr>
    <td align="center">PIHAK KEDUA</td>
    <td align="center">EKSPEDISI</td>
    <td align="center">PIHAK PERTAMA</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">(<?php echo $line3->NM_CUST;?>)</td>
    <td align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td align="center">(<?php echo $nm_user;?>)</td>
  </tr>
</table>
<!--
<br/>
<br/>
<br/>
<br/>

<?php
$charalamat = strlen($line3->ALMT_CUST);
if ($charalamat>22)
{
	$layouttable1 = "0.8cm";
	$layouttable2 = "0.6cm";
	$layouttable3 = "0.3cm";
	$layouttable4 = "0.5cm";
}
else
{
	$layouttable1 = "1cm";
	$layouttable2 = "0.8cm";
	$layouttable3 = "0.5cm";
	$layouttable4 = "0.7cm";	
}
?>
<table <?php echo 'style="padding-bottom:'.$layouttable1.';width:152mm;heigth:76mm;"'?>>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo substr($line3->ALMT_CUST,0,23);?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo substr($line3->ALMT_CUST,0,23);?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
  </tr>
</table>
<table <?php echo 'style="padding-bottom:'.$layouttable2.';width:152mm;heigth:76mm;"'?>>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
  </tr>
</table>
<table <?php echo 'style="padding-bottom:'.$layouttable3.';width:152mm;heigth:76mm;"'?>>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
  </tr>
</table>
<table <?php echo 'style="padding-bottom:'.$layouttable4.';width:152mm;heigth:76mm;"'?>>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
  </tr>
</table>
<table style="width:152mm;heigth:76mm">
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->NM_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->ALMT_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line3->KECAMATAN;?>&nbsp;<?php echo $line3->KOTA_CUST;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->KD_TIPE;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_RANGKA;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo $line->NO_MESIN;?></td>
  </tr>
  <tr>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="22%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td width="25%" style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
    <td style="padding-bottom:0px"><font size="0.15mm"><?php echo date('d-m-Y',strtotime($line->TGL_NOTA));?></td>
  </tr>
</table>
-->
</body>
				  <?php
				  if(isset($_GET['id']))
				  {
				  $id=$_GET['id'];
				  $line = $db->queryUniqueObject("SELECT * FROM motor WHERE no_rangka='$id'");
				  $kdastra = $line->KD_ASTRA;
				  $norangka = $line->NO_RANGKA;
				  $nomesin = $line->NO_MESIN;
				  $kdtipe = $line->KD_TIPE;
				  $nmtipe = $line->NM_TIPE;
				  $kdwarna = $line->KD_WARNA;
				  $tahun = $line->TAHUN;
				  $cc = $line->CC;
				  $aksesoris1 = $line->AKSESORIS1;
				  $aksesoris2 = $line->AKSESORIS2;
				  $aksesoris3 = $line->AKSESORIS3;
				  $aksesoris4 = $line->AKSESORIS4;
				  $aksesoris5 = $line->AKSESORIS5;
				  $aksesoris6 = $line->AKSESORIS6;
				  $aksesoris7 = $line->AKSESORIS7;
				  $aksesoris8 = $line->AKSESORIS8;
				  $aksesoris7name = $line->AKSESORIS7_NAME;
				  $aksesoris8name = $line->AKSESORIS8_NAME;
				  $no_fa = $line->NO_FA;
				  $tgl_fa = $line->TGL_FA;
				  $no_dpg = $line->NO_DPG;
				  $no_shipping = $line->NO_SHIPPING;
				  $tgl_shipping = $line->TGL_SHIPPING;
				  $no_penjualan = $line->NO_PENJUALAN;
				  $tgl_penjualan = $line->TGL_PENJUALAN;
				  $no_faktur_penjualan = $line->NO_FA_PENJUALAN;

				  $status = 'TERJUAL';
				  $deletemotor = $db->query("delete from motor where no_rangka='$norangka' and no_mesin = '$nomesin'");
				  $count1 = $db->queryUniqueValue("select count(*) from motortrjual where no_rangka='$norangka' and no_mesin = '$nomesin'");
				  if($count1==0)
				  {
				  $insertmotortrjual = $db->query("insert into motortrjual(kd_astra,no_rangka,no_mesin,kd_tipe,nm_tipe,kd_warna,tahun,cc,jumlah,status,aksesoris1,aksesoris2,aksesoris3,aksesoris4,aksesoris5,aksesoris6,aksesoris7,aksesoris8,aksesoris7_name,aksesoris8_name,no_fa,tgl_fa,no_dpg,no_shipping,tgl_shipping,no_penjualan,tgl_penjualan,no_faktur_penjualan) VALUES('$kdastra','$norangka','$nomesin','$kdtipe','$nmtipe','$kdwarna','$tahun','$cc',1,'$status','$aksesoris1','$aksesoris2','$aksesoris3','$aksesoris4','$aksesoris5','$aksesoris6','$aksesoris7','$aksesoris8','$aksesoris7name','$aksesoris8name','$no_fa','$tgl_fa','$no_dpg','$no_shipping','$tgl_shipping','$no_penjualan','$tgl_penjualan','$no_faktur_penjualan')");
				  }
				  }
				  ?>
</html>