<!doctype html>

<html>
    <head>
        <title>Post</title>
        <link rel="stylesheet" href="/css/app.css"/>
    </head>
    <body>
        <article>
            <h1><?= $post->getTitle(); ?></h1>
            <div>
                <?= $post->getBody() ?>
            </div>
        </article>
        <a href="/">Go Back</a>
    </body>
</html>
