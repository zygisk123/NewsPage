<?php
include $_ADMIN_PATH . "/controllers/ArticleController.php";
include $_ADMIN_PATH . "/controllers/AuthorController.php";
include $_ADMIN_PATH . "/controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (count($_GET) == 0)
    {
        $articles = ArticleController::getAll();
    }
    
    if (isset($_GET['articleID']))
    {
        $article = ArticleController::getArticle($_GET['articleID']);
    }    
    
    if (isset($_GET['goToEdit']))
    {
        $article = ArticleController::getArticle($_GET['selectedArticleID']);
    }

    if (isset($_GET['delete']))
    {
        ArticleController::deleteArticle($_GET['deleteArticleID']);
        header("Location: ".$_USER_PATH."/views/article/showAll.php");
        die;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['createArticle']))
    {
        ArticleController::createArticle();
        header("Location: ".$_USER_PATH."/views/article/showAll.php");
        die;
    }

    if (isset($_POST['updateArticle']))
    {
        ArticleController::updateArticle();
        header("Location: ".$_USER_PATH."/views/article/showAll.php");
        die;
    }
}

$authors = AuthorController::getAll();
$categories = CategoryController::getAll();
?>
