<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($c_cart->creatingCart()) {
                            $nbArticles = count($_SESSION['cart']['productId']);

                            if($nbArticles <= 0) {
                                echo '<tr><td>Your cart is empty !</td></tr>';
                                echo '<tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <a href="' .ADRESSE_ABSOLUE_URL . 'articles' . '" type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-shopping-cart"></span> Go to the shop
                                            </a>
                                        </td>
                                    </tr>';
                            } else {
                                for ($i=0 ;$i < $nbArticles ; $i++) {
                                    $article = $m_article->get_article($_SESSION['cart']['productId'][$i]);
                                    $quantity = $_SESSION['cart']['productQuantity'][$i];
                                    $price = $_SESSION['cart']['productPrice'][$i];
                                ?>
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media">
                                                <a class="thumbnail pull-left" href="#"><img class="media-object" src="<?php echo $m_media->get_media($article->idMedia)->file_path; ?>" style="width: 72px; height: 72px;"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><?php echo $article->libelle; ?></h4>
                                                    <h5 class="media-heading"> by <?php echo $m_brand->get_brand($article->idBrand)->brand_name; ?></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                            <?php echo $quantity; ?>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $price; ?></strong></td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $price*$c_cart->countArticles($article->idArticle); ?></strong></td>
                                        <td class="col-sm-1 col-md-1">  
                                            <form action="" method="POST">
                                                <input type="hidden" name="idArticle" value="<?php echo $article->idArticle; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                } // end of the for
                                ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h5>Subtotal</h5></td>
                                    <td class="text-right"><h5><strong>$<?php echo $c_cart->globalAmount(); ?></strong></h5></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h5>Estimated shipping</h5></td>
                                    <td class="text-right"><h5><strong>$<?php echo ESTIMATED_SHIPPING; ?></strong></h5></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h3>Total</h3></td>
                                    <td class="text-right"><h3><strong>$<?php echo $c_cart->globalAmount()+ESTIMATED_SHIPPING; ?></strong></h3></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <a href="<?php echo ADRESSE_ABSOLUE_URL . 'articles'?>" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                    </a></td>
                                    <td>
                                    <a href="<?php echo ADRESSE_ABSOLUE_URL . 'checkout'?>" type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </a></td>
                                </tr>
                        <?php
                            } // end of the if statement
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>