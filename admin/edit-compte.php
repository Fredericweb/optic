<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

// For adding post  
$userid=intval($_GET['pid']);
if(isset($_POST['submit']))
{

$nom=$_POST['nom'];
$Prenom=$_POST['prenom'];
$rand = mt_rand(10,99);
// $loginBrut="$rand$nom$prenom";
$login = $_POST['login'];
$role=$_POST['role'];
$sexe=$_POST['sexe'];
$mdp=$_POST['mdp'];
$options = ['cost' => 12];
$hashmdp=password_hash($mdp, PASSWORD_BCRYPT, $options);
$arr = explode(" ",$model);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('format invalide. seulement les  jpg / jpeg/ png /gif sont acceptés');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

$query=mysqli_query($con,"update user set nomuser='$nom',prenomuser='$Prenom',idRole=$role,mdpuser='$hashmdp',photouser='$imgfile',login='$login' where iduser='$userid'");
if($query)
{
$msg="utilisateur ajoutée";
}
else{
    $error="une erreur s'est produite veuillez réessayer";     
} 

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
        <title>ZOOBLAZO Optic | Ajouter Compte</title>

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
                                    <h4 class="page-title">Modifier utilisateur</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Compte</a>
                                        </li>
                                        <li>
                                            <a href="#">Modifier utilisateur</a>
                                        </li>
                                        <li class="active">
                                        Modifier utilisateur
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


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<?php 
$queryuser=mysqli_query($con,"select * from user where iduser='$userid'");
$rsl =mysqli_fetch_array($queryuser);
 ?>
<label for="exampleInputEmail1">Nom</label>
<input type="text" class="form-control" id="posttitle" name="nom" placeholder="Entrer le nom" value="<?php echo htmlentities($rsl['nomuser']); ?>" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Prenom</label>
<input type="text" class="form-control" id="posttitle" name="prenom" placeholder="Entrer le prenom" value="<?php echo htmlentities($rsl['prenomuser']); ?>" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Login</label>
<input type="text" class="form-control" id="posttitle" name="login" placeholder="Entrer le login" value="<?php echo htmlentities($rsl['login']); ?>" required>
</div>



<div class="form-group m-b-20">
<label for="exampleInputEmail1">Role</label>
<select class="form-control" name="role" id="category"  required>
<option value="">Selectionner le role</option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select idRole,libelRole from  role");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['idRole']);?>"><?php echo utf8_encode($result['libelRole']);?></option>
<?php } ?>

</select> 
</div>
    
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Sexe</label>
<select class="form-control" name="sexe" required>
<option value="">Selectionner le sexe</option>
<?php

// Feching active categories
$retm=mysqli_query($con,"select idSexe,libelSexe from sexe");
while($resultm=mysqli_fetch_array($retm))
{    
?>
<option value="<?php echo htmlentities($resultm['idSexe']);?>"><?php echo htmlentities($resultm['libelSexe']);?></option>
<?php } ?>
</select> 
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Mot de passe </label>
<input type="text" class="form-control" id="posttitle" name="mdp" placeholder="mot de passe" required>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">confirmer le mot de passe </label>
<input type="text" class="form-control" id="posttitle" name="cmdp" placeholder="confirmer le mot de passe" required>
</div>

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Photo</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage"  required>
</div>
</div>
</div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Enregistrer</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Annuler</button>
                                        </form>
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