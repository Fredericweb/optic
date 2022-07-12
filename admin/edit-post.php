<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$model=$_POST['model'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$quantite=$_POST['quantité'];
$price=$_POST['price'];
$arr = explode(" ",$model);
$url=implode("-",$arr);

$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update produit set ModelProd='$model',idCategorie='$catid',idMarque='$subcatid',descriptionProd='$postdetails',qteProd='$quantite',priceProd='$price' where idProd='$postid'");
if($query)
{
$msg="info produit modifiées ";
}
else{
    $error="Une erreur s'est produit veuillez réessayer";    
} 

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Add Post</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php
            $login=$_SESSION['login'];
            $query=mysqli_query($con,"select * from user where login='$login'");
            $row = mysqli_fetch_array($query);
            if($row['idRole']==1){
                include('includes/leftsidebar.php');
            }
            elseif($row['idRole']==2){
                include('includes/leftsidebarcaisse.php');  
            }
            elseif($row['idRole']==3){
                include('includes/leftsidebaroph.php');
            }
            elseif($row['idRole']==4){
                include('includes/leftsidebarstock.php');
            }
            ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Modifier un produit</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">produit</a>
                                        </li>
                                        <li class="active">
                                        Modifier un produit
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong></strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong></strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>

<?php
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"Select idCategorie,idMarque,ModelProd,priceProd,qteProd,imgProd,descriptionProd  from  produit where idProd='$postid'");
while($row=mysqli_fetch_array($query))
{
?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Model</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['ModelProd']);?>" name="model" placeholder="Entrer le model" required>
</div>



<div class="form-group m-b-20">
<label for="exampleInputEmail1">Categorie</label>
<select class="form-control" name="category" id="category"  required>
<option value="<?php echo htmlentities($row['idCategorie']);?>"><?php echo htmlentities($$resultlc['libelCategorie']);?></option>
<?php

// categories
$ret=mysqli_query($con,"select idCategorie,libelCategorie from  categorie");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['idCategorie']);?>"><?php echo htmlentities($result['libelCategorie']);?></option>
<?php } ?>

</select> 
</div>
    
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Marque</label>
<select class="form-control" name="subcategory" id="subcategory" required>
<option value="<?php echo htmlentities($row['idMarque']);?>"><?php echo htmlentities($row['libelmarque']);?></option>
<?php

// Feching active categories
$ret1=mysqli_query($con,"select idMarque,libelmarque from  marque");
while($result1=mysqli_fetch_array($ret1))
{    
?>
<option value="<?php echo htmlentities($result1['idMarque']);?>"><?php echo htmlentities($result1['libelmarque']);?></option>
<?php } ?>
</select> 
</div>
         

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Description prod</b></h4>
<textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['descriptionProd']);?></textarea>
</div>
</div>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Prix</label>
<input type="text" class="form-control" id="posttitle" name="price"  value="<?php echo htmlentities($row['priceProd']);?>" required>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">quantité</label>
<input type="text" class="form-control" id="posttitle" name="quantité" value="<?php echo htmlentities($row['qteProd']);?>" required>
</div>

 <div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Image</b></h4>
<img src="postimages/<?php echo htmlentities($row['imgProd']);?>" width="300"/>
<br />
<a href="change-image.php?pid=<?php echo htmlentities($postid);?>">Modifier l'image</a>
</div>
</div>
</div>

<?php } ?>

<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Modifier</button>

                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>
</html>
<?php } ?>