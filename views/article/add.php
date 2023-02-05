<?php 
include "../components/head.php"
?>

<body>
    <?php 
    include $_ADMIN_PATH . "/views/components/navbar.php";
    ?>
    <h1>Add</h1>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method = 'post'>
                    <div class="mb-3">
                        <label for="articleHeadline" class="form-label">Headline</label>
                        <input type="text" class="form-control" id="articleHeadline" name="headline">
                    </div>
                    <div class="mb-3">
                        <label for="articleText" class="form-label">Text</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="30"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="articleAuthor" class="form-label">Author</label>
                        <select class="form-select" id="articleAuthor" name="author">
                            <option selected>Select an author</option>
                            <?php foreach($authors as $author) {?>
                                <option value = <?= $author->id ?>><?= $author->name . " " . $author->surname?></option>
                            <?php } ?>
                        </select>                    
                    </div>
                    <div class="mb-3">
                        <label for="articleCategory" class="form-label">Category</label>
                        <select class="form-select" id="articleCategory" name="category">
                            <option selected>Select a category</option>
                            <?php foreach($categories as $category) {?>
                                <option value = <?= $category->id ?>><?= $category->category ?></option>
                            <?php } ?>
                        </select>                    
                    </div>
                    <button type="submit" class="btn btn-primary" name="createArticle">Create</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>