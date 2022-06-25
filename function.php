<?php
include '../dbconnect.php';
// menghapus barang dari stock
if(isset($_POST['hapusbarang'])){
	$idb = $_POST['idb']; //idbarang

	$gambar = mysqli_query($conn, "select * from produk where idproduk='$idb'");
	$get = mysqli_fetch_array($gambar);
	$img = 'produk/'.$get['gambar'];
	unlink($img);


	$hapus = mysqli_query($conn, "delete from produk where idproduk='$idb'");
	if($hapus){
		header('location:produk.php');
	} else {
		echo "Gagal";
		header('location:produk.php');
	}
};
// edit data produk
if(isset($_POST['updateproduk'])){
	$namaproduk	= $_POST['namaproduk'];
	$deskripsi = $_POST['deskripsi'];
	$hargaafter = $_POST['hargaafter'];
    $hargabefore = $_POST['hargabefore'];
   
	$idproduk = $_POST['idproduk'];

	$queryupdate = mysqli_query($conn,"update produk set namaproduk='$namaproduk', deskripsi='$deskripsi', 
    hargaafter='$hargaafter', hargabefore='$hargabefore' where idproduk='$idproduk'");

	if($queryupdate){
		header('location:produk.php');
	} else{
		header('location:produk.php');
	}
}
// edit data kategori
if(isset($_POST['updatekategori'])){
	$kategori	= $_POST['namakategori'];
	$tgldibuat = $_POST['tgldibuat'];
	
   
	$idkategori = $_POST['id'];

	$queryupdate = mysqli_query($conn,"update kategori set namakategori='$kategori', tgldibuat='$tgldibuat'
    where idkategori='$idkategori'");

	if($queryupdate){
		header('location:kategori.php');
	} else{
		header('location:kategori.php');
	}
}
// menghapus kategori
if(isset($_POST['hapuskategori'])){
	$id = $_POST['id']; //idkategori

	$hapus = mysqli_query($conn, "delete from kategori where idkategori='$id'");
	if($hapus){
		header('location:kategori.php');
	} else {
		echo "Gagal";
		header('location:kategori.php');
	}
};
// edit data pembayaran
if(isset($_POST['updatepembayaran'])){
	$metode	= $_POST['metode'];
	$norek = $_POST['norek'];
	$an = $_POST['an'];
	$logo = $_POST['logo'];
	
   
	$id = $_POST['no'];

	$queryupdate = mysqli_query($conn,"update pembayaran set metode='$metode', norek='$norek',an='$an',
    logo ='$logo' where no='$id'");

	if($queryupdate){
		header('location:pembayaran.php');
	} else{
		header('location:pembayaran.php');
	}
}
// menghapus pembayaran
if(isset($_POST['hapuspembayaran'])){
	$id = $_POST['no']; //idkategori

	$hapus = mysqli_query($conn, "delete from pembayaran where no='$id'");
	if($hapus){
		header('location:pembayaran.php');
	} else {
		echo "Gagal";
		header('location:pembayaran.php');
	}
};

// edit data user
if(isset($_POST['updateuser'])){
	$namalengkap	= $_POST['namalengkap'];
	$notelp = $_POST['notelp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$userid = $_POST['id'];

	$queryupdate = mysqli_query($conn,"update login set namalengkap='$namalengkap', notelp='$notelp', alamat='$alamat',
    email ='$email' where userid='$userid'");

	if($queryupdate){
		header('location:user.php');
	} else{
		header('location:user.php');
	}
}
// menghapus user
if(isset($_POST['hapususer'])){
	$userid = $_POST['id']; //idcustomer

	$hapus = mysqli_query($conn, "delete from login where userid='$userid'");
	if($hapus){
		header('location:user.php');
	} else {
		echo "Gagal";
		header('location:user.php');
	}
};
// edit data customer
if(isset($_POST['updatecustomer'])){
	$namalengkap	= $_POST['namalengkap'];
	$notelp = $_POST['notelp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$userid = $_POST['id'];

	$queryupdate = mysqli_query($conn,"update login set namalengkap='$namalengkap', notelp='$notelp', alamat='$alamat',
    email ='$email' where userid='$userid'");

	if($queryupdate){
		header('location:customer.php');
	} else{
		header('location:customer.php');
	}
}
// menghapus customer
if(isset($_POST['hapuscustomer'])){
	$userid = $_POST['id']; //idcustomer

	$hapus = mysqli_query($conn, "delete from login where userid='$userid'");
	if($hapus){
		header('location:customer.php');
	} else {
		echo "Gagal";
		header('location:customer.php');
	}
};
?>