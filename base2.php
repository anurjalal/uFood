<?php require_once 'ti.php' ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] !='Administrator'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
	include_once "db.php";
	//require 'koneksi.php';
	error_reporting (E_ALL ^ E_NOTICE);
?>
<link rel="stylesheet" href="menu/css/style.css">
<html>
<head>
<title>Sistem Informasi Sinar Rodamas</title>	
</head>
<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top"><table width="1368" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<table width="1368" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		    <!--
			<tr>
				<td bgcolor="#444" align="center" valign="top"><a href="admin.php"><img src="images/honda-logo.png" width="120" height="95"><font color="white" size="5"><b>Sistem Informasi CV. Sinar Rodamas</font></a><a href="logout.php"><img style="margin-top:10px;margin-right:50px" align="right" src="images/logout.png" width="70" height="75"></a></td>
			</tr>
			
			<tr>
			<td bgcolor="#444">&nbsp;</td>
			</tr>
			-->
			<tr>
				<td align="center" valign="top">
				<table width="1368" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <td height="500" align="center" valign="top"> 
	<div class="nav">
      <ul>
	    <li class="dashboard"><a href="admin.php">Dashboard</a></li>
        <li class="finance"><a href="">Finance</a>
          <ul>
            <li><a href="masteringpembelian.php">Pembelian Motor</a></li>
            <li><a href="masteringpembelianaksesoris.php">Pembelian Aksesoris</a></li>
			<li><a href="masteringkwitansipiutang.php">Penerimaan Piutang Awal</a></li>
			<li><a href="kwitansicustomerlist.php">Penerimaan Piutang Tempo</a></li>
			<li><a href="kwitansiaksesorislist.php">Penerimaan Piutang Aksesoris</a></li>
			<li><a href="kwitansileasinglist.php">Penerimaan Piutang Leasing</a></li>
			<li><a href="masterkwitansipemasukan.php">Penerimaan Lain-Lain</a></li>
			<li><a href="masteringbkuhutang.php">Pembayaran Hutang Awal</a></li>
			<li><a href="masteringpengeluaranhutang.php">Pembayaran Hutang Dagang</a></li>
			<li><a href="masteringbkubbn.php">Pembayaran Hutang BBN</a></li>
			<li><a href="masteringreportbbn.php">Cetak Kuitansi BBN</a></li>
			<li><a href="masteringpengeluarankomisi.php">Pembayaran Hutang Komisi</a></li>
			<li><a href="masterbkupengeluaran.php">Pembayaran Lain-Lain</a></li>
          </ul>
		</li>
        <li class="warehouse"><a href="">Warehouse</a>
		  <ul>
            <li><a href="masteringshippinglist.php">Penerimaan Motor</a></li>
            <li><a href="masteringshippinglistaksesoris.php">Penerimaan Aksesoris</a></li>
            <li><a href="masteringstock.php">Stock Motor</a></li>
            <li><a href="masteringstockaksesoris.php">Stock Aksesoris</a></li>

          </ul>
		</li>
        <li class="sales"><a href="">Sales</a>
		<ul>
            <li><a href="masteringspes.php">Surat Pesanan</a></li>
            <li><a href="masteringpenjualan.php">Penjualan Motor</a></li>
            <li><a href="masteringpenjualanaksesoris.php">Penjualan Aksesoris</a></li>
		</ul>
		</li>
        <li class="stnkbpkb"><a href="">STNK/BPKB</a>
		<ul>
		<li><a href="monitoringstnk.php">Monitoring STNK</a></li>
		<li><a href="monitoringbpkb.php">Monitoring BPKB</a></li>
		</ul>
		</li>
        <li class="accounting"><a href="">Accounting</a>
	<ul>
		<li><a href="masteringgroupbiaya.php">Group Accounting</a></li>
		<li><a href="mastersubgroup.php">Sub Group Accounting</a></li>
		<li><a href="mastertransaksi.php">Jurnal Transaksi</a></li>
		<li><a href="add_penyesuaian.php">Jurnal Penyesuaian</a></li>
		<li><a href="mastertutupbuku.php">Tutup Buku</a></li>
		<li><a href="masterasetberwujud.php">Aset Berwujud</a></li>
		<li><a href="masterasettidakberwujud.php">Aset Tidak Berwujud</a></li>
		<li><a href="reschedule.php">Reschedule Hutang</a></li>
		<li><a href="masterpembayaranppn.php">Monitoring PPN</a></li>
		<li><a href="mastersaldoawalakutansi.php">Saldo Awal Accounting</a></li>
		<li><a href="mastersaldoawalpersediaan.php">Saldo Awal Persediaan</a></li>
		<li><a href="mastersaldoawalpiutang.php">Saldo Awal Piutang</a></li>
		<li><a href="mastersaldoawalhutang.php">Saldo Awal Hutang</a></li>		
	</ul>
		</li>
        <li class="mastering"><a href="">Mastering</a>
	<ul>
		<li><a href="masteringuser.php">User</a></li>
		<li><a href="mastertipe.php">Tipe</a></li>
		<li><a href="masteringwarna.php">Warna</a></li>
		<li><a href="masterhargabeli.php">Harga Beli Motor</a></li>
		<li><a href="masterhargajual.php">Harga Jual Motor</a></li>
		<li><a href="masterbbn.php">Bea Balik Nama</a></li>
		<li><a href="masteraksesoris.php">Aksesoris</a></li>
		<li><a href="mastermerchandise.php">Merchandise</a></li>
		<li><a href="mastersparepart.php">Spare Part</a></li>
		<li><a href="masterhargabeliaksesoris.php">Harga Beli Aksesoris</a></li>
		<li><a href="masterhargajualaksesoris.php">Harga Jual Aksesoris</a></li>
		<li><a href="masteringnamasalesprogram.php">Nama Sales Program</a></li>
		<li><a href="mastersalesprogram.php">Sales Program</a></li>
		<li><a href="masteringsupplier.php">Supplier</a></li>
		<li><a href="masteringsalesman.php">Staff</a></li>
		<li><a href="masteringbroker.php">Broker</a></li>
		<li><a href="masteringkustomer.php">Customer</a></li>
		<li><a href="masteringleasing.php">Leasing</a></li>
		<li><a href="masteringbirojasa.php">Biro Jasa</a></li>
		<li><a href="masteringkelurahan.php">Wilayah</a></li>
		<li><a href="masterdaerah.php">Daerah</a></li>
		<li><a href="masteringstnk.php">STNK</a></li>
	</ul>
		</li>
        <li class="report"><a href="">Report</a>
	<ul>
		<li><a href="lappembelian.php">Pembelian</a></li>
		<li><a href="lappenjualan.php">Penjualan</a></li>
		<li><a href="lapkas.php">Kas/Bank</a></li>
		<li><a href="lapstok.php">Stock</a></li>
		<li><a href="lappiutangtempo.php">Piutang Tempo</a></li>
	    <li><a href="lappiutangkredit.php">Piutang Leasing</a></li>
	    <li><a href="lappiutangmutasi.php">Mutasi Piutang Leasing</a></li>
		<li><a href="laphutangdealer.php">Hutang Dagang</a></li>
	    <li><a href="laphutangmutasi.php">Mutasi Hutang Dagang</a></li>
		<li><a href="laphutangbbn.php">Hutang BBN</a></li>
		<li><a href="laphutangkomisi.php">Hutang Komisi</a></li>
		<li><a href="laplabarugi.php">Laba-Rugi</a></li>
		<li><a href="lapneraca.php">Neraca</a></li>
	</ul>
		</li>
	    <li class="dashboard"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
<?php startblock('konten') ?>
<?php endblock() ?>
</td>
</tr>
</table>
</td>
</tr>
	<tr>
		<td align="center"><span class="style2"><p>&copy; Sinar Rodamas
		<script language="JavaScript" type="text/javascript">
		now = new Date
		theYear=now.getYear()
		if (theYear < 1900)
		theYear=theYear+1900
		document.write(theYear)
		</script></span></td>
	</tr>
</table>
</td>
</tr>
</td>
</tr>
</table>
</body>
</html>
<?php
}
?>