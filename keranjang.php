<?php
session_start();
if(!isset($_SESSION['username'])){
    $username = $_POST['username'];
    $_SESSION['transaksi'] = $username;
}

if(!isset($_SESSION['transaksi'])){
    $idt = date("ymdHis");//membuat id transaksi yang unik berdasarkan waktu
    $_SESSION['transaksi'] = $idt;
}

include "config.php";
$conn = mysqli_connect($HOST,$USER_NAME,$PASSWORD) ;
if (! $conn) die("tidak bisa koneksi ke database");
mysqli_select_db($conn, $DB);
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Order</title>
<style>
table{font-family:arial;font-size:10pt}
a{color:#990000;text-decoration:none}
a:hover{text-decoration:underline}
a.beli{background-color:orange;color:white;text-decoration:none}
a.beli:hover{background-color:#75923C;color:white;text-decoration:none}
.tombollanjut{border:black 1px solid; padding:1}
.ukuran{font-size:10px}
.keranjang{border-bottom:#75923C 1px solid}
</style>
<script>
var ajaxku;
var idnya;
function update(id){
    idnya = id;
    ajaxku = buatajax();
    idinput = "jumlah"+id;
    idloading = "loading"+id;
    jumlah = document.getElementById(idinput).value;
    var url="updatejumlah.php";
    url=url+"?id="+id;
    url=url+"&jml="+jumlah
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=stateChanged;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
    document.getElementById(idloading).innerHTML = "<img src=ajax-loader.gif>";
}

function buatajax(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}

function stateChanged(){
var data;
    if (ajaxku.readyState==4){
        data=ajaxku.responseText;
        subtotalx = document.getElementById("subtotal").innerHTML;
        sub = parseFloat(subtotalx);
        idharga = "harga"+idnya;
        idloading = "loading"+idnya;
        harganya = document.getElementById(idharga).innerHTML;
        hrg = parseFloat(harganya);
        if(data.length>0){
            hargabaru = parseFloat(data);
            subtotalbaru = sub-hrg+hargabaru;
            document.getElementById(idloading).innerHTML = "";
            document.getElementById(idharga).innerHTML = data
            document.getElementById("subtotal").innerHTML = subtotalbaru;
        }
    }
}
</script>
</head>

<body topmargin="0" leftmargin="0" style="font-family:arial">
<center>
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="800" height="90">
  <tr>
    <td width="521" height="50" bgcolor="#FFCC00"><b>No Queue </b></td>
    <td width="267" height="50" bgcolor="#FFCC00">
<?php
$iduser = $_SESSION['username'];
$idtransaksi = $_SESSION['transaksi'];
$keranjangx = mysqli_query($conn, "select * from tabelpesan where idtransaksi='$idtransaksi'");
$pesan = 0;
while($psn = mysqli_fetch_array($keranjangx)){
    $pesan = $pesan + $psn['jumlah'];
}
            ?>
    <img border="0" src="Shopping_Cart.png" align="left" width="64" height="64"><b><font size="6"><?php echo $pesan;?></font></b>
    Order(s)
<br>
<?php
if($pesan>0){
    echo "<a href=keranjang.php>[View]</a>";
}
?></td>
  </tr>
  <tr>
    <td width="800" height="38" colspan="2" name="keranjang">

<img src=ajax-loader.gif style="display:none">
<b><font face="Courier New" size="5" color="orange">My Order(s)</font></b>
<p>
<table border="0" cellpadding="4" cellspacing="0" width="100%">
  <tr>
    <td bgcolor="orange"></td>
    <td bgcolor="orange"><b>Code</b></td>
    <td bgcolor="orange"><b>Order</b></td>
    <td bgcolor="orange"><b>Qty</b></td>
    <td bgcolor="orange"><b>Sub Total</b></td>
  </tr>

<?php
$idtransaksi = $_SESSION['transaksi'];

$keranjang = mysqli_query($conn, "select tabelpesan.*, tabelbarang.nama, tabelbarang.gambar from tabelpesan, tabelbarang
where tabelpesan.idtransaksi='$idtransaksi' and tabelpesan.idproduk=tabelbarang.kode");
$subtotal = 0;
while($k = mysqli_fetch_array($keranjang)){
    echo "<tr><td class=keranjang><img src='".$k['gambar']."' width=50 height=50></td>
    <td class=keranjang>".$k['idproduk']."</td><td class=keranjang>".$k['nama']."</td>";
    echo "<td class=keranjang><input type=text size=1 value='".$k['jumlah']."' id=jumlah".$k['nomor'].">
    <a href=\"javascript:update(".$k['nomor'].")\">Update</a> <span id=\"loading".$k['nomor']."\"></span></td>
    <td class=keranjang>Rp. <span id=\"harga".$k['nomor']."\">".$k['harga']."</span> &nbsp;<a href=\"delete.php?id=".$k['nomor']."\" title=\"delete\"><img src=delete.jpg border=0></a></td></tr>";
    $subtotal = $subtotal + $k['harga']; 
}

echo "<tr><td colspan=4 bgcolor='orange' align=right><b>Grand Total</b> &nbsp;</td><td bgcolor='orange'>
<b>Rp. <span id=subtotal>$subtotal</span></b></td></tr>";
?>
</table>
<a href=index1.php>Add Order(s)</a>

    </td>
  </tr>
  </table>

  <form method="post" name="signup" action="finish.php">
    <input type = "submit" name="submit" value = "Complete Your Order" style = "width : 200px; height : 50px; margin-left: 600px; margin-top : 20px; float : left; color : white; background-color : #D93D3D; border-collapse : collapse; border : 0px; border-radius : 3px; font-size : 15px">
    </form>

    <?php

    if (isset($_POST['submit'])) { 
        $_SESSION["keranjang"] = $_POST["keranjang"];
    } 
?> 

</body>

</html>
