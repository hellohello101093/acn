<?php
class events extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Events - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Events - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Events - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='entertaiment';
        $this->_data['data'] = $this->mevents->listAll(6,0);
        $numRow = $this->mevents->numRows();
        $this->_data['showMore'] = $numRow > count ($this->_data['data']);
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/events/list');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('events/list',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function detail($link){
        $this->_data['data'] = $this->mevents->getByLink($link);
        $this->_data['title'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='entertaiment';
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/events/detail');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('events/detail',$this->_data);
        $this->load->view('components/footer');
    }
    public function loadMore(){
        $this->_data['data'] = $this->mevents->listAll(6,$_POST['start']);
        $numRow = $this->mevents->numRows();
        $this->_data['showMore'] = $numRow > $_POST['start']+6;
        echo $this->load->view('events/ajax', $this->_data);
    }
 }