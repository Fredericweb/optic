<?php 
session_start();
require 'ajax-phpmail/class/class.phpmailer.php';
include('includes/config.php');
error_reporting(0);


if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    $rdvid=intval($_GET['rdvid']);
    $login=$_SESSION['login'];
    $sql=mysqli_query($con,"SELECT * FROM user WHERE (login='$login')");
    $num=mysqli_fetch_array($sql);
    $iduser = $num['iduser'];
    $docn = $num['nomuser'];
    $docp = $num['prenomuser'];
    if(isset($_GET['rdvid']))
    {
       
        
        $sql1 =mysqli_query($con,"SELECT * FROM rdv WHERE (idrdv='$rdvid')");
        $num1=mysqli_fetch_array($sql1);
        $nom = $num1['nomrdv'];
        $idrdv = $num1['idrdv'];
        $prenom = $num1['prenomrdv'];
        $email = $num1['mailrdv'];
        $date = $num1['daterdv'];
        $hr = $num1['idheure'];
        $sql2=mysqli_query($con,"Select libelheure from heurerdv where idheure='$hr'");
        $row2=mysqli_fetch_array($sql2);
        $heure = $row2['libelheure'];
        $motifrid = $num1['idTyperdv'];
        $sql3=mysqli_query($con,"Select libelTyperdv from typerdv where idTyperdv='$motifrid'");
        $row3=mysqli_fetch_array($sql3);
        $motifr= $row3['libelTyperdv'];
        
        
$mail = new PHPMailer;
$mail->IsSMTP();								//Sets Mailer to send message using SMTP
$mail->Host = 'smtp-mail.outlook.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = '587';								//Sets the default SMTP server port
$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'zowblazooptic@hotmail.com';					//Sets SMTP username
$mail->Password = 'josephniamke123';					//Sets SMTP password
$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = 'zowblazooptic@hotmail.com';			//Sets the From email address for the message
$mail->FromName = 'zowblazo Optic';					//Sets the From name of the message
$mail->AddAddress($email, $nom);	//Adds a "To" address
$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);							//Sets message type to HTML
$mail->Subject = 'Rendez-vous Ophtamologe'; //Sets the Subject of the message
//An HTML or plain text message body
$mail->Body = "
<p>
Bonjour/Bonsoir Mr(Mme) <strong>$nom $prenom</strong>.
Votre rendez-vous pour <strong>$motifr</strong> a bien été accepté par le docteur <strong>$docn $docp</strong>.
Veuillez vous presentez à <strong>Zoblazo Optic</strong> le <strong>$date</strong> avant <strong>$heure</strong>.
Merci pour votre confiance.
</p>
";

$mail->AltBody = '';

$result = $mail->Send();		
$statut=1;
	$query=mysqli_query($con,"update rdv set statut='$statut' , iduser='$iduser' where idrdv='$rdvid'");
	$checkmsg="Rendez-vous accepté";

 
if($query)
{
$msg="Post deleted ";
}
else{
$error="Something went wrong . Please try again.";    
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
        <title>Newsportal | Manage Posts</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

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
                                    <h4 class="page-title">Gerer Rendez-vous </h4>
                                    
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#"></a>
                                        </li>
                                        <li>
                                            <a href="#">Rendez-vous</a>
                                        </li>
                                        <li class="active">
                                        Gerer Rendez-vous
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                         

                                    <div class="table-responsive">
                                   
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Nom</th>
<th>Prenom</th>
<th>Email</th>
<th>Tel</th>
<th>Sexe</th>
<th>Motif</th>
<th>DateRdv</th>
<th>Heurerdv</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"Select idrdv,nomrdv,iduser,prenomrdv,mailrdv,phone,idTyperdv,daterdv,idheure,sexerdv from rdv where statut='0'");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="9" align="center"><h3 style="color:red">Aucun Rendez-vous demandé</h3></td>
<tr>
<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['nomrdv']);?></b></td>
<td><b><?php echo htmlentities($row['prenomrdv']);?></b></td>
<td><b><?php echo htmlentities($row['mailrdv']);?></b></td>
<td><b><?php echo htmlentities($row['phone']);?></b></td>
<td><b><?php echo htmlentities($row['sexerdv']);?></b></td>

<td><?php
$idmotif = $row['idTyperdv'];
$queryc=mysqli_query($con,"Select libelTyperdv from typerdv where idTyperdv='$idmotif'");
$rowc=mysqli_fetch_array($queryc);

echo htmlentities($rowc['libelTyperdv'])?></td>

<td><?php echo htmlentities($row['daterdv'])?></td>

<td><?php 
$idh=$row['idheure'];
$querym=mysqli_query($con,"Select libelheure  from  heurerdv where idheure='$idh'");
$rowm=mysqli_fetch_array($querym);
echo htmlentities($rowm['libelheure'])?></td>

<?php
          
        ?>

<td><a href="manage-rdv.php?rdvid=<?php echo htmlentities($row['idrdv']);?>"><i class="fa fa-check"  style="color: #29b6f6;"></i></a> 
 </tr>
<?php } }?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->


                <!-- envoi de mail -->
       
<!-- accept table -->



                <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                         

                                    <div class="table-responsive">
<table class="table table-colored table-centered table-colored-bordered table-bordered-success table-inverse m-0">
<thead>
<tr>
                                           
<th>Nom</th>
<th>Prenom</th>
<th>Email</th>
<th>Tel</th>
<th>Sexe</th>
<th>Motif</th>
<th>DateRdv</th>
<th>Heurerdv</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"Select nomrdv,prenomrdv,mailrdv,phone,idTyperdv,daterdv,idheure,sexerdv from rdv where statut=1 and iduser='$iduser'");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>


<tr>
<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['nomrdv']);?></b></td>
<td><b><?php echo htmlentities($row['prenomrdv']);?></b></td>
<td><b><?php echo htmlentities($row['mailrdv']);?></b></td>
<td><b><?php echo htmlentities($row['phone']);?></b></td>
<td><b><?php echo htmlentities($row['sexerdv']);?></b></td>

<td><?php
$idmotif = $row['idTyperdv'];
$queryc=mysqli_query($con,"Select libelTyperdv from typerdv where idTyperdv='$idmotif'");
$rowc=mysqli_fetch_array($queryc);
echo htmlentities($rowc['libelTyperdv'])?></td>

<td><?php echo htmlentities($row['daterdv'])?></td>

<td><?php 
$idh=$row['idheure'];
$querym=mysqli_query($con,"Select libelheure  from  heurerdv where idheure='$idh'");
$rowm=mysqli_fetch_array($querym);


echo htmlentities($rowm['libelheure'])?></td>

      



<?php } }?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
		<script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>