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
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function setHargaMakanan() {
		{
		var tipe = document.getElementById("tipe").value;
		var nama_supplier = document.getElementById("nama_supplier").value;
		$.post('check_hrgbeli_memo.php', {tipe: tipe.toUpperCase(), nama_supplier: nama_supplier.toUpperCase()},
			function(data){
				$("#hargabeli").val(data.hargabeli.toUpperCase());
				setHarga();
			}, 'json');
		setHarga();
		}
	}
	function setHarga()
			{
			var jumlah = document.getElementById("jumlah").value;
			var hargabeli = document.getElementById("hargabeli").value;
			var total = Number(hargabeli) * Number(jumlah);
			$("#hargabelitotal").val(Number(total));
			}
</script>
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
			$no_po=mysql_real_escape_string($_POST['no_po']);
			$no_po_asli=mysql_real_escape_string($_POST['no_po_asli']);
			$tgl_po=mysql_real_escape_string($_POST['tgl_po']);
			$tgl_po=strtotime($tgl_po);
			$tgl_po=date('Y-m-d H:i:s', $tgl_po);
			$tgl_jatuh_tempo=mysql_real_escape_string($_POST['tgl_jatuh_tempo']);
			$tgl_jatuh_tempo=strtotime($tgl_jatuh_tempo);
			$tgl_jatuh_tempo=date('Y-m-d H:i:s', $tgl_jatuh_tempo);			
			$nama_supplier=mysql_real_escape_string($_POST['nama_supplier']);
			$id_supplier = $db->queryUniqueValue("select id_supplier from supplier where nama_supplier='$nama_supplier'");
			$hargabeli=mysql_real_escape_string($_POST['hargabeli']);
			$hargabelitotal=mysql_real_escape_string($_POST['hargabelitotal']);
			$no_invoice=mysql_real_escape_string($_POST['no_invoice']);
			$tgl_invoice=mysql_real_escape_string($_POST['tgl_invoice']);
			$tgl_invoice=strtotime($tgl_invoice);
			$tgl_invoice=date('Y-m-d H:i:s', $tgl_invoice);			
			$db->query("delete from penjualan where no_penjualan='$no_penjualan_asli'");
            $db->query("delete from piutang where no_penjualan='$no_penjualan_asli'");
			$db->query("delete from pembelian where no_po='$no_po_asli'");
			$db->query("delete from hutang where no_po='$no_po_asli'");
            $db->query("delete from kas where no_po='$no_penjualan_asli'");		
			$db->execute("INSERT INTO pembelian(no_po,no_penjualan,tgl_po,tgl_jatuh_tempo,id_supplier,nama_supplier,hargabeli,hargabelitotal,no_invoice,tgl_invoice,username,tgl_transaksi) values ('$no_po','$no_penjualan','$tgl_po','$tgl_jatuh_tempo','$id_supplier','$nama_supplier',$hargabeli,$hargabelitotal,'$no_invoice','$tgl_invoice','$username',NOW())");			
            $db->execute("INSERT INTO penjualan(no_penjualan,tgl_penjualan,id_customer,nama_customer,tipe,jumlah,tgl_kirim,no_po,keterangan,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan',$id_customer,'$nama_customer','$tipe','$jumlah','$tgl_kirim','$no_po','$keterangan','$username',NOW())" );
            $db->execute("INSERT INTO hutang(no_po,tgl_po,id_supplier,nama_supplier,tgl_jatuh_tempo,jml_hutang,kredit,username,tgl_transaksi) values ('$no_po','$tgl_po','$id_supplier','$nama_supplier','$tgl_jatuh_tempo',$hargabelitotal,$hargabelitotal,'$username',NOW())");					
            echo "<div style='background-color:yellow;'><br><font color=green size=+1 >Pesanan dengan No. Pesanan [ $no_penjualan ] Berhasil Ditambahkan</font></div> ";
			echo "<script>window.location.assign('masteringpesanan.php');</script>";
			//}
		}
