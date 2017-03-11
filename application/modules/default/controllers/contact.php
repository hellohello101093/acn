<?php
class Contact extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Liên hệ - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Liên hệ - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Liên hệ - '.$this->mconfig->getByKey('page_description');
        $this->_data['slider'] = $this->mslider_lienhe->listAll();
        $this->_data['link_slider'] = 'slider_lienhe';
        $this->_data['activeMenu'] ='lien-he';
        $this->load->view('components/header',$this->_data);
        $this->load->view('contact/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function send() {
        $arr = array(
            'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'message'=>$_POST['message'],
            'created'=>time()
        );
        $this->mcontact->add($arr);
        echo 'Liên hệ hoàn tất, chúng tôi sẽ liên hệ lại bạn trong thời gian ngắn nhất';
    }
 }