<?php empty($articles) ? redirect('page-not-found') : ''; ?>
<?php foreach ($articles as $article): ?>
    <?php echo $article->article_title . '<br>'; ?>
<?php endforeach; ?>