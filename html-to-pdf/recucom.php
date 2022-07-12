

<?php
   
 include ('../admin/includes/config.php');
  if(isset($_GET['numcom'])){
      $numcom = intval($_GET['numcom']);
  }
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Reçu de commande</title>
  <link rel="stylesheet" href="style-pdf.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> Telecharger</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">
                                    <span class="logoname">ZOBLAZO <br> OPTIC</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Reçu de commande</h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Du: <span class="font-weight-semibold">
                                                <?php 
                                                $com=mysqli_query($con,"select * from com where numcom='$numcom'");
                                                    $resultcom=mysqli_fetch_array($com);
                                                    echo $resultcom['datecom'];
                                                ?>
                                            </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            
                            <div class="mb-2 ml-auto">
                            
                                <div class="d-flex flex-wrap wmin-md-400">
                                   
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <center><img src="../img/qrcode/<?=$numcom?>.png" alt=""></center>
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Categorie</th>
                                    <th>Marque</th>
                                    <th>Quatité</th>
                                    <th>Prix unitaire</th>
                                    <th>Prix Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
$query=mysqli_query($con,"Select * from detailcom where numcom='$numcom'");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr><tr>
<?php 
} else {
    $totalt=array();
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php 
$idprod=$row['idProd'];
$queryp=mysqli_query($con,"Select * from produit where idProd='$idprod'");
$rowp=mysqli_fetch_array($queryp);
echo htmlentities($rowp['ModelProd']);?>
</b></td>

<td><b><?php 
$idcate = $rowp['idCategorie'];
$queryc=mysqli_query($con,"Select libelCategorie from categorie where idCategorie='$idcate'");
$rowc=mysqli_fetch_array($queryc);
echo htmlentities($rowc['libelCategorie']);
?></b></td>

<td><b><?php 
$idmarq = $rowp['idMarque'];
$querym=mysqli_query($con,"Select libelmarque from marque where idMarque='$idmarq'");
$rowm=mysqli_fetch_array($querym);
echo htmlentities($rowm['libelmarque']);
?></b></td>

<td><b><?php echo htmlentities($row['qtecom']);?></b></td>
<td><b><?php echo htmlentities($rowp['priceProd']);?></b></td>

<td><?php
$ttc=$row['qtecom']*$rowp['priceProd'];
echo htmlentities($ttc);
array_push($totalt,$ttc);
?></td>

<?php } }?>
                                
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer"> <span class="text-muted">
                            veulliez vous rendre à l'agence la plus proche muni de ce reçu pour finaliser le payement
                    </span> </div>
                    <div class="card-footer">  
                        <h5 class="my-2">Total TTc: <?php echo array_sum($totalt) ?> Fcfa</h5> 
                        <div class="tdc">
                            <div class="dc">
                            
                            </div>
                            <div class="dc">
                           
                            </div>
                        </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- partial -->
  <script  src="script-pdf.js"></script>

</body>
</html>

