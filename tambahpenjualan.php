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
<?php startblock('konten') ?>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function setHargaMakanan(val) {
		{
		var tipe = val.value;
		$.post('check_hrgbeli.php', {tipe: tipe.toUpperCase()},
			function(data){
				$("#hargabeli").val(data.hargabeli.toUpperCase());
				$("#hargajual").val(data.hargajual.toUpperCase());
			}, 'json');
		setHarga(source, valNum);
		}
	}
	function setHarga(source, valNum)
		{
            valNum = Number(valNum);
			var inputJumlah = document.getElementById("jumlah");
			var inputHargaBeliTanpakardus = document.getElementById("hargabeli");
			var inputHargaKardus = document.getElementById("hargakardus");
            var inputHargaJualSatuan = document.getElementById("hargajual");
			var inputMargin = document.getElementById("margin");
            var inputHargaBeliDenganKardus = document.getElementById("total");
            var inputPajak = document.getElementById("denganpajak");
            var inputHargaJualTotal = document.getElementById("hargajualtotal");
            var inputTotalMargin =  document.getElementById("margintotal");
            var inputHargaJualDenganPajak = document.getElementById("hargadenganpajak");
            
            
            
            if(source == "jumlah"){
                inputHargaBeliDenganKardus.value = Number(inputHargaBeliTanpakardus.value) + Number(inputHargaKardus.value);
                HargaJualSatuan = Number(inputHargaBeliDenganKardus.value)+Number(inputHargaBeliDenganKardus.value)*Number(inputHargaKardus.value)/100;   
                HargaJualTotal = Number(inputHargaJualSatuan.value)*Number(valNum);
                TotalMargin = (Number(inputHargaJualSatuan.value)-Number(inputHargaBeliDenganKardus.value))*Number(valNum);
                Margin = (((Number(inputHargaJualSatuan.value)-Number(inputHargaBeliDenganKardus.value)) / Number(Number(inputHargaBeliDenganKardus.value)))*100).toFixed(2);
                
                inputMargin.value = Margin;
                inputHargaJualTotal.value = HargaJualTotal;
                inputTotalMargin.value = TotalMargin;
                inputHargaJualDenganPajak.value = (Number(inputHargaJualTotal.value) + Number(inputHargaJualTotal.value)*Number(inputPajak.value)/100);
                
                
            }
            
            if(source=="hargakardus"){
                inputHargaBeliDenganKardus.value = Number(inputHargaBeliTanpakardus.value) + valNum;
                HargaJualSatuan = Number(inputHargaBeliDenganKardus.value)+Number(inputHargaBeliDenganKardus.value)*valNum/100;   
                HargaJualTotal = Number(inputHargaJualSatuan.value)*Number(inputJumlah.value);
                TotalMargin = (Number(inputHargaJualSatuan.value)-Number(inputHargaBeliDenganKardus.value))*Number(inputJumlah.value);
                Margin = (((Number(inputHargaJualSatuan.value)-Number(inputHargaBeliDenganKardus.value)) / Number(Number(inputHargaBeliDenganKardus.value)))*100).toFixed(2);
                if (inputHargaJualSatuan.value)
				{
				inputMargin.value = Margin;					
				inputTotalMargin.value = TotalMargin;
				inputHargaJualTotal.value = HargaJualTotal;
                inputHargaJualDenganPajak.value = (Number(inputHargaJualTotal.value) + Number(inputHargaJualTotal.value)*Number(inputPajak.value)/100);
				}
				else
				{
				inputHargaJualTotal.value = HargaJualTotal;
                inputHargaJualDenganPajak.value = (Number(inputHargaJualTotal.value) + Number(inputHargaJualTotal.value)*Number(inputPajak.value)/100);					
				}
                
            }
            
            if(source=="hargajual"){
                if (inputHargaKardus.value)
				{
                HargaJualTotal= valNum * Number(inputJumlah.value);
                inputHargaJualDenganPajak.value = (Number(HargaJualTotal) + Number(HargaJualTotal)*(Number(inputPajak.value)/Number(100)));
                inputHargaJualTotal.value= HargaJualTotal;
                margin = (((valNum-Number(inputHargaBeliDenganKardus.value))/Number(inputHargaBeliDenganKardus.value))*100).toFixed(2);
                if (margin>=0)
			    {
			        inputMargin.value = margin;
			    }
                else
				{
                    inputMargin.value = null;
				}
                
                TotalMargin = ((valNum-Number(inputHargaBeliDenganKardus.value))*Number(inputJumlah.value));
                
                if(TotalMargin>=0)
				{
                    inputTotalMargin.value = TotalMargin;
                }
				else
				{
                    inputTotalMargin.value = null;
                }
				}
                  
            }
           
            
            if(source == "margin"){
                
                a = inputHargaBeliDenganKardus.value;
                HargaJualSatuan = Number(a)+Number(inputHargaBeliDenganKardus.value)*valNum/100;
                HargaJualTotal = Number(HargaJualSatuan)*Number(inputJumlah.value);
                TotalMargin = (HargaJualSatuan - Number(inputHargaBeliDenganKardus.value))*Number(inputJumlah.value);
                inputHargaJualSatuan.value = HargaJualSatuan;
                inputHargaJualTotal.value = HargaJualTotal;
                inputTotalMargin.value = TotalMargin;
                inputHargaJualDenganPajak.value = (Number(inputHargaJualTotal.value) + (Number(inputHargaJualTotal.value)*(Number(inputPajak.value)/Number(100))));
                
                
            }
            
            if(source == "denganpajak"){
                
                inputHargaJualDenganPajak.value = Number(inputHargaJualTotal.value) + (Number(inputHargaJualTotal.value)*(valNum/Number(100)).toFixed(2));
                
            }
        }
            

