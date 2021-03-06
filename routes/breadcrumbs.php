<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('ホーム', route('article'));
});

// Home > Word
Breadcrumbs::register('word', function ($breadcrumbs,$word) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($word->text.'に関する記事一覧', route('article.word',$word->id));
});

// Home > [article] 
Breadcrumbs::register('page', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($article->title, route('article.page', $article->id));
});

// Home > [article] > list
Breadcrumbs::register('list', function ($breadcrumbs,$article) {
    $breadcrumbs->parent('page',$article);
    $breadcrumbs->push('関連記事一覧', route('article.list',$article->id));
});

// Home
Breadcrumbs::register('amp.home', function ($breadcrumbs) {
    $breadcrumbs->push('ホーム', route('amp.article'));
});

// Home > Word
Breadcrumbs::register('amp.word', function ($breadcrumbs,$word) {
    $breadcrumbs->parent('amp.home');
    $breadcrumbs->push($word->text.'に関する記事一覧', route('amp.article.word',$word->id));
});

// Home > [article] 
Breadcrumbs::register('amp.page', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('amp.home');
    $breadcrumbs->push($article->title, route('amp.article.page', $article->id));
});

// Home > [article] > list
Breadcrumbs::register('amp.list', function ($breadcrumbs,$article) {
    $breadcrumbs->parent('amp.page',$article);
    $breadcrumbs->push('関連記事一覧', route('amp.article.list',$article->id));
});

