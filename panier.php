<?php 
include('admin/includes/config.php');
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']= array();
}

if(isset($_GET['del'])){
    $delid=$_GET['del'];
    $k = array_keys($_SESSION['panier'],intval($delid));
    foreach($k as $values){
        unset($_SESSION['panier'][$values]);
    }
}
$id = array_values($_SESSION['panier']);
$id2=array();
$id1 = array_unique($id);
array_push($id2,array_values($id1));
$cpt = array();

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
    <title>panier</title>
</head>
<body>
     <!-- HEADER -->
     <?php include('header.php') ?>
     <!-- END HEADER -->
    <section class="panier-content">
        <div class="panier-left">
        <?php
           
            if(empty($id)){
                $panier=array();
            }else{
                $price=0;
                $infoprod=array();
                $infocom=array();
                foreach($id1 as $values){
                    $queryp=mysqli_query($con,"Select * from  produit where idProd=$values");
                    $panier = mysqli_fetch_array($queryp);
                    
                    ?>
            <div class="panier-left-item">
                <div class="panier-left-1">
                    <h1><?php 
                        $idmarq=$panier['idMarque'];
                        $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
                        $rowm=mysqli_fetch_array($querym); 
                        echo htmlentities($rowm['libelmarque'])?></h1>

                    <p class="model"><?php echo htmlentities($panier['ModelProd'])?></p>

                    <img src="admin/postimages/<?php echo htmlentities($panier['imgProd'])?>" alt="">
                    <p class="qte">Quantité: 
                        
                    <?php
                        $keyid = array_keys($id,$panier['idProd']);
                        $cpt = count($keyid);
                        echo $cpt;
                     ?>
                </p>
                </div>
                <div class="panier-left-2">
                    <h3>Prix unitaire: <br> <?php echo htmlentities($panier['priceProd'])?> Fcfa</h3>
                    <h2>Total ttc: <br> <?php echo htmlentities($panier['priceProd']*$cpt) ?> Fcfa</h2>
                </div>
                <a href="panier.php?del=<?php echo htmlentities($panier['idProd']) ?>" class="btnR"><i class="fas fa-trash"></i></a>
            </div>
                <?php 
                    $infoprod = [$panier['idProd'],$cpt];
                 $price+=$panier['priceProd']*$cpt;
                 array_push($infocom,$infoprod);
                ?>
            <?php 
            }
        }
        ?>
        <?php 

        if(isset($_POST['valider'])){
            require_once('phpqrcode/qrlib.php');
            $numcom = mt_rand(10000,99999);
            $statut = 0;
            $querycom=mysqli_query($con,"insert into com(numcom,datecom,statut) values('$numcom',now(),'$statut')"); 

            for($i=0; $i<count($infocom);$i++){
                $prod = $infocom[$i][0];
                $qtecom= $infocom[$i][1];
                $querydet=mysqli_query($con,"insert into detailcom(numcom,idProd,qtecom)values('$numcom','$prod','$qtecom')");
            }     
            $path = 'img/qrcode/';
            $file = $path.$numcom.".png";
            QRcode::png($numcom,$file,'L',10,2);
            echo "<script language='javascript'>document.location='html-to-pdf/recucom.php?numcom=$numcom'</script>";
        }
        
        ?>
        </div>
        <div class="panier-right">
            <div class="ttc-panier rightitem item1">
                <p>TTC PANIER</p>
                <P> <?php echo htmlentities($price)?> XOF</P>
            </div>
            <div class="frais rightitem item1">
                <p>FRAIS</p>
                <P>0 XOF</P>
            </div>
            <div class="total rightitem">
                <h1>Total TTC de votre <br> commande</h1>
                <h1 class="ttc-price text-[#a48156]"><?php echo htmlentities($price)?>XOF</h1>
            </div>
            <form action="" method="post">
                <button class="btnR text-center" name="valider">VALIDER</button>
            </form>
            
        </div>
    </section>
    <!-- HEADER -->
    <?php include('footer.php') ?>
    <!-- END HEADER -->
    
    <script src="js/script-view.js"></script>
    <script src="js/jsfileSlide.js"></script>
    <script src="js/scriptTabContent.js"></script>
</body>
</html>