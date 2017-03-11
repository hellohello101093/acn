<?php
class Page extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($code){
        $this->_data['page'] = $this->mpage->getByCode($code);
        $this->_data['title'] = $this->_data['page']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['page']['keyword'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['page']['desc'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='gioi-thieu';
        $this->_data['slider'] = $this->mslider_gioithieu->listAll();
        $this->_data['link_slider'] = 'slider_gioithieu';
        $this->load->view('components/header',$this->_data);
        $this->load->view('page/index',$this->_data);
        $this->load->view('components/footer');
	}
 }