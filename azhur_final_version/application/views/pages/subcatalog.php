<!--header-->


<!--content-->
<div class="container">


    <!--page header-->
    <h1 class="my-4 text-center heading"> <?= $category ?>
    </h1>
    <hr/>

    <!--breadcrumd-->
    <nav class="breadcrumb mt-1 p-0 mb-4">
        <a class="breadcrumb-item" href="<?= base_url() ?>">Каталог изделий</a>
        <span class="breadcrumb-item active"><?= $category ?></span>
    </nav>


    <!--items-->
    <div class="row">
        <?php foreach ($query as $item): ?>
            <div href="#<?= $item->id ?>" class="open_modal col-lg-4 col-sm-6 portfolio-item py-3"
                 style="position: relative">
                <div class="card h-100">
                    <img class="card-img-top" src="<?= base_url() . $item->img1 ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title py-2 m-0 pl-1">
                            <?= $item->title ?>
                        </h4>
                        <hr class="m-0"/>
                        <p class="card-text py-2 m-0 pl-2">Цена: от <?= $item->cost ?> рублей</p>
                    </div>
                </div>
            </div>

            <!--modal-->
            <div id="<?= $item->id ?>" class="modal_dialog">

                <!-- кнопка закрытия -->
                <div class="modal-header" style="">
                    <button type="button" class="close modal_close" style="position: relative; padding: 0;">&times;
                    </button>
                </div>

                <!-- тело всплывающего окна-->
                <div class="modal-body pt-0">
                    <div class="row align-items-center">

                        <!-- фотографии -->
                        <div class="col-6">
                            <img class="rounded m-0 p-0 mb-4 d-block col-12 card"
                                 src="<?= base_url() . str_replace('_catalog', '', $item->img1) ?>" alt="image">
                            <!--Если вторая фотография есть, грузим ее-->
                            <?php if ($item->img2) echo "<img class='rounded m-0 p-0 mb-4 d-block col-12 card' src='" . base_url() . str_replace('_catalog', '', $item->img2) . "' alt='image'>" ?>
                        </div>

                        <!-- описание -->
                        <div class="col-6">
                            <div class="mx-auto">
                                <p class="text-center modal-heading"><b><?= $item->title ?></b></p>
                                <hr/>
                                <p class="modal-item-content"><b class="modal-item-name">Цена: </b>
                                    от <?= $item->cost ?> рублей</p>
                                <p class="modal-item-content"><b class="modal-item-name">ID на
                                        сайте:</b> <?= $item->id ?> </p>
                                <p class="modal-item-content"><b class="modal-item-name">Размер:</b> <?= $item->size ?>
                                </p>
                                <p class="modal-item-content"><b
                                            class="modal-item-name">Материал:</b> <?= $item->matherial ?> </p>
                                <p class="modal-item-content"><b class="modal-item-name">Цвет:</b> <?= $item->color ?>
                                </p>
                                <form action="<?= base_url() ?>order/<?= $item->id ?>">
                                    <button type="submit" class="btn btn-modal-item">Оформить заказ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--/items-->


    <div class="overlay"></div><!-- Пoдлoжкa -->

    <!--скрипт для всплывающего окна-->
    <script>
        $(document).ready(function () {
            var overlay = $('.overlay');
            var open_modal = $('.open_modal');
            var close = $('.modal_close, .overlay');
            var modal = $('.modal_dialog');

            open_modal.click(function (event) {
                event.preventDefault();
                var modal_id = $(this).attr('href');
                overlay.fadeIn(400,
                    function () {
                        $(modal_id)
                            .css('display', 'block')
                            .animate({opacity: 1, top: '50%'}, 200);
                    });
            });

            close.click(function () {
                modal
                    .animate({opacity: 0, top: '45%'}, 200,
                        function () {
                            $(this).css('display', 'none');
                            overlay.fadeOut(400);
                        }
                    );
            });
        });
    </script>


</div>


<!--footer-->