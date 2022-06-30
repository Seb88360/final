<?php foreach ($articles as $article) : ?>
    
    <div id="blocArticle">
        <h2><?= $article['title'] ?></h2>
        <small>Ecrit le <?= $article['created_at'] ?></small>
        <p><?= $article['introduction'] ?></p>

        <div id="divLireSupp">
            <a class="lireSupp" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite...</a>
            <a class="lireSupp" href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
        </div>
    </div>
<?php endforeach ?>