function showhidefields(x) {
	{
	switch (x){
    case '': document.getElementById("pembayaran_label").style.display = "none";document.getElementById("pembayaran_isi").style.display = "none";document.getElementById("tgl_jatuh_tempo_label").style.display = "none";document.getElementById("tgl_jatuh_tempo_isi").style.display = "none";break;
    case 'CASH': document.getElementById("pembayaran_label").style.display = "";document.getElementById("pembayaran_isi").style.display = "";document.getElementById("tgl_jatuh_tempo_label").style.display = "none";document.getElementById("tgl_jatuh_tempo_isi").style.display = "none";break;
	case 'TEMPO':document.getElementById("pembayaran_label").style.display = "none";document.getElementById("pembayaran_isi").style.display = "none";document.getElementById("tgl_jatuh_tempo_label").style.display = "";document.getElementById("tgl_jatuh_tempo_isi").style.display = "";break;
	}
	}
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
			$db->query("insert into customer (nama_customer,username,tgl_transaksi) values('$nama_customer','$username',NOW())");
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
			$hargakardus=mysql_real_escape_string($_POST['hargakardus']);
			$total=mysql_real_escape_string($_POST['total']);
			$hargajual=mysql_real_escape_string($_POST['hargajual']);
			$hargajualtotal=mysql_real_escape_string($_POST['hargajualtotal']);
			$margin=mysql_real_escape_string($_POST['margin']);
			$margintotal=mysql_real_escape_string($_POST['margintotal']);
			$denganpajak=mysql_real_escape_string($_POST['denganpajak']);
			$hargadenganpajak=mysql_real_escape_string($_POST['hargadenganpajak']);
			$sistem_bayar=mysql_real_escape_string($_POST['sistem_bayar']);
			$metode_bayar=mysql_real_escape_string($_POST['metode_bayar']);			
			$no_invoice=mysql_real_escape_string($_POST['no_invoice']);
			$tgl_invoice=mysql_real_escape_string($_POST['tgl_invoice']);
			$tgl_invoice=strtotime($tgl_invoice);
			$tgl_invoice=date('Y-m-d H:i:s', $tgl_invoice);
			$no_invoice_penjualan=mysql_real_escape_string($_POST['no_invoice_penjualan']);
			$tgl_invoice_penjualan=mysql_real_escape_string($_POST['tgl_invoice_penjualan']);
			$tgl_invoice_penjualan=strtotime($tgl_invoice_penjualan);
			$tgl_invoice_penjualan=date('Y-m-d H:i:s', $tgl_invoice_penjualan);
			$tgl_jatuh_tempo_penjualan=mysql_real_escape_string($_POST['tgl_jatuh_tempo_penjualan']);
			$tgl_jatuh_tempo_penjualan=strtotime($tgl_jatuh_tempo_penjualan);
			$tgl_jatuh_tempo_penjualan=date('Y-m-d H:i:s', $tgl_jatuh_tempo_penjualan);
            $denganpajak = mysql_real_escape_string($_POST['denganpajak']);
            
            
			$kd_beban_kas = $db->queryUniqueValue("select kd_beban from groupbiaya where nm_beban='Kas'");
			$kd_beban_bank = $db->queryUniqueValue("select kd_beban from groupbiaya where nm_beban='Bank'");			
			$db->query("delete from penjualan where no_penjualan='$no_penjualan_asli'");
			$db->query("delete from pembelian where no_po='$no_po_asli'");
			$db->query("delete from hutang where no_po='$no_po_asli'");
			$db->execute("INSERT INTO pembelian(no_po,no_penjualan,tgl_po,tgl_jatuh_tempo,id_supplier,nama_supplier,hargabeli,hargabelitotal,no_invoice,tgl_invoice,username,tgl_transaksi) values ('$no_po','$no_penjualan','$tgl_po','$tgl_jatuh_tempo','$id_supplier','$nama_supplier',$hargabeli,$hargabelitotal,'$no_invoice','$tgl_invoice','$username',NOW())");			
			$db->execute("INSERT INTO hutang(no_po,tgl_po,id_supplier,nama_supplier,tgl_jatuh_tempo,jml_hutang,kredit,username,tgl_transaksi) values ('$no_po','$tgl_po','$id_supplier','$nama_supplier','$tgl_jatuh_tempo',$hargabelitotal,$hargabelitotal,'$username',NOW())");		
			if ($sistem_bayar=='CASH')
			{
			$db->execute("INSERT INTO penjualan(no_penjualan,tgl_penjualan,id_customer,nama_customer,tgl_kirim,tipe,jumlah,hargabeli,hargakardus,marginpersen,hargajual,hargajualtotal,pajak, hrgjualdgnpajak, hargabelitotal,margintotal,tgl_dibayar,tgl_jatuh_tempo,no_po,no_invoice,sistem_bayar,metode_bayar,tgl_invoice,keterangan,username,tgl_transaksi, statusdibayar) values ('$no_penjualan','$tgl_penjualan','$id_customer','$nama_customer','$tgl_kirim','$tipe','$jumlah','$hargabeli','$hargakardus','$margin','$hargajual','$hargajualtotal','$denganpajak','$hargadenganpajak','$total','$margintotal',NOW(),'$tgl_jatuh_tempo_penjualan','$no_po',$no_invoice,'$sistem_bayar','$metode_bayar','$tgl_invoice_penjualan','$keterangan','$username',NOW(), 'LUNAS')");
			$db->execute("INSERT INTO piutang(no_penjualan,tgl_penjualan,id_customer,nama_customer,jml_piutang,debit,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan','$id_customer','$nama_customer','$hargadenganpajak','$hargadenganpajak','$username',NOW())");
			$db->execute("INSERT INTO piutang(no_penjualan,tgl_penjualan,id_customer,nama_customer,jml_piutang,kredit,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan','$id_customer','$nama_customer','$hargadenganpajak','$hargadenganpajak','$username',NOW())");
			$db->execute("UPDATE piutang set status='LUNAS',username='$username',tgl_transaksi=NOW() where no_penjualan='$no_penjualan'");			
			if ($metode_bayar==1)
			{
			$keterangan = 'Penjualan ' . $tipe . ' sejumlah ' . $jumlah . ' dari kustomer ' . $nama_customer . ' dengan supplier ' . $nama_supplier;
            $db->query("insert into kas (no_po,no_penjualan,kd_beban,tgl_masuk,keterangan,debit,username,tgl_transaksi) values('$no_po','$no_penjualan','$kd_beban_kas',NOW(),'$keterangan','$hargadenganpajak','$username',NOW())");
			}
			elseif($metode_bayar==2)
			{ 
			$keterangan = 'Penjualan ' . $tipe . ' sejumlah ' . $jumlah . ' dari kustomer ' . $nama_customer . ' dengan supplier ' . $nama_supplier;
			$db->query("insert into kas (no_po,no_penjualan,kd_beban,tgl_masuk,keterangan,debit,username,tgl_transaksi) values('$no_po','$no_penjualan','$kd_beban_bank',NOW(),'$keterangan','$hargadenganpajak','$username',NOW())");
            }
			echo "<div style='background-color:yellow;'><br><font color=green size=+1 >Penjualan dengan No. Penjualan [ $no_penjualan ] Berhasil Ditambahkan</font></div> ";
			echo "<script>window.location.assign('masteringpesanan.php');</script>";
			}
			elseif($sistem_bayar=='TEMPO')
			{
				$db->execute("INSERT INTO penjualan(no_penjualan,tgl_penjualan,id_customer,nama_customer,tgl_kirim,tipe,jumlah,hargabeli,hargakardus,marginpersen,hargajual,hargajualtotal,pajak, hrgjualdgnpajak, hargabelitotal,margintotal,tgl_dibayar,tgl_jatuh_tempo,no_po,no_invoice,sistem_bayar,metode_bayar,tgl_invoice,keterangan,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan','$id_customer','$nama_customer','$tgl_kirim','$tipe','$jumlah','$hargabeli','$hargakardus','$margin','$hargajual','$hargajualtotal','$denganpajak','$hargadenganpajak','$total','$margintotal',NOW(),'$tgl_jatuh_tempo_penjualan','$no_po',$no_invoice,'$sistem_bayar','$metode_bayar','$tgl_invoice_penjualan','$keterangan','$username',NOW())");
			$db->execute("INSERT INTO piutang(no_penjualan,tgl_penjualan,id_customer,nama_customer,tgl_jatuh_tempo,jml_piutang,debit,username,tgl_transaksi) values ('$no_penjualan','$tgl_penjualan','$id_customer','$nama_customer','$tgl_jatuh_tempo_penjualan','$hargadenganpajak','$hargadenganpajak','$username',NOW())");
			echo "<div style='background-color:yellow;'><br><font color=green size=+1 >Penjualan dengan No. Penjualan [ $no_penjualan ] Berhasil Ditambahkan</font></div> ";
			echo "<script>window.location.assign('masteringpesanan.php');</script>";
			}
		}
