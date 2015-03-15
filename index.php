<?php include('header.php'); ?>
<?php include('caroussel.php'); ?>
<?php include('navigation.php'); ?>
    <!-- Page Content -->
    <div class="container home">

        <div class="row background1" style="margin: 0px">
            <div class="col-md-4 center">Produits Frais</div>
            <div class="col-md-4 center">Livraison en 48h</div>
            <div class="col-md-4 center">Lorem ipsum</div>
        </div>
        <div class="row">

            <div class="col-md-2">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-10">

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-3" style="min-height: 400px">
                        <?php
                        try
                        {
                            $bdd = new PDO('mysql:host=localhost;dbname=panier-frais;charset=utf8', 'root', 'root');
                        }
                        catch(Exception $e)
                        {
                                die('Erreur : '.$e->getMessage());
                        }
                        $reponse = $bdd->query('SELECT CDART, LIBART, PXTTCART, QTLCOM, URLART, THUMBART FROM SAIPAN01E ORDER BY CDART DESC LIMIT 0, 10');

                        while ($donnees = $reponse->fetch())
                        {
                            echo '<form action="panier.php" method="post">';
                            echo '<div class="bloc" id="' . htmlspecialchars($donnees['CDART']) . '">';
                            echo '<div class="thumbnail">';
                            echo '<img src="../images/'.htmlspecialchars($donnees['THUMBART']).'" alt="'.htmlspecialchars($donnees['THUMBART']).'">';
                            echo ' <div class="caption">
                                <h4 class="pull-right">'. htmlspecialchars($donnees['PXTTCART']) . '€</h4>
                                <h4><a href="' . htmlspecialchars($donnees['URLART']) . '"> ' . htmlspecialchars($donnees['LIBART']) . '</a></h4>
                                <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                                </div>
                                <div class="desc-pdt"><p>See more snippets like this online store item at</p>
                                <label for="quantity">Quantité : </label><select name="quantity" id="quantity"><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option></select></div>
                                <div class="pull-right icone">
                                <input type="submit" name="envoyer" /></div>
                                </form>
                            </div>
                               </div>
                    </div>';
                        }
                        $reponse->closeCursor();
                        ?>

                    <div class="col-sm-4 col-lg-4 col-md-3">
                        
                    </div>

                </div>

            </div>

        </div>

    </div>
<?php include('footer.php'); ?>
