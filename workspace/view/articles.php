
<div class="container">
    <!-- searching articles -->
    <div class="page-header">
        <h1>Searching some articles</small></h1>
        <div class="input-group col-md-12">
            <form action="" method="POST" >
                <span class="input-group-btn">
                    <input type="text" id="articleSearch" name="articleSearch" class="form-control input-lg" placeholder="Search..." />
                    <button class="btn btn-search-form btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </form>
        </div>
    </div>
    <!-- contents -->
    <div class="row">
        <?php 
            if(isset($articles) && empty($articles)) {
                echo '<div class="col-md-12"><h3>No article found...</h3></div>';
            } else {
                foreach ($articles as $article) {
                    ?>
                        <div class="col-md-6">
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
                }
            }
        ?>
    </div>
    
    
    <?php
        if(!isset($search)) {
    ?>
            <!-- pagination -->
            <div class="row">  
                <ul class="pager">
                    <?php if($num_page > 1) echo '<li class="previous"><a href="' . ADRESSE_ABSOLUE_URL . 'articles/'.($num_page - 1).'"><span aria-hidden="true">&larr;</span>previous</a></li>'; ?>

                    <?php if(isset($articles) && !empty($articles)) { echo '<li class="next"><a href="'  . ADRESSE_ABSOLUE_URL . 'articles/'.($num_page + 1).'">next<span aria-hidden="true">&rarr;</span></a></li>';} ?>
                </ul>
            </div>
    <?php    
        }
    ?>
</div><!-- ~/ container -->