?>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<form name="penjualan" method="post" action="">
	<p align="center"><font size="3"><strong>Tambah Penjualan</strong></font></p>
	<?php
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$line =  $db->queryUniqueObject("SELECT * FROM penjualan WHERE no_penjualan='$id'");
	$line2 = $db->queryUniqueObject("SELECT * FROM pembelian WHERE no_penjualan='$id'");
	}
	?>
	<p align="center">
			<table>
			        <tr>
			        <td><div align="left"><strong>Nama Customer</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="nama_customer" class="nama_customer"  name="nama_customer" readonly value="<?php echo $line->nama_customer; ?>" onfocus="setCustomer(this)" required></td>
			        <td><div align="left" style="margin-left: 20px"><strong>No. Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" name="no_penjualan" readonly type="text" id="no_penjualan" value="<?php echo $line->no_penjualan; ?>"></td>
					<input name="no_penjualan_asli" readonly type="hidden" id="no_penjualan_asli" value="<?php echo $line->no_penjualan; ?>">					
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_penjualan" name="tgl_penjualan" readonly value="<?php echo date('d-m-Y',strtotime($line->tgl_penjualan)); ?>"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>Jenis Makanan</strong></div></td>
			        <td>
			        <select style="height: 30px;margin-bottom: 0px;text-align:right" onchange="setHargaMakanan()" name="tipe" readonly id="tipe" class="tipe" required>
			        <option value="">Tidak ada</option>
			        <option value= "Snack" <?php if ($line->tipe=='Snack') {echo "selected";}?>>Snack</option>
			        <option value="Makanan" <?php if ($line->tipe=='Makanan') {echo "selected";}?>>Makanan</option>
                    <option value="Prasmanan" <?php if ($line->tipe=='Prasmanan') {echo "selected";}?>>Prasmanan</option></select> </td>
			        
					<td><div align="left" style="margin-left: 20px"><strong>Qty/Jumlah</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="jumlah" class="jumlah" name="jumlah" type="text" value="<?php echo $line->jumlah; ?>" oninput="setHarga(this.id, this.value)" onchange="setHarga(this.id, this.value)"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Kirim</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_kirim" class="tgl_kirim" name="tgl_kirim" readonly type="text" value="<?php echo date('d-m-Y',strtotime($line->tgl_kirim)); ?>"></td>
			        </tr>
					<tr>
					<td><div align="left"><strong>Keterangan</strong></div></td>
					<td>
					<textarea id="txtArea" rows="5" name="keterangan" readonly><?php echo $line->keterangan?></textarea>
					</td>
					</tr>
			        <tr>
			        <td><div align="left"><strong>No. Pembelian</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="no_po" name="no_po" readonly value="<?php echo $line2->no_po; ?>"></td>
			        <input type="hidden" id="no_po_asli" name="no_po_asli" value="<?php echo $line2->no_po; ?>">
					<td><div align="left" style="margin-left: 20px"><strong>Tanggal Pembelian</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_po" class="tgl_po" name="tgl_po" readonly type="text" value="<?php echo date('d-m-Y',strtotime($line2->tgl_po)); ?>"></td>					
					<td><div align="left" style="margin-left: 20px"><strong>Tanggal Jatuh Tempo</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" id="tgl_jatuh_tempo" class="tgl_jatuh_tempo" name="tgl_jatuh_tempo" readonly type="text" value="<?php echo  date('d-m-Y',strtotime($line2->tgl_jatuh_tempo)); ?>"></td>				
					</tr>			
			        <tr>
			        <td><div align="left"><strong>Nama Supplier</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="nama_supplier" name="nama_supplier" readonly value="<?php echo $line2->nama_supplier; ?>" onfocus="setSupplier(this)" onchange="setHargaMakanan()"></td>					
			        <td><div align="left" style="margin-left: 20px"><strong>Harga Beli</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargabeli" name="hargabeli" readonly value="<?php echo $line2->hargabeli; ?>" oninput="setHarga(this.id, this.value)" onchange="setHarga(this.id, this.value)"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Harga Beli Total</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargabelitotal" name="hargabelitotal" readonly value="<?php echo $line2->hargabelitotal; ?>" onchange="setHarga(this.id, this.value)"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>No. Invoice</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="no_invoice" name="no_invoice" readonly value="<?php echo $line2->no_invoice; ?>"></td>					
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Invoice</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_invoice" name="tgl_invoice" readonly value="<?php echo date('d-m-Y',strtotime($line2->tgl_invoice)); ?>"></td>
			        </tr>					
			        <tr>
			        <td><div align="left"><strong>Harga Kardus</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargakardus" name="hargakardus" value="" oninput="setHarga(this.id, this.value)" onchange="setHarga(this.id, this.value)"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Total</strong></div></td>
			        <td><input readonly style="height: 30px;margin-bottom: 0px" type="text" id="total" name="total" value="" oninput="setHarga(this.id, this.value)" onchange="setHarga(this.id, this.value)"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>Harga Jual</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="hargajual" name="hargajual" value="" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)" ></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Harga Jual tanpa Pajak</strong></div></td>
			        <td><input readonly style="height: 30px;margin-bottom: 0px" type="text" id="hargajualtotal" name="hargajualtotal" value="" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)"></td>
			        </tr>
			        <tr>
			        <td><div align="left"><strong>Margin (%)</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="margin" name="margin" value="" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)"></td>
			        <td><div align="left" style="margin-left: 20px"><strong>Total Margin</strong></div></td>
			        <td><input readonly style="height: 30px;margin-bottom: 0px" type="text" id="margintotal" name="margintotal" value="" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)"></td>
			        </tr>
					<tr>
					<td><div align="left"><strong>Pajak (%)</strong></div></td>
					<td><input style="height: 30px;margin-bottom: 0px" name="denganpajak" id="denganpajak" type="text" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)" value=""></td>
					<td><div align="left" style="margin-left: 20px"><strong>Harga Jual dengan Pajak</strong></div></td>
					<td><input readonly style="height: 30px;margin-bottom: 0px" name="hargadenganpajak" id="hargadenganpajak" type="text" value="" onchange="setHarga(this.id, this.value)" oninput="setHarga(this.id, this.value)"></td>
					</tr>
			        <tr>
			        <td><div align="left"><strong>No. Invoice Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="no_invoice_penjualan" name="no_invoice_penjualan" value=""></td>					
			        <td><div align="left" style="margin-left: 20px"><strong>Tanggal Invoice Penjualan</strong></div></td>
			        <td><input style="height: 30px;margin-bottom: 0px" type="text" id="tgl_invoice_penjualan" name="tgl_invoice_penjualan" value="<?php echo date('d-m-Y')?>"></td>
			        </tr>							
					<tr>
                    <td><strong>Sistem Bayar</strong></td><td><select style="height: 30px;margin-bottom: 0px" id="sistem_bayar" name="sistem_bayar" onchange="showhidefields(this.value)" required><option value="">Tidak ada</option><option value="CASH">Cash</option><option value="TEMPO">Tempo</option></select> </td>
                    <td id="pembayaran_label" style="display:none"><div align="left" style="margin-left: 20px"><strong>Pembayaran</strong></td><td id="pembayaran_isi" style="display:none"><select style="height: 30px;margin-bottom: 0px;" name="metode_bayar"><option value="">Tidak ada</option><option value=1>Kas</option><option value=2>Bank</option></select></td> 
					<td id="tgl_jatuh_tempo_label" style="display:none"><div align="left" style="margin-left: 20px"><strong>Jatuh Tempo Penjualan</strong></div></td>
			        <td id="tgl_jatuh_tempo_isi" style="display:none"><input style="height: 30px;margin-bottom: 0px" id="tgl_jatuh_tempo_penjualan" class="tgl_jatuh_tempo_penjualan" name="tgl_jatuh_tempo_penjualan" type="text" value="<?php echo date('d-m-Y',strtotime('+30 days')); ?>"></td>					
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
	var picker = new Pikaday({
		field: document.getElementById('tgl_invoice_penjualan'),
		format : "DD-MM-YYYY",
	});		var picker = new Pikaday({
		field: document.getElementById('tgl_jatuh_tempo_penjualan'),
		format : "DD-MM-YYYY",
	});		
</script>
