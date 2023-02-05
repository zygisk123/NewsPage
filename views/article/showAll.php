<?php 
include "../components/head.php"
?>

<body>
    <?php 
    include $_ADMIN_PATH . "/views/components/navbar.php";
    ?>
    <h1>Show All</h1>
    <div class="container">
        <?php foreach($articles as $article) { ?>
            <a href=<?= $_USER_PATH . "/views/article/show.php?articleID=" . $article->id ?>>
                <div class="row">
                    <h1><?= $article->headline ?></h1>
                    <h1><?= $article->author?></h1>
                    <h1><?= $article->category ?></h1>
                </div>
            </a>
        <?php } ?>
    </div>
</body>
</html>