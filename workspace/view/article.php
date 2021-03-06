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
        <div class="col-md-6">
            <div class="thumbnail">
                <img src="<?php echo $m_media->get_media($article->idMedia)->file_path; ?>" alt="ALT NAME" class="img-responsive" />
            </div>
        </div>
        <div class="col-md-6 well">
            <h3><?php echo $article->libelle; ?></h3><p><small>The <?php echo $article->reg_date; ?></small></p>
            <div class="col-md-6">
                <p>Price : <?php echo $article->price; ?> $</p>
                <p>Size : <?php echo $article->article_size; ?></p>
                <p>Color : <?php echo $article->color; ?></p>
                <p>Stock : <?php echo $article->quantity; ?></p>
            </div>
            <div class="col-md-6">
                 <p>Brand : <?php echo $m_brand->get_brand($article->idBrand)->brand_name; ?></p>
                 <p>Type : <?php echo $m_articleType->get_article_type($article->idType)->libelle; ?></p>
            </div>
            
            <div class="col-md-12">
                <form role="form" id="cart-form" name="cart-form" class="form" action="" method="POST">
                    <div class="form-group">
                        <label for="sel1">Select a quantity :</label>
                        <select class="input-xlarge" id="quantity" name="quantity">
                            <?php
                                $quantity = $article->quantity;
                                for ($index = 1; $index <= $quantity; $index++) {
                                    echo '<option>'.$index.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="idArticle" id="idArticle" value="<?php echo $article->idArticle; ?>">
                    <?php if($_SESSION['id'] == -1) { echo '<p style="color:red;">You have to be connected to purschase a product.</p>'; } ?>
                    <button type="submit" class="btn btn-success"  <?php if($_SESSION['id'] == -1) { echo 'disabled'; } ?>><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to cart</button>
                </form>
            </div>
        </div>
        
    </div>
</div>

<!-- comments -->

<div class="container">
    
    <!-- form -->
    <form role="form" id="contact-form" class="contact-form" action="" method="POST">
        <div class="row well">
            <div class="col-md-12">
                 <?php if($_SESSION['id'] == -1) { echo '<p style="color:red;">You have to be connected to comment this product.</p>'; } ?>
                <div class="form-group">
                    <textarea class="form-control textarea" rows="3" name="message" id="message" placeholder="Message" <?php if($_SESSION['id'] == -1) { echo 'disabled'; } ?>></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-info pull-right" <?php if($_SESSION['id'] == -1) { echo 'disabled'; } ?>>Leave a comment</button>
            </div>
        </div>
    </form>
    
    <!-- commentaires -->
    <?php
        $comments = $m_comment->get_comments_by_article($article->idArticle);
        foreach ($comments as $comment) {
    ?>
            <div class="row well">
                <div class="comment-box">
                    <h4 class="title"><?php echo $m_customer->get_customer($comment->idCustomer)->firstname . ' ' . $m_customer->get_customer($comment->idCustomer)->lastname; ?> <small>The <?php echo $comment->reg_date; ?></small></h4>
                    <p><?php echo $comment->text; ?>
                </div>
            </div>
    <?php
        } // end of the for
    ?>
</div>