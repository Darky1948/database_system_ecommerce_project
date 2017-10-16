<div class="container">
    <div class="row">
        <div class="col-xs-12">
        	<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $first_name . ' ' . $last_name; ?><br>
    					<?php echo $address; ?><br>
    					<?php echo $city; ?><br>
    					<?php echo $country . ' ' . $zip_code; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $first_name . ' ' . $last_name; ?><br>
    					<?php echo $address; ?><br>
    					<?php echo $city; ?><br>
    					<?php echo $country . ' ' . $zip_code; ?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa <?php echo $car_number; ?><br>
    					<?php echo $email_address; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php 
                                        date_default_timezone_set('Australia/Melbourne');
                                        $date = date('m/d/Y h:i:s a', time()); 
                                        echo $date; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $totalAmount = 0;
                                foreach ($orders as $order) {
                                    $article = $m_article->get_article($order->idArticle);
                            ?>
                                    <tr>
                                        <td><?php echo $article->libelle; ?></td>
                                        <td class="text-center">$<?php echo $article->price; ?></td>
                                        <td class="text-center"><?php echo $order->quantity; ?></td>
                                        <td class="text-right">$<?php $totalAmount += $order->quantity*$article->price; echo $order->quantity*$article->price; ?></td>
                                    </tr>
                            <?php
                                } // end of the foreach
                            ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h5>Subtotal</h5></td>
                                    <td class="text-right"><h5><strong>$<?php echo $totalAmount; ?></strong></h5></td>
                                </tr>
                                <tr>
                                   
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h5>Estimated shipping</h5></td>
                                    <td class="text-right"><h5><strong>$<?php echo ESTIMATED_SHIPPING; ?></strong></h5></td>
                                </tr>
                                <tr>
                                    
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h3>Total</h3></td>
                                    <td class="text-right"><h3><strong>$<?php echo $totalAmount+ESTIMATED_SHIPPING; ?></strong></h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>