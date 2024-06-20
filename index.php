<?php
require_once 'config.php';
require_once 'Story.php';


$pdo = new PDO(DSN, USER, PASS);
$query="SELECT * FROM story";
$st=$pdo->query($query);
$stories=$st->fetchAll(PDO::FETCH_CLASS,'Story');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Histoires</h1>
<?php foreach ($stories as $story) : ?>
<h3><?php echo $story->getTitle() ?></h3>
<p>Author : <?php echo $story->getAuthor() ?></p>
<p><?php echo $story->getContent() ?>
    <?php endforeach ?>
</body>
</html>