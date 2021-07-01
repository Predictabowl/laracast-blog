<?php declare(strict_types=1) ?>
<!doctype html>

<html>
    <head>
        <title>My Blog</title>
        <link rel="stylesheet" href="/css/app.css"/>
    <body>

        <?php foreach ($posts as $post): ?>
            <article>
                <h1>
                    <a href="/posts/<?= $post -> getSlug(); ?>">
                        <?= $post->getTitle(); ?>
                    </a>
                </h1>

                <div>
                    <?= $post->getExcerpt(); ?>
                </div>
            </article>
        <?php endforeach; ?>

    </body>
</html>
