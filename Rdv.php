<?php
session_start();
include('admin/includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==1000000)
  { 
header('location:admin/index.php');
}
else{

if(isset($_POST['enregistrer']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$naiss=$_POST['naiss'];
$motif=$_POST['motif'];
$rdvd=$_POST['rdvd'];
$heure=$_POST['heurerdv'];
$sexe=implode ($_POST['ch']);
$statu=0;
$dateday=date('y-m-d');
$query=mysqli_query($con,"insert into rdv(nomrdv,prenomrdv,mailrdv,phone,idtyperdv,daterdv,idheure,sexerdv,naissrdv,statut,dateday) 
values('$nom','$prenom','$mail','$tel','$motif','$rdvd','$heure','$sexe','$naiss','$statu','$dateday')");
if($query)
{
$msg="Categorie Ajoutée";
}
else{
$error="Erreur , réessayez à nouveau";    
} 
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Rendez-vous</title>
</head>
<body>
  <!-- HEADER -->
  <?php include('header.php') ?>
  <!-- END HEADER -->
    <section class="rdv">
        <div class="rdv-banner"></div>
        <form action="" class="rdv-form" method="post">
            <h1>
                Prenez rendez vous avec un professionnel de l'optique en magasin
            </h1>
            <div class="rdv-form-content">
                <div class="formleft">
                    <p>NOM *</p>
                    <input type="text" name="nom" id="" required>
                    <p>ADRESSE MAIL *</p>
                    <input type="email" name="mail" id="" required>
                    <p>DATE DE NAISSANCE(DD/MM/YYYY) *</p>
                    <input type="date" name="naiss" id="" required>
                    <p>DATE RENDEZ-VOUS (DD/MM/YYYY) *</p>
                    <input type="date" name="rdvd" id="" required>
                    <p>Homme</p>
                    <input name="ch[]" type="radio" value="Masculin">
                </div>
                <div class="formright">
                    <p>PRENOM *</p>
                    <input type="text" name="prenom" id="" required>
                    <p>TELEPHONE *</p>
                    <input type="tel" name="tel" id="" required>
                    <p>MOTIFS DU RENDEZ-VOUS *</p>
                    <select name="motif" id="" required>
                        <option value="">Selectionner le motif du rendez-vous</option>
                        <?php
                        // menu deroulant motif
                        $ret=mysqli_query($con,"select idTyperdv,libelTyperdv from typerdv");
                        while($result=mysqli_fetch_array($ret))
                        {    
                        ?>
                        <option value="<?php echo htmlentities($result['idTyperdv']);?>"><?php echo htmlentities($result['libelTyperdv']);?></option>
                        <?php } ?>
                    </select>
                    <p>HEURE DE RENDEZ-VOUS *</p>
                    <select name="heurerdv" id="" required>
                    <option value="">Selectionner l'heure de rendez-vous</option>
                        <?php
                        // menu deroulant motif
                        $reth=mysqli_query($con,"select idheure,libelheure from heurerdv");
                        while($resulth=mysqli_fetch_array($reth))
                        {    
                        ?>
                        <option value="<?php echo htmlentities($resulth['idheure']);?>"><?php echo htmlentities($resulth['libelheure']);?></option>
                        <?php } ?>
                   </select>
                   <p>Femme</p>
                   <input name="ch[]" type="radio" value="Feminin">
                </div>  
            </div>
            <input type="submit" name="enregistrer" class="btn" value="Je Prends rendez vous">
        </form>
    </section>
    <!-- FOOTER -->
    <?php include('footer.php') ?>
    <!-- END FOOTER-->

    <script src="js/script-view.js"></script>
    <script src="js/jsfileSlide.js"></script>
    <script src="js/scriptTabContent.js"></script>
</body>
</html>
<?php } ?>