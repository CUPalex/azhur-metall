<!--header-->



<!--content-->
<div class="container">

    <!--workspaces-->
    <!--Slider-->
    <h1 class="my-4 text-center heading"> Место работы </h1>
    <hr/>


    <script src="http://darsain.github.io/sly/js/sly.min.js"></script>

    <div id="slider" class="slider clerfix row">

        <div class="frame">
            <ul>
                <?php foreach ($places as $place):?>
                <li class="slider-item">
                     <img class="card card-img-top" src="<?=base_url().$place->img?>" alt="">
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
        <img class="arrow-left prev" src="<?=base_url()?>/img/arrow-left.png"/>
        <img class="arrow-right next" src="<?=base_url()?>/img/arrow-right.png"/>

    </div>

    <script>
        /*global Sly */
        jQuery(function ($) {
            'use strict';

            document.getElementsByTagName('html')[0].className += ' ' +
                (~window.navigator.userAgent.indexOf('MSIE') ? 'ie' : 'no-ie');

            var $slider = $('#slider');
            var $frame = $slider.find('.frame'); window.frr = $frame;
            var sly = new Sly($frame, {
                horizontal: 1,
                itemNav: 'forceCentered',
                activateMiddle: 1,
                smart: 1,
                activateOn: 'click',
                mouseDragging: 1,
                touchDragging: 1,
                releaseSwing: 1,
                startAt: 10,
                scrollBar: $slider.find('.scrollbar'),
                scrollBy: 1,
                pagesBar: $slider.find('.pages'),
                activatePageOn: 'click',
                speed: 200,
                moveBy: 600,
                elasticBounds: 1,
                dragHandle: 1,
                dynamicHandle: 1,
                clickBar: 1,

                // Buttons
                forward: $slider.find('.forward'),
                backward: $slider.find('.backward'),
                prev: $slider.find('.prev'),
                next: $slider.find('.next')
            }).init();

            // Method calling buttons
            $slider.on('click', 'button[data-action]', function () {
                var action = $(this).data('action');

                switch (action) {
                    case 'add':
                        sly.add('<li>' + sly.items.length + '</li>');
                        break;
                    case 'remove':
                        sly.remove(-1);
                        break;
                    default:
                        sly[action]();
                }
            });
        });
    </script>




    <!--team-->
    <h1 class="my-4 text-center heading"> Главы компании
    </h1>
    <hr/>

    <!--one item of quotes-->
    <?php foreach ($people as $person):?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-<?=$person->first_order?>">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="<?=base_url().$person->img?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-<?=($person->first_order*2)%3?>">
                <div class="py-5">
                    <blockquote class="blockquote">
                        <div class="container">
                            <div class="row">
                                <div class = "col-lg-2">
                                    <img src="<?=base_url()?>img/floral1.png" class="img-fluid d-none d-lg-table-cell"/>
                                </div>
                                <div class="col-lg-8 quote">
                                    <?=$person->text?>
                                </div>
                                <div class = "col-lg-2">
                                    <img src="<?=base_url()?>img/floral2.png" class="img-fluid d-none d-lg-table-cell"/>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <!--end of item of quotes-->


    <!--feedback-->
    <h1 class="my-4 text-center heading"> Отзывы
    </h1>
    <hr/>


    <?php foreach ($comments as $comment):?>
    <div class="media comment rounded">
        <div class="media-left">
            <img src="<?=base_url().$comment->img?>" class="media-object img-fluid">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=$comment->name." "?><small><i><?=$comment->date?></i></small></h4>
            <p><?=$comment->text?></p>
        </div>
    </div>
    <?php endforeach;?>


<hr/>
<?php echo $image?>
    <div class="media">
        <div class="media-left">
            <input type="image" name = "img" src="<?=base_url().$image?>" class="media-object img-fluid p-0 mt-4">
        </div>
        <div class="form-group my-3 container-fluid">
            <form name="comment_form" method="post" action="<?=base_url()?>about">
                <input type="text" name="image" class="d-none" value="<?=$image?>">
                <div class="form-group" id="form_group_usr">
                    <label class="form-label" for="usr" >Name:</label>
                    <input type="text" class="form-control" name="usr" id="usr">
                </div>
                <div class="form-group" id="form_group_cont">
                    <label class="form-label" for="cont" >Contact:</label>
                    <input type="text" class="form-control" name="cont" id="cont">
                </div>
                <div class="form-group" id="form_group_comment">
                    <label class="form-label" for="comment">Ваш отзыв:</label>
                    <textarea class="form-control" rows="5" placeholder="Мы будем рады, если Вы оставите свой комментарий о качестве наших изделий" name="comment" id="comment"></textarea>
                </div>
                <button type="submit" class="btn-modal-item mt-3">Отправить</button>
            </form>
        </div>
    </div>

    <script>
        var form = document.comment_form;
        form.onsubmit = function() {
            var flag = true;
            var time = 7000;
            var name = document.getElementById('usr');
            var cont = document.getElementById('cont');
            var comment = document.getElementById('comment');

            if (name.value == '' || name.value == null) {
                flag = false;
                var alert2 = document.createElement("div");
                alert2.classList.add('alert-danger');
                alert2.innerHTML = 'Введите Ваше имя';

                var element2 = document.getElementById('form_group_usr');
                element2.insertBefore(alert2, name);
                setTimeout(function () {element2.removeChild(alert2)}, time);
            }

            if (cont.value == '' || cont.value == null) {
                flag = false;
                var alert = document.createElement("div");
                alert.classList.add('alert-danger');
                alert.innerHTML = 'Введите e-mail или номер телефона';

                var element = document.getElementById('form_group_cont');
                element.insertBefore(alert, cont);
                setTimeout(function () {element.removeChild(alert)}, time);
            }

            if ($('textarea#comment').val() == '' ||  $('textarea#comment').val() == null) {
                flag = false;
                var alert3 = document.createElement("div");
                alert3.classList.add('alert-danger');
                alert3.innerHTML = 'Введите текст отзыва';

                var element3 = document.getElementById('form_group_comment');
                element3.insertBefore(alert3, comment);
                setTimeout(function () {element3.removeChild(alert3)}, time);
            }

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (cont.value !== '' && cont.value!==null && !reg.test(cont.value)) {
                flag = false;
                var alert5 = document.createElement("div");
                alert5.classList.add('alert-danger');
                alert5.innerHTML = 'Введите корректный e-mail';

                var element5 = document.getElementById('form_group_cont');
                element5.insertBefore(alert5, cont);
                setTimeout(function () {element5.removeChild(alert5)}, time);
            }

            return flag;
        }
    </script>
</div>

<?php if ($comment_error) echo "<script>alert('".$comment_error."')</script>"?>
<!--footer-->