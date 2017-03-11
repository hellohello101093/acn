<?php
class Category extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Categories - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Categories - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Categories - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='categories';
        $key = isset($_POST['key']) ? $_POST['key'] : '';
        $this->_data['key'] = $key;
        $this->_data['data'] = $this->mproduct->listAll(9,0,$key);
        $numRow = $this->mproduct->numRows($key);
        $this->_data['showMore'] = $numRow > count ($this->_data['data']);
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/category/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('category/index',$this->_data);
        $this->load->view('components/footer');
	}
    public function child($link){
        $category = $this->mcategory->getByLink($link);
        $this->_data['title'] = $category['name'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $category['name'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $category['name'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='categories';
        $key = isset($_POST['key']) ? $_POST['key'] : '';
        $this->_data['key'] = $key;
        $this->_data['data'] = $this->mproduct->getByCategory($category['id'],9,0,$key);
        $this->_data['category'] = $category;
        $numRow = $this->mproduct->numRowCategory($category['id'],$key);
        $this->_data['showMore'] = $numRow > count ($this->_data['data']);
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/category/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('category/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function loadMore(){
        $key = isset($_POST['key']) ? $_POST['key'] : '';
        if(isset($_POST['category'])){
            $this->_data['data'] = $this->mproduct->getByCategory($_POST['category'],6,$_POST['start'],$key);
            $numRow = $this->mproduct->numRowCategory($_POST['category'],$key);
            $this->_data['showMore'] = $numRow > $_POST['start']+6;
        } else {
            $this->_data['data'] = $this->mproduct->listAll(6,$_POST['start'],$key);
            $numRow = $this->mproduct->numRows($key);
            $this->_data['showMore'] = $numRow > $_POST['start']+6;
        }
        echo $this->load->view('category/ajax', $this->_data);
    }
 }