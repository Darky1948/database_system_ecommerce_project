

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="thumbnail">
                <img src="<?php echo $m_media->get_media($article->idMedia)->file_path; ?>" alt="ALT NAME" class="img-responsive" />
            </div>
        </div>
        <div class="col-md-6">
            <h3><?php echo $article->libelle; ?></h3>
            <div class="col-md-12">
                <button class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to cart</button>
            </div>
        </div>
        
    </div>
</div>