<?php
session_start();

include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } 
//Code for Checkout
// if(isset($_POST['checkout'])){
// $invoiceno= mt_rand(100000000, 999999999);
// $pid=$_SESSION['productid'];
// $quantity=$_POST['quantity'];
// $cname=$_POST['customername'];
// $cmobileno=$_POST['mobileno'];
// $pmode=$_POST['paymentmode'];
// $value=array_combine($pid,$quantity);
// foreach($value as $pdid=> $qty){
// $query=mysqli_query($con,"insert into tblorders(ProductId,Quantity,InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode) values('$pdid','$qty','$invoiceno','$cname','$cmobileno','$pmode')") ; 
// }
// echo '<script>alert("Invoice genrated successfully. Invoice number is "+"'.$invoiceno.'")</script>';  
//  unset($_SESSION["cart_item"]);
//  $_SESSION['invoice']=$invoiceno;
//  echo "<script>window.location.href='invoice.php'</script>";

// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Search Product</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
       


        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
      
        <div class="hk-pg-wrapper">
         
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Product</a></li>
<li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </nav>
          
            <div class="container">
              
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Search Product</h4>
                </div>
                
                <div class="row">
                    <div class="col-xl-12">

<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
                                       
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Manage Name</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Product Name" name="productname" required>
<div class="invalid-feedback">Please provide a valid manage name.</div>
</div>
</div>

                                 
<button class="btn btn-primary" type="submit" name="search">search</button>
</form>
</div>
</div>
</section>
<!--code for search result -->
<?php if(isset($_POST['search'])){?>
 <section class="hk-sec-wrapper">
     
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                            
                                                    <th>Category</th>
                                                    <th>Company</th>
                                                    <th>Product</th>
                                                    <th>Pricing</th>
                                                    <th>Posting Date</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$pname=$_POST['productname'];
$query=mysqli_query($con,"select * from tblproducts where ProductName like '%$pname%'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>
<form method="post" action="search-product.php?action=add&pid=<?php echo $row["id"]; ?>">                                                  
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['CategoryName'];?></td>
<td><?php echo $row['CompanyName'];?></td>
<td><?php echo $row['ProductName'];?></td>
<td><?php echo $row['ProductPrice'];?></td>
<td><?php echo $row['PostingDate'];?></td>
<td>
<a href="edit-product.php?pid=<?php echo base64_encode($row['id'].$rno);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i></a>
<a href="manage-categories.php?del=<?php echo base64_encode($row['id'].$rno);?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to delete?');"> <i class="icon-trash txt-danger"></i> </a>
</td>

</tr>
</form>
<?php 
$cnt++;
} ?>
                                                
                             
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
              

            </div>                  



  
<?php include_once('includes/footer.php');?>
        

        </div>
     

    </div>

    

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>
</html>
<?php } ?>


