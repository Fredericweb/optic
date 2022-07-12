<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']= array();
}

?>
<header class="shadow-xl">
        <img src="img/logo.png" alt="" class="logo">
        <ul class="navitems">
            <li class="navitem"><a href="presentation.php" class="text-gray-600 hover:text-gray-700">Accueil</a></li>            
            <li class="navitem"><a href="presentation.php#service" class="text-gray-600 hover:text-gray-700">Services</a></li>
            <li class="navitem"><a href="magasin.php?cid=2" class="text-gray-600 hover:text-gray-700">Magasin</a></li>
            <li class="navitem"><a href="Rdv.php" class="text-gray-600 hover:text-gray-700">Consultations</a></li>
            <li class="navitem"><a href="presentation.php#apropos" class="text-gray-600 hover:text-gray-700">A propos</a></li>
        </ul>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart"  data-count="1" id="cart-btn"></div>
        </div>

        <form action="" method="GET" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    

        <div class="shopping-cart">
        <div class="scroll">
        <?php $price=0; ?>
        <?php
            $id = array_values($_SESSION['panier']);
            $id2=array();
            $id1 = array_unique($id);
            array_push($id2,array_values($id1));
            $cpt = array();
            if(empty($id)){
                $panier=array();
            }else{
                $price=0;
                
                foreach($id1 as $values){
                    $queryp=mysqli_query($con,"Select * from  produit where idProd=$values");
                    $panier = mysqli_fetch_array($queryp);
                    ?>
            <div class="box">
                <!-- <a href=""><i class="fas fa-trash"></i></a> -->
                <img src="admin/postimages/<?php echo htmlentities($panier['imgProd']) ?>" alt="">
                <div class="content">
                    <h3><?php echo htmlentities($panier['ModelProd'])?></h3>
                    <span class="price"><?php echo htmlentities($panier['priceProd'])?> fcfa</span>
                    <span class="quantity">qté :                     <?php
                        $keyid = array_keys($id,$panier['idProd']);
                        $cpt = count($keyid);
                        echo $cpt;
                     ?></span>
                </div>
            </div>
            <?php 
                 $price+=$panier['priceProd']*$cpt;
                ?>
            <?php }
            }
            ?>
            </div>
            <div class="total"> total : <?php echo htmlentities($price)?> XOF </div>
            <a href="panier.php" class="btnR">Panier</a>
        </div>
    
    </header>