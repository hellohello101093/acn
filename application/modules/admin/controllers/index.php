<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class index extends MY_Controller {	public function __construct(){		parent::__construct();        $this->_data['now'] = ' ';        $user = $this->session->userdata('user');       if(!$user || $user['user_type'] != 'administrator'){          redirect(base_url()."admin/login");       }        $this->form_validation->CI =& $this;	}	public function index()	{         $this->load->model('muser');        $this->_data['count_product'] = $this->muser->count('products');        $this->_data['count_service'] = $this->muser->count('service');        $this->_data['count_footer_slider'] = $this->muser->count('footer_slider');        $this->_data['count_contact'] = $this->muser->count('contacts');		$this->_data['template'] = 'admin/home';		$this->_data['title'] = 'Trang Quản Trị';		$this->load->view("layout/admin",$this->_data);	}}