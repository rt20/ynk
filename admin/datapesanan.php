<?php 
	session_start();
	include '../dbconnect.php';
	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - rootspace.net</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Daftar Pesanan.xls");
	?>
 
 <div class="main-content-inner">
               
               <!-- market value area start -->
               <div class="row mt-5 mb-5">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-body">
                               <div class="d-sm-flex justify-content-between align-items-center">
                                   <h2>Daftar Pesanan</h2>
                               </div>
                                   <div class="data-tables datatable-dark">
                                        <table border="1" id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                                           <tr>
                                               <th>No</th>
                                               <th>ID Pesanan</th>
                                               <th>Nama Customer</th>
                                               <th>Tanggal Order</th>
                                               <th>Total</th>
                                               <th>Status</th>
                                           </tr></thead><tbody>
                                           <?php 
                                           $brgs=mysqli_query($conn,"SELECT * from cart c, login l where c.userid=l.userid and status!='Cart' and status!='Selesai' order by idcart ASC");
                                           $no=1;
                                           while($p=mysqli_fetch_array($brgs)){
                                           $orderids = $p['orderid'];
                                               ?>
                                               
                                               <tr>
                                                   <td><?php echo $no++ ?></td>
                                                   <td><strong><?php echo $p['orderid'] ?></a></strong></td>
                                                   <td><?php echo $p['namalengkap'] ?></td>
                                                   <td><?php echo $p['tglorder'] ?></td>
                                                   <td>Rp<?php 
                                               
                                               $result1 = mysqli_query($conn,"SELECT SUM(d.qty*p.hargaafter) AS count FROM detailorder d, produk p where orderid='$orderids' and p.idproduk=d.idproduk order by d.idproduk ASC");
                                               $cekrow = mysqli_num_rows($result1);
                                               $row1 = mysqli_fetch_assoc($result1);
                                               $count = $row1['count'];
                                               if($cekrow > 0){
                                                   echo number_format($count);
                                                   } else {
                                                       echo 'No data';
                                                   }?></td>
                                                   <td><?php 
                                                    
                                                   //echo $p['status'] 
                                                   $orders = $p['orderid'];
                                                   $cekkonfirmasipembayaran = mysqli_query($conn,"select * from konfirmasi where orderid='$orders'");
                                                   $cekroww = mysqli_num_rows($cekkonfirmasipembayaran);
                                                   
                                                   if($cekroww > 0){
                                                       echo 'Confirmed';
                                                   } else {
                                                       if($p['status']!='Pengiriman'){
                                                           echo "Menunggu Konfirmasi";
                                                       } else {
                                                           echo "Pengiriman";
                                                       };
                                                   }
                                                   
                                                   ?></td>
                                               </tr>		
                                               <?php 
                                           }
                                           ?> 
                                       </tbody>
                                       </table>
                                   </div>
                                   
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
             
               
               <!-- row area start-->
           </div>
 
	
</body>
</html>