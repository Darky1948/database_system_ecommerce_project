

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="thumbnail">
                <img src="<?php echo $m_media->get_media($article->idMedia)->file_path; ?>" alt="ALT NAME" class="img-responsive" />
            </div>
        </div>
        <div class="col-md-6 well">
            <h3><?php echo $article->libelle; ?></h3>
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
                <button class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to cart</button>
            </div>
        </div>
        
    </div>
</div>

<!-- comments -->

<div class="container">
    <div class="row">
        s
    </div>
</div>