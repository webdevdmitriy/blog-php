<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = "PHP блог";
  require_once './blocks/head.php'
  ?>
</head>

<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?
        require_once 'mysql_connect.php';
        $sql = 'SELECT * from `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {

        ?>
          <h2><?= $row->title ?></h2>
          <p><?= $row->intro ?></p>
          <p>Автор статьи <?= $row->avtor ?></p>
          <a href="/news.php?id=<?= $row->id ?>">
            <button class='btn btn-warning mb-5'>Прочитать больше</button>
          </a>

        <?

        }
        ?>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
</body>

</html>