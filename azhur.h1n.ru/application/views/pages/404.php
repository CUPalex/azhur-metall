<!DOCTYPE html>
<html lang="ru">
    <head>
        <title> Ажур-металл </title>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <script type="text/javascript" src="<?=base_url()?>bootstrap/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
        <link type="text/css" href="<?=base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?=base_url()?>css/design.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Marck+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Forum" rel="stylesheet">
    </head>
    <body>
        <!--header-->

        <img src="<?=base_url()?>/img/burglar.png" class="img-responsive burglar"/>
        <div class="container-fluid">

            <h1 class="text-center four-zero-four">404</h1>

            <h1 class="text-center">Упс! кажется, такой страницы не существует</h1>
            <h1 class="text-center" style="margin-bottom: 3rem;">(Возможно, кто-то ее украл)</h1>

            <h1 id="back" class="text-center col-12 button-back">Вернитесь назад</h1>


        </div>
        <script>
            var back = document.getElementById('back');
            back.onclick = function () {
                window.history.back();
            }
        </script>

    </body>
</html>