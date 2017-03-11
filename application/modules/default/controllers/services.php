<?php
class Services extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Dịch vụ cung cấp - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Dịch vụ cung cấp - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Dịch vụ cung cấp - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='dich-vu-cung-cap';
        $this->_data['slider'] = $this->mslider_dichvu->listAll();
        $this->_data['link_slider'] = 'slider_dichvu';
        $this->_data['services'] = $this->mservice->getAll();
        $this->load->view('components/header',$this->_data);
        $this->load->view('services/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function detail($link){
        $this->_data['data'] = $this->mservice->getByLink($link);
        $this->_data['title'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='dich-vu-cung-cap';
        $this->load->view('components/header',$this->_data);
        $this->load->view('services/detail',$this->_data);
        $this->load->view('components/footer');
    }
    public function loadMore(){
        $this->_data['data'] = $this->mduan->listAll(6,$_POST['start']);
        $numRow = $this->mduan->numRows();
        $this->_data['showMore'] = $numRow > $_POST['start']+6;
        echo $this->load->view('project/ajax', $this->_data);
    }
 }