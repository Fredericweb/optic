<?php 
include('admin/includes/config.php');
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
    <title>Zooblazo optic</title>
</head>

<body>

  <!-- HEADER -->
  <?php include('header.php') ?>
  <!-- END HEADER -->


    <section class="slide">
        <div class="slider">

            <div class="myslide fade">
                <div class="txt">
                    <h1></h1>
                    <p><br>Même les UCHIWA ONT besoin de lunette </p>
                </div>
                <img src="img/img1.jpg" style="width: 100%; height: 100%;">
            </div>

            <div class="myslide fade">
                <div class="txt">
                    <h1></h1>
                    <p><br>ZOOBLAZO OPTIC recommandé pas van hoheiem ,Alchimist</p>
                </div>
                <img src="img/img2.jpg" style="width: 100%; height: 100%;">
            </div>

            <div class="myslide fade">
                <div class="txt">
                    <h1></h1>
                    <p>Restez Fraîs<br>avec notre nouvelle gamme de lunette de soleil</p>
                </div>
                <img src="img/img3.jpg" style="width: 100%; height: 100%;">
            </div>

            <div class="myslide fade">
                <div class="txt">
                    <h1></h1>
                    <p><br>Marquez la difference avec ZOOBLAZO OPTIC</p>
                </div>
                <img src="img/img4.jpg" style="width: 100%; height: 100%;">
            </div>

            <div class="myslide fade">
                <div class="txt">
                    <h1></h1>
                    <p><br>Restez frais même en été </p>
                </div>
                <img src="img/img5.jpg" style="width: 100%; height: 100%;">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="dotsbox" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>
        </div>
    </section>
    <section class="tabs px-[88px]">
        <p class="exclu">EXCLUSIFS</p>
        <h2 class="tabsTitle">
            Notre Sélection
        </h2>
        <div class="container">
            <div id="tab-1" class="tab-item tab-border ">
                <p class="hide-sm">Lunette Pharmaceutique</p>
            </div>
            <div id="tab-2" class="tab-item">
                <p class="hide-sm">Lunette de Soleil</p>
            </div>
            <div id="tab-3" class="tab-item">
                <p class="hide-sm">Lentille de contact</p>
            </div>
        </div>
    </section>
    <section class="tab-content">
        <div class="container">
            <!-- Tab Content 1 -->
            <div id="tab-1-content" class="tab-content-item show">
                <ul>
                <?php
                    $query=mysqli_query($con,"Select * from  produit where idCategorie='2'");
                    $cpt=0;
                    while($row=mysqli_fetch_array($query) and $cpt<=3)
                    {
                    ?>
                    <li><a href="detailpro.php?pid=<?php echo htmlentities($row['idProd']);?>">
                            <div class="imgL">
                                <img src="admin/postimages/<?php echo htmlentities($row['imgProd'])?>" alt="">
                            </div>
                            <p class="CateProd">
                                Lunette Pharmaceutique
                            </p>
                            <p class="marqueProd">
                                <?php 
                                $idmarq=$row['idMarque'];
                                $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
                                $rowm=mysqli_fetch_array($querym); 
                                echo htmlentities($rowm['libelmarque'])
                                ?>
                            </p>
                            <p class="modelProd">
                                <?php echo htmlentities($row['ModelProd'])?>
                            </p>
                            <p class="priceProd">
                                <?php echo htmlentities($row['priceProd'])?> Fcfa
                            </p>
                        </a>
                    </li>
                    <?php $cpt=$cpt+1; ?>
                    <?php } ?>
                </ul>
            </div>

            <!-- Tab Content 2 -->
            <div id="tab-2-content" class="tab-content-item ">
                <ul>
                <?php
                    $query=mysqli_query($con,"Select * from  produit where idCategorie='3'");
                    $cpt=0;
                    while($row=mysqli_fetch_array($query) and $cpt<=3)
                    {
                    ?>
                    <li><a href="detailpro.php?pid=<?php echo htmlentities($row['idProd']);?>">
                            <div class="imgL">
                                <img src="admin/postimages/<?php echo htmlentities($row['imgProd'])?>" alt="">
                            </div>
                            <p class="CateProd">
                                Lunette de Soleil
                            </p>
                            <p class="marqueProd">
                                <?php 
                                $idmarq=$row['idMarque'];
                                $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
                                $rowm=mysqli_fetch_array($querym); 
                                echo htmlentities($rowm['libelmarque'])
                                ?>
                            </p>
                            <p class="modelProd">
                                <?php echo htmlentities($row['ModelProd'])?>
                            </p>
                            <p class="priceProd">
                                <?php echo htmlentities($row['priceProd'])?> Fcfa
                            </p>
                        </a>
                    </li>
                    <?php $cpt=$cpt+1; ?>
                    <?php } ?>
                </ul>
            </div>


            <!-- Tab Content 3 -->
            <div id="tab-3-content" class="tab-content-item ">
                <ul>
                    <?php
                    $query=mysqli_query($con,"Select * from  produit where idCategorie='4'");
                    $cpt=0;
                    while($row=mysqli_fetch_array($query) and $cpt<=3)
                    {
                    ?>
                    <li><a href="detailpro.php?pid=<?php echo htmlentities($row['idProd']);?>">
                            <div class="imgL">
                                <img src="admin/postimages/<?php echo htmlentities($row['imgProd'])?>" alt="">
                            </div>
                            <p class="CateProd">
                                Lentille de Contact
                            </p>
                            <p class="marqueProd">
                                <?php 
                                $idmarq=$row['idMarque'];
                                $querym=mysqli_query($con,"Select libelmarque  from  Marque where idMarque='$idmarq'");
                                $rowm=mysqli_fetch_array($querym); 
                                echo htmlentities($rowm['libelmarque'])
                                ?>
                            </p>
                            <p class="modelProd">
                                <?php echo htmlentities($row['ModelProd'])?>
                            </p>
                            <p class="priceProd">
                                <?php echo htmlentities($row['priceProd'])?> Fcfa
                            </p>
                        </a>
                    </li>
                    <?php $cpt=$cpt+1; ?>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </section>
    <section class="Pubma">
        <h1 class="">Notre Boutique </h1>
        <h2 class="">Des bons plans mode & optique à découvrir dès à présent !</h2>
        <a href="magasin.html" class="btnR">DECOUVRIR</a>
    </section>
    <Section class="model3D">
        <div class="container3D">
            <div class="box3d">
                <iframe data-src="https://my.matter.co.il/tour/CnTh7DHiSUx" class="lazy loaded" id="mediaElementID"
                    src="https://my.matter.co.il/tour/CnTh7DHiSUx" data-was-processed="true"
                    data-gtm-yt-inspected-1_19="true"></iframe>
            </div>
            <div class="text3d">
                <p class="title">
                    NOUVEAUTÉ
                </p>
                <h1>
                    3D Virtuel en magasins
                </h1>
                <p>
                    Chez Optical Center, nous souhaitons être proche de vous et répondre au mieux a vos besoins. Dans
                    toutes les régions de France et au delà des frontières, nous vous ouvrons ainsi les portes de nos
                    magasins.
                </p>
                <a href="" class="btnR vle">vivre l'experience</a>
            </div>
        </div>
    </Section>
    <section class="avantage" id="service">
        <h3>
            LES AVANTAGES
        </h3>
        <h1>
            Acheter en toute confiance
        </h1>
        <div class="Aitems">
            <div class="Aitem">
                <div class="AitemImg">
                    <img alt="Remboursement mutuelle"
                        data-src="https://i4.optical-center.fr/workspace/medias/images/2020/feature-mutuelle.svg?1615793640"
                        class="loaded"
                        src="https://i4.optical-center.fr/workspace/medias/images/2020/feature-mutuelle.svg?1615793640"
                        data-was-processed="true">
                </div>

                <p>
                    REMBOURSEMENT <br> MUTUELLE
                </p>
            </div>
            <div class="Aitem">
                <div class="AitemImg">
                    <img alt="Garantie 1 an"
                        data-src="https://i5.optical-center.fr/workspace/medias/images/2020/feature-garantie.svg?1615793640"
                        class="loaded"
                        src="https://i5.optical-center.fr/workspace/medias/images/2020/feature-garantie.svg?1615793640"
                        data-was-processed="true">
                </div>
                <p>
                    GARANTIE <br>1AN
                </p>
            </div>
            <div class="Aitem">
                <div class="AitemImg">
                    <img alt="Garantie 1 an"
                        data-src="https://i5.optical-center.fr/workspace/medias/images/2020/feature-garantie.svg?1615793640"
                        class="loaded"
                        src="https://i5.optical-center.fr/workspace/medias/images/2020/feature-garantie.svg?1615793640"
                        data-was-processed="true">
                </div>
                <p>
                    PRIX EXCLUSIFS <br> INTERNET
                </p>
            </div>
        </div>

    </section>
    <section class="consultation">
        <h3>
            PLUS LOIN DANS VOTRE VUE
        </h3>
        <h1>
            PLUS LOIN DANS VOTRE VUE
        </h1>
        <p>
            Bien voir sans lentilles de contact ou sans lunettes est aujourd'hui possible, quelle que soit votre
            correction.
        </p>
        <a href="Rdv.php" class="btnR">Prendre Rendez-Vous</a>
    </section>
    <section class="apropos" id="apropos">
        <div class="ap-title">
            <h1>
                Qui sommes nous ?
            </h1>
        </div>
        <div class="social_links">
            <a href=""
                data-action="share/whatsapp/share" target="_blank"><img
                    src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/whatsapp.png" border="0" alt="Whatsapp"
                    class="loading" data-was-processed="true"></a> <a
                href=""
                target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0"
                    alt="Facebook" class="loading" data-was-processed="true"></a> <a
                href=""
                target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0"
                    alt="Twitter" class="loading" data-was-processed="true"></a> <a
                href=""
                target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/addthis.png" border="0"
                    alt="Addthis" class="loading" data-was-processed="true"></a>
        </div>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur delectus iste deleniti quod, praesentium
            accusantium nulla dolore minus nemo ut sunt inventore saepe quidem dolorum minima labore cumque recusandae
            amet!
            Ratione voluptas minima consequatur voluptatibus laboriosam minus? Suscipit natus, animi hic modi soluta
            eveniet repellat similique facere quibusdam. Ducimus commodi laudantium exercitationem omnis quaerat fugiat
            modi eum ipsam voluptas? Repudiandae.
            Nam est cum commodi aut doloribus, voluptatem fuga repudiandae quisquam odio necessitatibus quo odit quia,
            veniam tempore. Sequi error ipsum ex, voluptatibus quo, laborum, laudantium voluptate incidunt dolores nisi
            repellat.
        </p>
    </section>

<!-- FOOTER -->
<?php include('footer.php') ?>
<!-- END FOOTER-->

    <script src="js/script-view.js"></script>
    <script src="js/jsfileSlide.js"></script>
    <script src="js/scriptTabContent.js"></script>
</body>

</html>