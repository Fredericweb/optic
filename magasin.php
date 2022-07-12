
<?php 
include("admin/includes/config.php"); 

$catid=intval($_GET['cid']);

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
    <title>Magazin</title>
</head>

<body>
    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- CATEGORIE SIDE BAR -->
    <div class="side-bar">
            <a href="magasin.php?cid=2">
                <div class="icon">
                        <div class="text">
                            <p>
                                Lunette Pharmaceutique
                            <p>
                        </div>
                        <div class="icon-items">
                            <h1>
                                LP
                            </h1>
                        </div>
                </div>
            </a>
            <a href="magasin.php?cid=3">
                <div class="icon">
                        <div class="text">
                            <p>
                                Lunette de Soleil
                            <p>
                        </div>
                        <div class="icon-items">
                            <h1>
                                LS
                            </h1>
                        </div>
                </div>
            </a>
            <a href="magasin.php?cid=4">
                <div class="icon">
                        <div class="text">
                            <p>
                                Lentille de Contact
                            <p>
                        </div>
                        <div class="icon-items">
                            <h1>
                                LC
                            </h1>
                        </div>
                </div>
            </a>
        </div>
   
    <!-- END CATEGORIE -->
    <?php 
    $query=mysqli_query($con,"Select * from  categorie where idCategorie='$catid'");
    $row=mysqli_fetch_array($query);
    ?>

    <div class="categorie-banner">
        <h1>
        <?php echo htmlentities($row['libelCategorie']);?>
        </h1>
        <p>
            Les plus belles lunettes de vue en ligne et au meilleur prix. Explorez notre collection de lunettes de vue
            pour femmes de grandes marques, notamment Ray-Ban, Prada, Chanel, et plus encore…
        </p>
    </div>
    <section class="tab-content">
        <div class="container">
            <!-- Tab Content 1 -->
            <div id="tab-1-content" class="tab-content-item show">
                <ul>
                <?php
                    $query1=mysqli_query($con,"Select * from  produit where idCategorie='$catid'");
                    while($row1=mysqli_fetch_array($query1))
                    {
                    ?>
                    <li><a href="detailpro.php?pid=<?php echo htmlentities($row1['idProd']);?>">
                       
                            <?php
                            if($row1['qteProd']==0){
                                echo ( "<span>EN STOCK</span>");
                            }
                            if($row1['qteProd']<=10 && $row1['qteProd']>=1){
                                echo ("<span>LIMITE</span>");
                            }
                            ?>
                        
                            <div class="imgL">
                                <img src="admin/postimages/<?php echo htmlentities($row1['imgProd'])?>" alt="">
                            </div>
                            <p class="CateProd">
                                <?php echo htmlentities($row['libelCategorie']);?>
                            </p>
                            <p class="marqueProd">
                                <?php 
                                    $idmarq=$row1['idMarque'];
                                    $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
                                    $rowm=mysqli_fetch_array($querym); 
                                    echo htmlentities($rowm['libelmarque'])
                                ?>
                            </p>
                            <p class="modelProd">
                                <?php echo htmlentities($row1['ModelProd']);?>
                            </p>
                            <p class="priceProd">
                                <?php echo htmlentities($row1['priceProd']);?> Fcfa
                            </p>
                        </a>
                    </li>
                    <?php } ?>    
                </ul>
            </div>

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