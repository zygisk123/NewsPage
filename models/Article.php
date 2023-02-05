<?php
include $_ADMIN_PATH . "/models/DB.php";

class Article
{
    public $id;
    public $headline;
    public $text;
    public $categoryID;
    public $category;
    public $authorID;
    public $author;

    public function __construct($id = null, $headline = null, $text = null, $categoryID = null, $category = null, $authorID = null, $author = null)
    {
        $this->id = $id;
        $this->headline = $headline;
        $this->text = $text;
        $this->categoryID = $categoryID;
        $this->category = $category;
        $this->authorID = $authorID;
        $this->author = $author;
    }

    public static function getAll()
    {
        $articles = [];
        $db = new DB();
        $query = "SELECT `a`.`id`, `a`.`headline`, `a`.`text`, `a`.`categoryID`, `c`.`category`, `a`.`authorID`, `auth`.`name` FROM `articles` `a` join `categories` `c` on `c`.`id` = `a`.`categoryID` join `authors` `auth` on `auth`.id = `a`.`authorID`";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc())
        {
            $articles[] = new Article($row['id'], $row['headline'], $row['text'], $row['categoryID'], $row['category'], $row['authorID'], $row['name']);
        }
        $db->conn->close();
        return $articles;
    }

    public static function getArticle($id)
    {
        $article = new Article();
        $db = new DB();
        $query = "SELECT `a`.`id`, `a`.`headline`, `a`.`text`, `a`.`categoryID`, `c`.`category`, `a`.`authorID`, `auth`.`name` FROM `articles` `a` join `categories` `c` on `c`.`id` = `a`.`categoryID` join `authors` `auth` on `auth`.id = `a`.`authorID` WHERE `a`.`id` = " . $id;
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc())
        {
            $article = new Article($row['id'], $row['headline'], $row['text'], $row['categoryID'], $row['category'], $row['authorID'], $row['name']);
        }
        $db->conn->close();
        return $article;
    }

    public static function createArticle()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `articles` (`headline`, `text`, `categoryID`, `authorID`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $_POST['headline'], $_POST['text'], $_POST['category'], $_POST['author']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function updateArticle()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `articles` SET `headline`=?,`text`=?,`categoryID`=?,`authorID`=? WHERE `id` = ?");
        $stmt->bind_param("ssiii", $_POST['headline'], $_POST['text'], $_POST['category'], $_POST['author'], $_POST['articleID']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function deleteArticle($id)
    {
        $db = new DB();
        $query = "DELETE FROM `articles` WHERE `articles`.`id` = " . $id;
        $result = $db->conn->query($query);
        $db->conn->close();
    }
}
?>