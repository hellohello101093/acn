<?php
class News extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($start=0){
        $this->_data['title'] = 'Tin tức - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Tin tức - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Tin tức - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='tin-tuc';
        $this->_data['slider'] = $this->mslider_tintuc->listAll();
        $this->_data['link_slider'] = 'slider_tintuc';
        $limit = 6;
        $this->load->library('pagination');
        $config['base_url'] = base_url().'tin-tuc';
        //config phân trang
        $config['total_rows'] = $this->mduan->numRows();
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
        $this->_data['data'] = $this->mduan->listAll($limit,$start);
        $this->load->view('components/header',$this->_data);
        $this->load->view('news/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function detail($link){
        $this->_data['data'] = $this->mduan->getByLink($link);
        $this->_data['activeMenu'] ='tin-tuc';
        $this->_data['title'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_description');
        $this->load->view('components/header',$this->_data);
        $this->load->view('news/detail',$this->_data);
        $this->load->view('components/footer');
    }
    public function loadMore(){
        $this->_data['data'] = $this->mduan->listAll(6,$_POST['start']);
        $numRow = $this->mduan->numRows();
        $this->_data['showMore'] = $numRow > $_POST['start']+6;
        echo $this->load->view('project/ajax', $this->_data);
    }
 }