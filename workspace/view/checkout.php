<?php
    if(isset($return) && $return != -1) {
?>
        <!-- Error -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $return_codes[$return]; ?></strong>
                      </div>
                </div>
            </div>
        </div>
<?php
    }
?>
<div class="container"> 
    <div class="row">
        <form class="form-horizontal" method="POST" action="">
            <!--REVIEW ORDER-->
            <div class="col-md-6 col-md-push-6">
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
                                            <td class="col-sm-1 col-md-1"></td>
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
                            <?php
                                } // end of the if statement
                            }
                        ?>
                    </tbody>
                </table>
            </div><!--REVIEW ORDER END-->
            
            <!--SHIPPING METHOD-->
            <div class="col-md-6 col-md-pull-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Country:</strong></div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="country" value="<?php echo $customer->country; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <strong>First Name:</strong>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $customer->firstname; ?>" />
                            </div>
                            <div class="span1"></div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Last Name:</strong>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $customer->lastname; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" value="<?php echo $customer->adresse; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>City:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" value="<?php echo $customer->city; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="zip_code" class="form-control" value="<?php echo $customer->postalcode; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Phone Number:</strong></div>
                            <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="<?php echo $customer->phone; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email Address:</strong></div>
                            <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="<?php echo $customer->email; ?>" /></div>
                        </div>
                    </div>
                </div>
                <!--SHIPPING METHOD END-->
                
                <!--CREDIT CART PAYMENT-->
                <div class="panel panel-info">
                    <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card Type:</strong></div>
                            <div class="col-md-12">
                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                    <option value="5">Visa</option>
                                    <option value="6">MasterCard</option>
                                    <option value="7">American Express</option>
                                    <option value="8">Discover</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="car_number" maxlength="16"/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Card CVV:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="car_code" maxlength="3"/></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Expiration Date</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="">
                                    <option value="">Month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                            </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="">
                                    <option value="">Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span>Pay secure using your credit card.</span>
                            </div>
                            <div class="col-md-12">
                                <ul class="cards">
                                    <li class="visa hand">Visa</li>
                                    <li class="mastercard hand">MasterCard</li>
                                    <li class="amex hand">Amex</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CREDIT CART PAYMENT END-->
            </div>
        </form>
    </div>
</div>