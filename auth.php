<!DOCTYPE html>
<html lang="ru">

<head>
    <?
    $website_title = "Авторизация на сайте";
    require_once './blocks/head.php'
    ?>
</head>

<body>
    <?php require 'blocks/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <?php
                if (!isset($_COOKIE['log'])) :
                ?>
                    <h4>Форма авторизации</h4>
                    <form method="post">

                        <label for="login">Логин</label>
                        <input type="text" name='login' id='login' class='form-control'>

                        <label for="pass">Пароль</label>
                        <input type="password" name='pass' id='pass' class='form-control'>
                        <div class="alert alert-danger mt-2" id='errorBlock'></div>
                        <button type='button' id='auth_user' class='btn btn-success mt-3'>
                            Войти
                        </button>
                    </form>
                <?php else : ?>
                    <h2><?= $_COOKIE['log'] ?></h2>
                    <button class='btn btn-danger' id='exit_btn'>Выйти</button>
                <?php endif; ?>
            </div>

            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        document.querySelector('#auth_user') !== null && document.querySelector('#auth_user').addEventListener('click', () => {

            let login = document.querySelector('#login').value
            let pass = document.querySelector('#pass').value

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {
                    'login': login,
                    'pass': pass,
                },
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                        $('#errorBlock').hide()
                        $('#auth_user').text('Готово')
                        document.location.reload(true)
                    } else {
                        $('#errorBlock').show()
                        $('#errorBlock').text(data)

                    }
                }

            })
        })

        document.querySelector('#exit_btn').addEventListener('click', () => {

            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.reload(true)
                }

            })
        })
    </script>
</body>

</html>