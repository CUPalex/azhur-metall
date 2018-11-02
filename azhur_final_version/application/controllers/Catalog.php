<?php

class Catalog extends CI_Controller
{
    // по дефолту идем на главную страницу
    public function index($page = 'index')
    {

        if ($page !== 'index') {
            show_404();
        }

        $this->load->model('Catalog_model', '', TRUE);
        $data['query'] = $this->Catalog_model->get_catalog();
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }

    // идем на страницу категории (подкаталог)
    public function other($category)
    {
        // категория написана по-русски, поэтому нужно ее пару раз преобразовать, чтобы все корректно работало
        $category = urldecode($category);
        //категория Прочие_товары написана через "_", но отображать ее надо через " "
        $category = str_replace("_", " ", $category);
        $this->load->model('Catalog_model', '', TRUE);
        // Если такой категории нет в бд, то 404
        if (!$this->Catalog_model->category_exists($category)) {
            show_404();
        }

        //Иначе грузим страницу категории
        $category = str_replace(" ", "_", $category);
        $data['query'] = $this->Catalog_model->get_items($category);
        $category = str_replace("_", " ", $category);
        $data['category'] = $category;
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('pages/subcatalog', $data);
        $this->load->view('templates/footer');

    }

}