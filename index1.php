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
<title>No Queue</title>
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
</head>

<body topmargin="0" leftmargin="0" style="font-family:arial">
<center>
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="800" height="90">
  <tr>
    <td width="521" height="50" bgcolor="#FFCC00"><b>No Queue</b></td>
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
    echo "<a href=keranjang.php>[lihat]</a>";
}
?>
</td>
  </tr>
  <tr>
    <td width="800" height="38" colspan="2">

<?php
$baju = mysqli_query($conn, "select * from tabelbarang order by kode desc");
while($b = mysqli_fetch_array($baju)){
    $kode[] = $b['kode'];
    $gambar[] = $b['gambar'];
    $harga[] = $b['harga'];
    $nama[] = $b['nama'];
    $stok[] = $b['stok'];

}
$jumlah = count($kode);
$baris = floor($jumlah/3);
if(($jumlah%3) > 0){
    $baris = $baris + 1;
}
?>
<center>
<table border="0" cellpadding="10" cellspacing="0" style="font-family:arial;" bgcolor="#D7E4BC">
<?php
$k = 0;
for($i=0;$i<$baris;$i++){
    echo "<tr>";
    for($j=0;$j<5;$j++){
        $optionhtml = "";
        echo "<td width=\"33%\">";
        if($kode[$k]){
            echo "<table border=0 cellpadding=0 cellspacing=0 width=100 height=100 background=\"".$gambar[$k]."\">";
            echo "<tr>
                <td width=\"50%\" height=\"20\" bgcolor=\"#75923C\"><font size=\"1\">".$harga[$k]."</font></td>
                <td width=\"50%\" height=\"20\">&nbsp;</td>
                </tr>
                <tr>
                <td width=\"100%\" height=\"80\" colspan=\"2\" valign=bottom>
                <a href=\"inputkeranjang.php?kode=".$kode[$k]."\" class=beli>&nbsp; Order &nbsp;</a></td>
                </tr>
                </table>
                <div style=\"padding:2\">
                <font size=\"2\">".$nama[$k]." </font>
                <br>
                </div>";
        }
        echo "</td>";
        $k++;
    }
    echo "</tr>";
}
?>
</table>

    </td>
  </tr>
  </table>

</body>

</html>
