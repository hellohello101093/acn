<?php
class Product extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($start=0){
        $this->_data['title'] = 'Dự án khách hàng - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Dự án khách hàng - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Dự án khách hàng - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='du-an-khach-hang';
        $limit = 6;
        $this->_data['slider'] = $this->mslider_duan->listAll();
        $this->_data['link_slider'] = 'slider_duan';
        $this->load->library('pagination');
        $config['base_url'] = base_url().'du-an-khach-hang';
        //config phân trang
        $config['total_rows'] = $this->mproduct->numRows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['cur_tag_open'] = "<li class='active'><a>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;&lt;';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;&gt;';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->config->set_item('enable_query_strings', False);

        $this->pagination->initialize($config);
        $this->_data['pagination']=$this->pagination->create_links();
        $this->_data['data'] = $this->mproduct->listAll($limit,$start);
        $this->load->view('components/header',$this->_data);
        $this->load->view('product/index',$this->_data);
        $this->load->view('components/footer');
	}
    public function detail($link){
        $this->_data['data'] = $this->mproduct->getByLink($link);
        $this->_data['title'] = $this->_data['data']['name'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['keyword'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['info'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='du-an-khach-hang';
        $this->load->view('components/header',$this->_data);
        $this->load->view('product/detail',$this->_data);
        $this->load->view('components/footer');
    }
 }