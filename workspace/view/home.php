<!-- Best sellings -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Last articles </h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($lastArticles as $lastArticle) { ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $m_media->get_media($lastArticle->idMedia)->file_path; ?>" alt="" class="img-responsive">
                    <div class="caption">
                        <h4 class="pull-right"><?php echo $lastArticle->price . '$'; ?></h4>
                        <h4><a href="#"><?php echo $m_articleType->get_article_type($lastArticle->idType)->libelle; ?> Product</a></h4>
                        <p><?php echo $lastArticle->libelle; ?></p>
                    </div>
                    <p align="center"><a href="<?php echo ADRESSE_ABSOLUE_URL . 'article/' . $lastArticle->idArticle; ?>" class="btn btn-primary btn-block">Open</a>
                </div>
            </div>
        <?php
            } // end of the foreach
        ?>      
    </div><!-- */ row -->
</div><!-- */ container -->


<?php
    // listing article by types
    foreach ($articlesType as $articleType) {
?>
    <div class="container ">
        <div class ="row">
            <div class="col-md-12">
                <h2><?php echo $articleType->libelle; ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
                // Browsing all articles of this type
                $articles = $m_article->get_article_by_type($articleType->idType);
                foreach ($articles as $article) {
            ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                            <img src="<?php echo $m_media->get_media($article->idMedia)->file_path; ?>" alt="ALT NAME" class="img-responsive" />
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $article->price . '$'; ?></h4>
                                <h4><a href="#"><?php echo $m_articleType->get_article_type($article->idType)->libelle; ?> Product</a></h4>
                                <p><?php echo $article->libelle; ?></p>
                                <p align="center"><a href="<?php echo ADRESSE_ABSOLUE_URL . 'article/' . $article->idArticle; ?>" class="btn btn-primary btn-block">Open</a>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                } // end of the foreach
            ?>
        </div>
    </div>
<?php
    } // end of the foreach
?>