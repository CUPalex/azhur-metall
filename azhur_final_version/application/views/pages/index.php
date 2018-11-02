<!--header-->

<div class="container">

    <h1 class="my-4 text-center heading">
        Здесь Вы найдете примеры наших прошлых работ. Мы можем создать для Вас изделия
        на основе находящихся в каталоге, а можем произвести нечто уникальное, подходящее именно Вам.<br/>
        <a href="<?= base_url() ?>order_phone">Оставляйте заявку на сайте</a>, и мы Вам перезвоним.
    </h1>
    <!--page header-->
    <h1 class="my-4 text-center heading"> Каталог изделий
    </h1>
    <hr/>

    <!--    items -->

    <?php $i = 0;
    foreach ($query as $item): ?>
        <a href="<?= base_url() . $item->href ?>">
            <div class="my-5 container catalog-item-<?php if ($i % 2 == 0) echo "right"; else echo "left"; ?> clearfix">
                <div class="catalog-item-img mb-3 offset-2 col-8">
                    <img src="<?= base_url() . $item->img ?>" class="rounded-circle img-fluid"/>
                </div>
                <div class="catalog-item-text text-center rounded mx-auto">
                    <h1 class="catalog-item-first-heading"><?= $item->title ?></h1>
                    <h2 class="catalog-item-second-heading">от <?= $item->price ?> рублей</h2>
                </div>
            </div>
            <?php $i++ ?>
        </a>
    <?php endforeach; ?>

</div>

<!--footer-->