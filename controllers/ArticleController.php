<?php
include $_ADMIN_PATH . "/models/Article.php";

class ArticleController 
{
    public static function getAll()
    {
        return Article::getAll();
    }

    public static function getArticle($id)
    {
        return Article::getArticle($id);
    }

    public static function createArticle()
    {
        Article::createArticle();
    }

    public static function updateArticle()
    {
        Article::updateArticle();
    }

    public static function deleteArticle($id)
    {
        Article::deleteArticle($id);
    }

}
?>