<?php
class Index extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = $this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->mconfig->getByKey('page_description');
        $this->_data['products'] = $this->mproduct->getNew();
        $this->_data['activeMenu'] ='home';
        $this->load->view('components/header',$this->_data);
        $this->load->view('index',$this->_data);
        $this->load->view('components/footer');
	}
 }