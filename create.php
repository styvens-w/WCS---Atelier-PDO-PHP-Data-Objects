<?php
require_once 'config.php';
$errors=[];

if($_SERVER['REQUEST_METHOD']=== 'POST') {
    if(!isset($_POST['title']) || strlen($_POST['title']) > 255) {
        $errors[]='Veuillez donner un titre correct';
    } else {
        $title = trim(htmlentities($_POST['title']));
    }

    if(!isset($_POST['author']) || strlen($_POST['author'])>255) {
        $errors[]='Veuillez donner un auteur correct';
    } else {
        $author = trim(htmlentities($_POST['author']));
    }

    if(!isset($_POST['content']) || strlen($_POST['content'])>255) {
        $errors[]='Veuillez donner un contenu correct';
    } else {
        $content = trim(htmlentities($_POST['content']));
    }

    if(empty($errors)) {
        $pdo= new PDO(DSN, USER, PASS);
        $query = "INSERT INTO  story(title, content, author) VALUES (:title, :content, :author)";
        $st=$pdo->prepare($query);
        $st->bindValue(':title', $title, PDO::PARAM_STR);
        $st->bindValue(':content', $content, PDO::PARAM_STR);
        $st->bindValue(':author', $author, PDO::PARAM_STR);
        $result=$st->execute();
        var_dump($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ajouter une histoire</h1>
<?php foreach($errors as $error) : ?>
    <p><?=$error ?></p>
<?php endforeach ?>

<form action="create.php" method="post">
    <label for="author">Auteur</label><input type="text" name="author" id="author">
    <label for="title">Titre</label><input type="text" name="title" id="title">
    <label for="content">Histoire</label><textarea name="content" id="content"></textarea>
    <button>Valider</button>
</form>
</body>
</html>