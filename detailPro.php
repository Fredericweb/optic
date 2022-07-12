<?php 
include('admin/includes/config.php');
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['panier'])){
  $_SESSION['panier'] = array();
  $_SESSION['panier']['qte']=array();
}

if(isset($_GET['pid'])){
  $proid=intval($_GET['pid']);
  $query=mysqli_query($con,"Select * from  produit where idProd='$proid'");
  $row=mysqli_fetch_array($query);
}
if(isset($_GET['action']) && $_GET['action']=='add' && $row['qteProd']>0){
  $id=$row['idProd'];
  array_push($_SESSION['panier'],intval($id));
}
if(isset($_GET['action']) && $_GET['action']=='add' && $row['qteProd']<=0){
  echo "rupture du stock";
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
  <link rel="stylesheet" href="css/detail.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Detail produit</title>
</head>

<body>
   <!-- HEADER -->
   <?php include('header.php') ?>
   <!-- END HEADER -->
  <section class="detail">
    <div class="img">
      <img src="admin/postimages/<?php echo htmlentities($row['imgProd'])?>" alt="">
    </div>
    <div class="info">
      <p class="model">
        <?php echo htmlentities($row['ModelProd'])?>
      </p>
      <div class="marque">
        <H1>
          <?php 
              $idmarq=$row['idMarque'];
              $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
              $rowm=mysqli_fetch_array($querym); 
              echo htmlentities($rowm['libelmarque'])
          ?>
        </H1>
      </div>
      <div class="product-details__rating">
        <img src="https://i2.optical-center.fr/workspace/medias/images/2020/star.svg?1615793638" alt="" title=""
          class="loading" data-was-processed="true">
        <img src="https://i2.optical-center.fr/workspace/medias/images/2020/star.svg?1615793638" alt="" title=""
          class="loading" data-was-processed="true">
        <img src="https://i2.optical-center.fr/workspace/medias/images/2020/star.svg?1615793638" alt="" title=""
          class="loading" data-was-processed="true">
        <img src="https://i2.optical-center.fr/workspace/medias/images/2020/star.svg?1615793638" alt="" title=""
          class="loading" data-was-processed="true">
        <img src="https://i2.optical-center.fr/workspace/medias/images/2020/star-half.svg?1622735626" alt="" title=""
          class="loaded" data-was-processed="true">
      </div>
      <h2 class="price">
        <?php echo htmlentities($row['priceProd'])?> Fcfa
      </h2>
      <a href="detailPro.php?pid=<?php echo htmlentities($row['idProd']);?>&&action=add" onclick="return confirm('voulez vous ajouter au panier?')" class="btnR ap">
        AJOUTER AUX PANIER
      </a>
      <a href="panier.php" class="inversebtn vc">
        VALIDER LA COMMANDE
      </a>
    </div>
  </section>

  <!-- FOOTER -->
  <?php include('footer.php') ?>
  <!-- END FOOTER-->
    <script src="js/script-view.js"></script>
    <script src="js/jsfileSlide.js"></script>
    <script src="js/scriptTabContent.js"></script>
</body>

</html>