?>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<form name="penjualan" method="post" action="">
	<p align="center"><font size="3"><strong>Memo Pembelian</strong></font></p>
	<?php
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$line = $db->queryUniqueObject("SELECT * FROM penjualan WHERE no_penjualan='$id'");
	$line2 = $db->queryUniqueObject("SELECT * FROM pembelian WHERE no_penjualan='$id'");
	}
	?>
		<p align="center">
			<table>
			        <tr>
			        <td><div align="left"><strong>Nama Customer</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="nama_customer" class="nama_customer"  name="nama_customer" value="<?php echo $line->nama_customer; ?>" onfocus="setCustomer(this)" ></td>
			        <td><div align="left" style="margin-left: 20px"><strong>No. Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" name="no_penjualan" type="text" id="no_penjualan" value="<?php echo $line->no_penjualan; ?>" readonly></td>
					<input name="no_penjualan_asli" type="hidden" id="no_penjualan_asli" value="<?php echo $line->no_penjualan; ?>">				
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo date('d-m-Y',strtotime($line->tgl_penjualan)); ?>" readonly></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>Jenis Makanan</strong></div></td>
			        <td>
			        <select style="height: 30px;margin-bottom: 0px;text-align:right" onchange="setHargaMakanan()" name="tipe" id="tipe" class="tipe" required>
			        <option value="">Tidak ada</option>
			        <option value="Snack" <?php if ($line->tipe=='Snack') {echo "selected";}?>>Snack</option>
			        <option value="Makanan" <?php if ($line->tipe=='Makanan') {echo "selected";}?>>Makanan</option>
			        <option value="Prasmanan" <?php if ($line2->tipe=='Prasmanan') {echo "selected";}?>>Prasmanan</option>
                    </select> </td> 
					<td><div align="left" style="margin-left: 20px"><strong>Qty/Jumlah</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="jumlah" class="jumlah" name="jumlah" type="text" value="<?php echo $line->jumlah; ?>" onkeyup="setHarga()" ></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Kirim</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_kirim" class="tgl_kirim" name="tgl_kirim" type="text" value="<?php echo date('d-m-Y',strtotime($line->tgl_kirim)); ?>" readonly></td>
			        </tr>
					<tr>
					<td><div align="left"><strong>Keterangan</strong></div></td>
					<td>
					<textarea id="txtArea" rows="5" name="keterangan"><?php echo $line->keterangan?></textarea>
					</td>
					</tr>
			        <tr>
			        <td><div align="left"><strong>No. Pembelian</strong></div></td>
			        <td><input readonly style="height: 30px;margin-bottom: 0px" type="text" id="no_po" name="no_po" value="<?php echo $line2->no_po; ?>"></td>
			        <input type="hidden" id="no_po_asli" name="no_po_asli" value="<?php echo $line2->no_po; ?>">
					<td><div align="left" style="margin-left: 20px"><strong>Tanggal Pembelian</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_po" class="tgl_po" name="tgl_po" type="text" value="<?php echo date('d-m-Y',strtotime($line2->tgl_po)); ?>"></td>					
					<td><div align="left" style="margin-left: 20px"><strong>Tanggal Jatuh Tempo</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_jatuh_tempo" class="tgl_jatuh_tempo" name="tgl_jatuh_tempo" type="text" value="<?php echo date('d-m-Y',strtotime($line2->tgl_jatuh_tempo)); ?>"></td>	
					</tr>			
			        <tr>
			        <td><div align="left"><strong>Nama Supplier</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="nama_supplier" name="nama_supplier" value="<?php echo $line2->nama_supplier; ?>" onfocus="setSupplier(this)" onchange="setHargaMakanan()"></td>					
			        <td><div align="left" style="margin-left: 20px"><strong>Harga Beli</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargabeli" name="hargabeli" value="<?php echo $line2->hargabeli; ?>" onchange="setHarga()"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Harga Beli Total</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargabelitotal" name="hargabelitotal" value="<?php echo $line2->hargabelitotal; ?>"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>No. Invoice</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="no_invoice" name="no_invoice" value="<?php echo $line2->no_invoice; ?>"></td>					
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Invoice</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_invoice" name="tgl_invoice" value="<?php echo date('d-m-Y',strtotime($line2->tgl_invoice)); ?>"></td>
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
function setSupplier(value)
		{
		//var counter = value.id.match(/\d+/);
		$('#nama_supplier').autocomplete("check_supplier.php", {
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
	var picker = new Pikaday({
		field: document.getElementById('tgl_po'),
		format : "DD-MM-YYYY",
	});	
	var picker = new Pikaday({
		field: document.getElementById('tgl_jatuh_tempo'),
		format : "DD-MM-YYYY",
	});
	var picker = new Pikaday({
		field: document.getElementById('tgl_invoice'),
		format : "DD-MM-YYYY",
	});	
</script>