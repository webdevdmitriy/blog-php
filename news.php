<!DOCTYPE html>
<html lang="ru">

<head>
    <?
    require_once 'mysql_connect.php';
    $sql = 'SELECT * from `articles` WHERE id =:id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_GET['id']]);

    $article =  $query->fetch(PDO::FETCH_OBJ);


    $website_title = "PHP блог";
    require_once './blocks/head.php'
    ?>
</head>

<body>
    <?php require 'blocks/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="jumbotron">
                    <h1><?= $article->title ?></h1>
                    <p>Автор статьи <?= $article->avtor ?></p>
                    <?
                    $date = date('d ', $article->date);
                    $months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                    $date .= $months[date('n', $article->date) - 1];
                    $date .= date(' H:i', $article->date);
                    ?>
                    <p><?= $article->itro ?></p>
                    <p><?= $article->text ?></p>
                    <p>Время публикации <u><?= $date ?></u></p>
                </div>

            </div>

            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>
</body>

</html>