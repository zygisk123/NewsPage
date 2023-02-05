<?php 
include "../components/head.php"
?>

<body>
    <?php 
    include $_ADMIN_PATH . "/views/components/navbar.php";
    ?>
    <div class="container">
        <div class="row">
            <h1><?= $article->headline ?></h1>
        </div>
        <div class="row">
            <p>
                <?= $article->text ?>
            </p>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <form action="<?=$_USER_PATH . "/views/article/edit.php"?>" method="get">
                            <input type="hidden" name="selectedArticleID" value = "<?=$article->id?>">
                            <button type="submit" class="btn btn-info" name = "goToEdit">Edit</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="" method="get">
                            <input type="hidden" name="deleteArticleID" value = "<?=$article->id?>">
                            <button type="submit" class="btn btn-danger" name = "delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>