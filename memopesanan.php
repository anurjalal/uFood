<?php
session_start();
if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] =='Administrator'){
include 'base.php'; }
else if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] =='Sales'){
include 'basesales.php';}
else if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] =='Kasir'){
include 'basekasir.php';}
else if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] =='Finance'){
include 'basefinance.php';}
else if(!isset($_SESSION['LOGIN_NAME']) || $_SESSION['ID_GROUP'] =='Warehouse'){
include 'basewarehouse.php';}
?>
<?php startblock('konten')?>
<?php 
	if(isset($_POST['no_penjualan']))
		{
			$username = $_SESSION['LOGIN_NAME'];
			$nama_customer=mysql_real_escape_string($_POST['nama_customer']);
			$jumlah_customer = $db->queryUniqueValue("select count(id_customer) from customer where nama_customer='$nama_customer'");
			if ($jumlah_customer==0)
			{
			$db->query("insert into customer (nama_customer) values('$nama_customer')");
			}
			$id_customer = $db->queryUniqueValue("select id_customer from customer where nama_customer='$nama_customer'");
			$no_penjualan=mysql_real_escape_string($_POST['no_penjualan']);
			$no_penjualan_asli=mysql_real_escape_string($_POST['no_penjualan_asli']);
			$tgl_penjualan=mysql_real_escape_string($_POST['tgl_penjualan']);
			$tgl_penjualan=strtotime($tgl_penjualan);
			$tgl_penjualan=date('Y-m-d H:i:s', $tgl_penjualan);
			$tipe=mysql_real_escape_string($_POST['tipe']);
			$jumlah=mysql_real_escape_string($_POST['jumlah']);
			$tgl_kirim=mysql_real_escape_string($_POST['tgl_kirim']);
			$tgl_kirim=strtotime($tgl_kirim);
			$tgl_kirim=date('Y-m-d H:i:s', $tgl_kirim);
			$keterangan=mysql_real_escape_string($_POST['keterangan']);
			$db->query("delete from penjualan where no_penjualan='$no_penjualan_asli'");			
			$db->execute("INSERT INTO penjualan(no_penjualan,tgl_penjualan,id_customer,nama_customer,tipe,jumlah,tgl_kirim,keterangan,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan',$id_customer,'$nama_customer','$tipe','$jumlah','$tgl_kirim','$keterangan','$username',NOW())");
			echo "<div style='background-color:yellow;'><br><font color=green size=+1 >Pesanan dengan No. Pesanan [ $no_penjualan ] Berhasil Ditambahkan</font></div> ";
			echo "<script>window.location.assign('masteringpesanan.php');</script>";
			//}
		}
?>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<form name="penjualan" method="post" action="">
	<p align="center"><font size="3"><strong>Memo Pesanan</strong></font></p>
	<?php
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$line = $db->queryUniqueObject("SELECT * FROM penjualan WHERE no_penjualan='$id'");
	}
	?>
		<p align="center">
			<table>
			        <tr>
			        <td><div align="left"><strong>Nama Customer</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="nama_customer" class="nama_customer"  name="nama_customer" value="<?php echo $line->nama_customer; ?>" onfocus="setCustomer(this)" required></td>
			        <td><div align="left" style="margin-left: 20px"><strong>No. Penjualan</strong></div></td>
			        <td><input readonly style="height: 30px;margin-bottom: 0px" name="no_penjualan" type="text" id="no_penjualan" value="<?php echo $line->no_penjualan; ?>"></td>
			        <input name="no_penjualan_asli" type="hidden" id="no_penjualan_asli" value="<?php echo $line->no_penjualan; ?>">			        
					<td><div align="left" style="margin-left: 20px"><strong>Tanggal Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo date('d-m-Y', strtotime($line->tgl_penjualan)); ?>"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>Jenis Makanan</strong></div></td>
			        <td>
			        <select style="height: 30px;margin-bottom: 0px;text-align:right" onchange="setHargaMakanan(this)" name="tipe" id="tipe" class="tipe" required>
			        <option value="">Tidak ada</option>
			        <option value="Snack" <?php if ($line->tipe=='Snack') {echo "selected";}?>>Snack</option>
			        <option value="Makanan" <?php if ($line->tipe=='Makanan') {echo "selected";}?>>Makanan</option>
			        <option value="Prasmanan" <?php if ($line->tipe=='Prasmanan') {echo "selected";}?>>Prasmanan</option>
			        </td>
					<td><div align="left" style="margin-left: 20px"><strong>Qty/Jumlah</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="jumlah" class="jumlah" name="jumlah" type="text" value="<?php echo $line->jumlah; ?>" onkeyup="setHarga()"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Kirim</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_kirim" class="tgl_kirim" name="tgl_kirim" type="text" value="<?php echo date('d-m-Y', strtotime($line->tgl_kirim)); ?>"></td>
			        </tr>
					<tr>
					<td><div align="left"><strong>Keterangan</strong></div></td>
					<td>
					<textarea id="txtArea" rows="5" name="keterangan"><?php echo $line->keterangan?></textarea>
					</td>
					</tr>
			        </table>
			        <br/>
			        <table>
			        <tr>
			          <td><input type="button" style="height:50px;width:100px" name="Back" value="Back" onclick='window.location.assign("masteringpesanan.php");'></td>
			          <td><input type="button" style="height:50px;width:100px" name="Reset" value="Reset" onclick='window.location.reload(true);'></td>
			          <td><input type="submit" style="height:50px;width:100px" name="Submit" value="Save" ></td>
			        </tr>
			      </table>
			    </form>
			  </td>
			</tr>
			</table>
		</p>
<?php endblock() ?>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.min.js"></script>
<script>
function setCustomer(value)
		{
		//var counter = value.id.match(/\d+/);
		$('#nama_customer').autocomplete("check_customer.php", {
	        selectFirst: true});
		}
</script>
<link rel="stylesheet" type="text/css" media="all" href="pikaday.css" />
<script type="application/javascript" src="moment.js"></script>
<script src="pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('tgl_penjualan'),
		format : "DD-MM-YYYY",
    });
	var picker = new Pikaday({
		field: document.getElementById('tgl_kirim'),
		format : "DD-MM-YYYY",
	});
</script>
