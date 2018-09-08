<?php
    $config = array(
        'order/index' => array(
            array(
                'field' => 'name',
                'label' => 'Ваше имя',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Укажите %s:',
                )
            ),
            array(
                'field' => 'phone',
                'label' => 'Контактный телефон',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Укажите %s:',
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'Укажите %s:',
                    'valid_email'=>'Введите корректный %s:'
                )
            ),
            array(
                'field' => 'comment',
                'label' => 'Пожелания и комментарии',
                'rules' => '',
                'errors' => array(

                )
            )
        ),

        'order_phone/index' => array(
            array(
                'field' => 'name',
                'label' => 'Ваше имя',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Укажите %s:',
                )
            ),
            array(
                'field' => 'phone',
                'label' => 'Контактный телефон',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Укажите %s:',
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'Укажите %s:',
                    'valid_email'=>'Введите корректный %s:'
                )
            ),
            array(
                'field' => 'comment',
                'label' => 'Пожелания и комментарии',
                'rules' => '',
                'errors' => array(

                )
            )
        )
    );