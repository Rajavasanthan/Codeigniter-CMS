<?php

echo !empty($articles->article_body) ? $articles->article_body : redirect('page-not-found');
?>