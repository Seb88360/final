<div id="blocArticleArticle">
    <h1><?= $article['title'] ?></h1>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p><?= $article['introduction'] ?></p>
    <hr>
    <?= $article['content'] ?>
</div>

<?php if (count($commentaires) === 0) : ?>
    <h2 class='comm'>Il n'y a pas encore de commentaires pour cet article ... Soyez le premier !</h2>
<?php else : ?>
    <h2 class='comm'>Il y a déjà <?= count($commentaires) ?> réaction(s) : </h2>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3><?= $commentaire['author'] ?></h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete?id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Vous voulez réagir ? N'hésitez pas!</h3>
    <input type="text" name="author" placeholder="Votre pseudo !">
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    <button>Commenter !</button>
</form>