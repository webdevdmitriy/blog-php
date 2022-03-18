<!DOCTYPE html>
<html lang="ru">

<head>
    <?
    $website_title = "Ригистрация на сайте";
    require_once './blocks/head.php'
    ?>
</head>

<body>
    <?php require 'blocks/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4>Форма регистрации</h4>
                <form method="post">
                    <label for="username">Ваше имя</label>
                    <input type="text" name='username' id='username' class='form-control'>

                    <label for="email">Email</label>
                    <input type="text" name='email' id='email' class='form-control'>

                    <label for="login">Логин</label>
                    <input type="text" name='login' id='login' class='form-control'>

                    <label for="pass">Пароль</label>
                    <input type="password" name='pass' id='pass' class='form-control'>
                    <div class="alert alert-danger mt-2" id='errorBlock'></div>
                    <button type='button' id='reg_user' class='btn btn-success mt-3'>
                        Зарегистрироваться
                    </button>
                </form>
            </div>

            <?php require 'blocks/aside.php'; ?>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        document.querySelector('#reg_user').addEventListener('click', () => {
            let name = document.querySelector('#username').value
            let email = document.querySelector('#email').value
            let login = document.querySelector('#login').value
            let pass = document.querySelector('#pass').value

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'email': email,
                    'login': login,
                    'pass': pass,
                },
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                        $('#errorBlock').hide()
                        $('#reg_user').text('Успешно')
                    } else {
                        $('#errorBlock').show()
                        $('#errorBlock').text(data)

                    }
                }

            })
        })
    </script>
</body>

</html>