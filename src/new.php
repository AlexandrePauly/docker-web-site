<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("php/head.php");
?>

<body>
    <!-- Inclusion du header -->
    <?php
        include("php/header.php");
    ?>

    <!-- Contenu de page -->
    <section id="pageContent">
        <!-- Inclusion du du menu latéral -->
        <?php
            include("php/main.php");
        ?>
        
        <!-- Partie droite - Contenu de la page -->
        <aside id="rightCol">
            <div id="rightCol-top">
                <h1 id="title">Nouveautés</h1>
                
                <!-- Bouton pour afficher le stock -->
                <button id="afficherStock" onclick="afficherStock()">Afficher le stock</button>

                <!-- Bouton pour vider le panier -->
                <button id="viderPanier" onclick="viderPanier()">Vider le panier</button>
            </div>

            <div id="plot-box">
                <div class="article">
                    <div class="box">
                        <img src="img/Vetements/vetement-14.jpg" alt="Vêtement">
                    </div>
                    <p>Veste en jean</p>
                    <p>99.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(1)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(1)">-</button>

                        <!-- Tailles -->
                        <form>
                        <label for="size">Taille :</label>
                        <select name="size" class="size" onchange="maj(1)">
                            <option value="0">XS</option>
                            <option value="0">S</option>
                            <option value="0">M</option>
                            <option value="0">L</option>
                            <option value="0">XL</option>
                        </select>
                        </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(1)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Vetements/vetement-12.jpg" alt="Vêtement">
                    </div>
                    <p>Tee-shirt basic</p>
                    <p>44.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(2)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(2)">-</button>

                        <!-- Tailles -->
                        <form>
                        <label for="size">Taille :</label>
                        <select name="size" class="size" onchange="maj(2)">
                            <option value="2">XS</option>
                            <option value="1">S</option>
                            <option value="3">M</option>
                            <option value="2">L</option>
                            <option value="1">XL</option>
                        </select>
                        </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(2)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Vetements/vetement-8.jpg" alt="Vêtement">
                    </div>
                    <p>Col roulé blanc</p>
                    <p>49.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(3)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(3)">-</button>

                        <!-- Tailles -->
                        <form>
                        <label for="size">Taille :</label>
                        <select name="size" class="size" onchange="maj(3)">
                            <option value="2">XS</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="2">L</option>
                            <option value="1">XL</option>
                        </select>
                        </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(3)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Vetements/vetement-6.jpg" alt="Vêtement">
                    </div>
                    <p>Hoodie oversize</p>
                    <p>62.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(4)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(4)">-</button>

                        <!-- Tailles -->
                        <form>
                        <label for="size">Taille :</label>
                        <select name="size" class="size" onchange="maj(4)">
                            <option value="1">XS</option>
                            <option value="1">S</option>
                            <option value="5">M</option>
                            <option value="2">L</option>
                            <option value="1">XL</option>
                        </select>
                        </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(4)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Chaussures/chaussures-1.jpg" alt="Chaussures">
                    </div>
                    <p>Converse</p>
                    <p>70.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(5)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(5)">-</button>

                        <!-- Tailles -->
                        <form>
                            <label for="size">Taille :</label>
                            <select name="size" class="size" onchange="maj(5)">
                                <option value="3">40</option>
                                <option value="0">41</option>
                                <option value="3">42</option>
                                <option value="2">43</option>
                                <option value="0">44</option>
                                <option value="0">45</option>
                            </select>
                            </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(5)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Chaussures/chaussures-10.jpg" alt="Chaussures">
                    </div>
                    <p>Nike Air Jordan 1</p>
                    <p>129.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(6)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(6)">-</button>

                        <!-- Tailles -->
                        <form>
                            <label for="size">Taille :</label>
                            <select name="size" class="size" onchange="maj(6)">
                                <option value="3">40</option>
                                <option value="0">41</option>
                                <option value="1">42</option>
                                <option value="2">43</option>
                                <option value="1">44</option>
                                <option value="1">45</option>
                            </select>
                        </form>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(6)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Accessoires/casquette-3.jpg" alt="Casquette">
                    </div>
                    <p>Casquette</p>
                    <p>70.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(16)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(16)">-</button>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" value="0" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(16)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Accessoires/montre-1.jpg" alt="Montre">
                    </div>
                    <p>Montre Tommy Hilfiger</p>
                    <p>298.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(8)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(8)">-</button>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" value="3" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(8)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
                <div class="article">
                    <div class="box">
                        <img src="img/Accessoires/montre-6.jpg" alt="Montre">
                    </div>
                    <p>Montre Festina</p>
                    <p>180.00€</p>

                    <div>
                        <!-- Bouton + -->
                        <button class="addQty" onclick="addToCart(9)">+</button>

                        <!-- Champ de quantité -->
                        <input type="number" class="quantity" value="0" readonly>

                        <!-- Bouton - -->
                        <button class="addQty" onclick="removeFromCart(9)">-</button>
                        
                        <div class="stock-panier">
                            <!-- Champ de stock -->
                            <input class="stock stockQuantity" type="number" value="1" readonly>

                            <!-- Ajouter au panier -->
                            <button class="addPanier" onclick="ajouterAuPanier(9)">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>   

            <!-- Affichage en grand des images -->
            <figure id="imgExpand"><img src="" alt=""></figure>
        </aside>
        
        <!-- Inclusion de la flèche pour remonter au menu -->
        <?php
            include("php/back-to-top.php"); 
        ?>
    </section>

    <!-- Inclusion du footer -->
    <?php
        include("php/footer.php"); 
    ?>
</body>