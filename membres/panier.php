<?php
require_once "header.php";
?>

<div id="container-panier" class="container">
    <div class="row">
        <div class="col-12 col-lg-8 pr-lg-1 mb-2 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <card class="card-text">
                        <div class="py-2 bold">MON PANIER</div>
                    </card>
                    <hr class="dropdown-divider">
                    <card class="card-text d-flex row">
                        <div class="col-12 col-lg-4">
                            <div id="image-produit-panier"></div>
                        </div>
                        <div class="card-body col-12 col-lg-8 d-flex flex-column">
                            <div class="card-text text-gris my-2">Prix</div>
                            <div class="card-text text-gris my-2">Nom du voyage</div>
                            <div class="card-text my-2">
                                <div class="text-gris">Récapitulatif :</div>
                                <div class="ml-3">- Voyage de A vers B sur 2 jours</div>
                                <div class="ml-3">- Voyage de B vers C sur 2 jours</div>
                                <div class="ml-3">- Voyage de C vers D sur 2 jours</div>
                            </div>
                            <div class="card-text my-2 d-flex align-items-center">
                                <div class="text-gris">Nombre de voyageur(s) : 1 </div>
                                <button class="panier-quantite ml-2">-</button>
                                <button class="panier-quantite ml-1">+</button>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="card-text">Sauvegarder le voyager sans le réserver</div>
                        </div>
                    </card>
                    <hr class="dropdown-divider">
                    <card class="card-text">
                        <div class="d-flex justify-content-end py-2">
                            <div class="bold">TOTAL :</div>
                            <div class="bold ml-4">XX,XX €</div>
                        </div>
                    </card>
                </div>
            </div>
        </div>
        <div id="card-paiement" class="col-12 col-lg-4 pl-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-text bold py-2">TOTAL</div>
                    <div class="card-text py-2">
                        <div class="d-flex justify-content-between">
                            <div>VOYAGE 1</div>
                            <div>xx.xx €</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>livraison</div>
                            <div><i class="far fa-question-circle"></i></div>
                        </div>
                    </div>
                    <hr class="dropdown-divider">
                    <div class="card-text">
                        <form action="" class="py-2">
                            <button id="btn-valider-panier" type="submit" >VALIDER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "../membres/footer.php";
?>
