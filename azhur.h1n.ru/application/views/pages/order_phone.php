<!--header-->

<!--Основная страница заказать (без ID)-->
<div class="container">
<!--    ссылка на страницу "заказать" с ID-->
    <h1 class="my-4 text-center heading">Если Вы хотели заказать конкретный товар из примеров на сайте, перейдите <a href="<?=base_url()?>order">по ссылке</a>
    </h1>
    <!--page header-->
    <h1 class="my-4 text-center heading"> Заполните заявку
    </h1>
    <hr/>

    <form name = "order_form" class="form-horizontal" action="<?=base_url()?>order_phone" method="post">

        <div class="form-group" id="form_group_name">
            <label class="control-label <?php if (form_error('name')!=='') echo 'd-none'?>" for="name">Ваше имя: *</label>
            <?php echo form_error('name', "<label class='control-label form-error' for='name'>", "</label>");?>
            <div id="form_name">
                <input type="text" class="form-control <?php if (form_error('name')!=='') echo 'form-error-text'?>" id="name" name="name" value="<?php echo set_value('name'); ?>">
            </div>
        </div>

        <div class="form-group" id="form_group_phone">
            <label class="control-label <?php if (form_error('phone')!=='') echo 'd-none'?>" for="phone">Контактный телефон: *</label>
            <?php echo form_error('phone', "<label class='control-label form-error' for='phone'>", "</label>");?>
            <div id="form_phone">
                <input type="tel" class="form-control <?php if (form_error('phone')!=='') echo 'form-error-text'?>" id="phone" name="phone" value="<?php echo set_value('phone'); ?>">
            </div>
        </div>
        <div class="form-group" id="form_group_email">
            <label class="control-label <?php if (form_error('email')!=='') echo 'd-none'?>" for="email">Контактный email: *</label>
            <?php echo form_error('email', "<label class='control-label form-error' for='email'>", "</label>");?>
            <div id="form_email">
                <input type="email" class="form-control <?php if (form_error('email')!=='') echo 'form-error-text'?>" id="email" name="email" value="<?php echo set_value('email'); ?>">
            </div>
        </div>
        <div class="form-group" id="form_group_comment">
            <label class="control-label <?php if (form_error('comment')!=='') echo 'd-none'?>" for="comment">Что Вы хотели нам сказать:</label>
            <?php echo form_error('comment', "<label class='control-label form-error' for='comment'>", "</label>");?>
            <div id="form_comment">
                <textarea class="form-control <?php if (form_error('comment')!=='') echo 'form-error-text'?>" rows="5" id="comment" name="comment" content="<?php echo set_value('comment'); ?>" ></textarea>
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

        form.onsubmit = function(){
            var flag = true; // возвращается из функции, означает, можно ли отправлять форму
            var time = 7000; // время, через которое пропадает сообщение об ощибке
            var id = document.getElementById('id');
            var product_name = document.getElementById('product_name');
            var name = document.getElementById('name');
            var comment = document.getElementById('comment');
            var email = document.getElementById('email');
            var phone = document.getElementById('phone');


            //верификация email - соответствует стандарту нечто@нечто.нечто_из_2,3_или_4_букв
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (email.value !== '' && email.value!==null && reg.test(email.value) == false) {
                flag = false;
                var alert5 = document.createElement("div");
                var child5 = document.getElementById('form_email');
                alert5.classList.add('alert-danger');
                alert5.innerHTML = 'Введите корректный email';

                var element5 = document.getElementById('form_group_email');
                element5.insertBefore(alert5, child5);
                setTimeout(function () {element5.removeChild(alert5)}, time);
            }

            //верификация телефона
            var reg1 = /^[+]?[\d\(\)\ -]{11,22}$/;
            if (phone.value !== '' && phone.value!==null && reg1.test(phone.value) == false) {
                flag = false;
                var alert6 = document.createElement("div");
                var child6 = document.getElementById('form_phone');
                alert6.classList.add('alert-danger');
                alert6.innerHTML = 'Введите корректный номер телефона';

                var element6 = document.getElementById('form_group_phone');
                element6.insertBefore(alert6, child6);
                setTimeout(function () {element6.removeChild(alert6)}, time);

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
                setTimeout(function () {element2.removeChild(alert2)}, time);
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
                setTimeout(function () {element3.removeChild(alert3)}, time);
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
                setTimeout(function () {element4.removeChild(alert4)}, time);
            }


            //выход из функции. говорим, можно ли посылать форму
            return flag;
        }
    </script>
</div>
</div>
<!--footer-->
