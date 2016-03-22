<?php
$idarticle = $_GET['idarticle'];
$sql_article = mysql_query("SELECT * FROM article WHERE idarticle = '$idarticle'")or die(mysql_error());
$article = mysql_fetch_array($sql_article);
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edition de l'article - <?= html_entity_decode($article['designation']); ?></h4>
</div>
<form class="form-horizontal form-bordered" action="" method="post">
    <div class="modal-body">
        <input type="hidden" name="idarticle" value="<?php echo $article['idarticle']; ?>" />

        <div class="form-group">
            <label class="col-md-3 control-label" for="example-text-input">Designation de l'article</label>
            <div class="col-md-9">
                <input type="text" id="example-text-input" name="designation" class="form-control" value="<?= html_entity_decode($article['designation']); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-textarea-input">Description de l'article</label>
            <div class="col-md-9">
                <textarea id="example-textarea-input" name="description" rows="9" class="form-control"><?= html_entity_decode($article['description']); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="val_number">Prix Unitaire</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="val_number" name="prix_unitaire" class="form-control" value="<?= $article['prix_unitaire']; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="submit" class="btn btn-success" name="action" value="edit-article"><i class="fa fa-check"></i> Valider</button>
    </div>
</form>
