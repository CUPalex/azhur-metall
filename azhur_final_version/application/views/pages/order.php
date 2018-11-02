<!--header-->

<div class="container">


    <!--page header-->
    <h1 class="my-4 text-center heading"> Заполните заявку
    </h1>
    <hr/>

    <form name="order_form" class="form-horizontal" action="<?= base_url() ?>order" method="post">

        <div class="form-group" id="form_group_name">
            <label class="control-label" for="name">Ваше имя: *</label>
            <div id="form_name">
                <input type="text" class="form-control"
                       id="name" name="name" value="<?php echo set_value('name'); ?>">
            </div>
        </div>

        <div class="form-group" id="form_group_id">
            <label class="control-label" for="id">ID товара:</label>
            <div id="form_id">
                <input type="text" class="form-control" id="id" name="id"
                       value="<?php if (set_value('id') !== '') echo set_value('id'); else echo $id; ?>"
            </div>
        </div>

        <div class="form-group" id="form_group_product_name">
            <label class="control-label" for="product_name">Наименование товара:</label>
            <div id="form_product_name">
                <input type="text" class="form-control" id="product_name" name="product_name"
                       value="<?php echo set_value('product_name'); ?>">
            </div>
        </div>
        <div class="form-group" id="form_group_phone">
            <label class="control-label" for="phone">Контактный телефон: *</label>
            <div id="form_phone">
                <input type="tel" class="form-control" id="phone" name="phone"
                       value="<?php echo set_value('phone'); ?>">
            </div>
        </div>
        <div class="form-group" id="form_group_email">
            <label class="control-label" for="email">Контактный email: *</label>
            <div id="form_email">
                <input type="email" class="form-control" id="email" name="email"
                       value="<?php echo set_value('email'); ?>">
            </div>
        </div>
        <div class="form-group" id="form_group_comment">
            <label class="control-label" for="comment">Пожелания и комментарии:</label>
            <div id="form_comment">
                <textarea class="form-control" rows="5" id="comment" name="comment"
                          content="<?php echo set_value('comment'); ?>"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-order" id="btn_order">Отправить</button>
            </div>
        </div>
    </form>

    <script>
        // верификация формы
        var form = document.order_form;

        form.onsubmit = function () {
            var flag = true; // возвращается из функции, означает, можно ли отправлять форму
            var time = 7000; // время, через которое пропадает сообщение об ощибке
            var id = document.getElementById('id');
            var product_name = document.getElementById('product_name');
            var name = document.getElementById('name');
            var comment = document.getElementById('comment');
            var email = document.getElementById('email');
            var phone = document.getElementById('phone');

            // id или наименование товара должны быть указаны
            if ((id.value == '' || id.value == null) && (product_name.value == '' || product_name.value == null)) {
                flag = false;
                var alert1 = document.createElement("div");
                var _alert1 = document.createElement("div");
                var child1 = document.getElementById('form_id');
                var _child1 = document.getElementById('form_product_name');
                alert1.classList.add('alert-danger');
                alert1.innerHTML = 'Укажите ID товара или наименование товара';
                _alert1.classList.add('alert-danger');
                _alert1.innerHTML = 'Укажите ID товара или наименование товара';

                var element1 = document.getElementById('form_group_id');
                var _element1 = document.getElementById('form_group_product_name');
                element1.insertBefore(alert1, child1);
                _element1.insertBefore(_alert1, _child1);
                setTimeout(function () {
                    element1.removeChild(alert1)
                }, time);
                setTimeout(function () {
                    _element1.removeChild(_alert1)
                }, time);
            }

            // верификация id  - 7 цифр
            if ((id.value !== '' && id.value !== null) && (id.value.length !== 7 || !isFinite(Number(id.value)))) {
                flag = false;
                var alert = document.createElement("div");
                var child = document.getElementById('form_id');
                alert.classList.add('alert-danger');
                alert.innerHTML = 'ID товара должен содержать 7 цифр без пробелов и знаков препинания';

                var element = document.getElementById('form_group_id');
                element.insertBefore(alert, child);
                setTimeout(function () {
                    element.removeChild(alert)
                }, time);
            }

            //верификация email - соответствует стандарту нечто@нечто.нечто_из_2,3_или_4_букв
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (email.value !== '' && email.value !== null && reg.test(email.value) == false) {
                flag = false;
                var alert5 = document.createElement("div");
                var child5 = document.getElementById('form_email');
                alert5.classList.add('alert-danger');
                alert5.innerHTML = 'Введите корректный email';

                var element5 = document.getElementById('form_group_email');
                element5.insertBefore(alert5, child5);
                setTimeout(function () {
                    element5.removeChild(alert5)
                }, time);
            }

            //верификация телефона
            var reg1 = /^[+]?[\d\(\)\ -]{11,22}$/;
            if (phone.value !== '' && phone.value !== null && reg1.test(phone.value) == false) {
                flag = false;
                var alert6 = document.createElement("div");
                var child6 = document.getElementById('form_phone');
                alert6.classList.add('alert-danger');
                alert6.innerHTML = 'Введите корректный номер телефона';

                var element6 = document.getElementById('form_group_phone');
                element6.insertBefore(alert6, child6);
                setTimeout(function () {
                    element6.removeChild(alert6)
                }, time);

            }


            // name required
            if (name.value == '' || name.value == null) {
                flag = false;
                var alert2 = document.createElement("div");
                var child2 = document.getElementById('form_name');
                alert2.classList.add('alert-danger');
                alert2.innerHTML = 'Введите Ваше имя';

                var element2 = document.getElementById('form_group_name');
                element2.insertBefore(alert2, child2);
                setTimeout(function () {
                    element2.removeChild(alert2)
                }, time);
            }

            //phone required
            if (phone.value == '' || phone.value == null) {
                flag = false;
                var alert3 = document.createElement("div");
                var child3 = document.getElementById('form_phone');
                alert3.classList.add('alert-danger');
                alert3.innerHTML = 'Введите контактный номер телефона';

                var element3 = document.getElementById('form_group_phone');
                element3.insertBefore(alert3, child3);
                setTimeout(function () {
                    element3.removeChild(alert3)
                }, time);
            }

            //email required
            if (email.value == '' || email.value == null) {
                flag = false;
                var alert4 = document.createElement("div");
                var child4 = document.getElementById('form_email');
                alert4.classList.add('alert-danger');
                alert4.innerHTML = 'Введите email';

                var element4 = document.getElementById('form_group_email');
                element4.insertBefore(alert4, child4);
                setTimeout(function () {
                    element4.removeChild(alert4)
                }, time);
            }


            //выход из функции. говорим, можно ли посылать форму
            return flag;
        }
    </script>
</div>
</div>
<!--footer-->
