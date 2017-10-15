<?php
    if(empty($orders)) {
?>
<div class="container" style="width:30%;">
    <div class="row">
        <p>You don't have any order yet.</p>
    </div>
</div>
<?php
    } else {
        
        foreach ($orders as $order) {
            // Objects
            $article = $m_article->get_article($order->idArticle);
            $media = $m_media->get_media($article->idMedia);
            $articleType = $m_articleType->get_article_type($article->idType);
            $brand = $m_brand->get_brand($article->idBrand);
?>
        <div class="container">
            <div class="row col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order id</th>
                            <th>Quantity</th>
                            <th>Article</th>
                            <th>Photo</th>
                            <th>Ordering date</th>
                        </tr>
                    </thead>
                        <tr>
                            <td><?php echo $order->idOrder; ?></td>
                            <td><?php echo $order->quantity; ?></td>
                            <td><?php echo $article->libelle; ?> - <?php echo $articleType->libelle; ?> - <?php echo $brand->brand_name; ?></td>
                            <td><img src="<?php echo $media->file_path; ?>" alt="ALT NAME" style="height:auto; width: 40%;"/></td>
                            <td><?php echo $order->Ordering_date; ?></td>
                        </tr>
                </table>
            </div>
        </div>
    <?php
        }   // End of the foreach
    ?>

<?php
    } // end of the else
?>