<?php $this->layout('herencia', ['title' => $article->title]) ?>

<h2><?=$this->e($article->title)?></h2>
<article>
    <?=$this->e($article->content)?>
</article>