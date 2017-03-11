<?php
class service extends MY_Controller{

    protected $_gallery_path = "";
    protected $_gallery_url = "";
	public function __construct(){
		parent::__construct();
        $this->_data['now'] = 'Dịch vụ';
        $this->load->model('mservice');
        $user = $this->session->userdata('user');
        if(!$user || $user['user_type'] != 'administrator'){
            if($user['user_type']=='nhanvien'){
                redirect(base_url()."admin/product/phieubanhang"); 
            }
            else
                redirect(base_url()."admin/login");
        }
        $this->form_validation->CI =& $this;
        //--------
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->_gallery_url = base_url()."public/service/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH. "../public/service");
	}
	public function listall(){
        $cate = 'all';
        if(!isset($_GET['per_page'])){
            $start = 0 ;
        }else{
            $start=$_GET['per_page'];
        }
        if(!isset($_GET['type'])){
            $type = 'all';
        }else{
            $type=$_GET['type'];
        }
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/service/listall?';
		//config phân trang
		$config['total_rows'] = $this->mservice->numRows();
		$config['per_page'] =15;
		$config['uri_segment'] = 4;
		$config['cur_tag_open'] = "<li><a><font color='black'>";
		$config['cur_tag_close'] = '</font></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->_data['pagination']=$this->pagination->create_links();
		$this->_data['template'] = 'admin/service/list_view';
		$this->_data['title'] = 'Trang Quản Lý Danh Mục ';
		$this->_data['info'] = $this->mservice->listAll($config['per_page'],$start);
		$this->load->view("layout/admin",$this->_data);
	}
	public function add(){
        $this->_data['action'] = strtolower(__FUNCTION__);
		if(isset($_POST['ok'])){
            $this->form_validation->set_rules("title","Tiêu Đề","required");
            $this->form_validation->set_rules("content","Nội Dung","trim|required");
            $this->form_validation->set_rules("desc","Giới thiệu","trim|required");
            $this->form_validation->set_rules("avatar","Nội Dung","callback_image_check");

			if($this->form_validation->run()==TRUE){
                //----------------
                $config = array('upload_path'   => $this->_gallery_path,
                    'allowed_types' => 'gif|jpg|png',
                    'max_size'      => '2000');
                $this->load->library("upload",$config);
                if(!$this->upload->do_upload("avatar")){
                    $this->_data['error'] = array($this->upload->display_errors());
                }else{
                    $data =$this->upload->data();
                    $this->_create_thumb($data['file_name'],$this->_gallery_path);
                }
				$arr = array(
					'title' => $this->input->post('title'),
					'link' => $this->input->post('link'),
					'content' => $this->input->post('content'),
					'desc' => $this->input->post('desc'),
                    'keyword' => $this->input->post('keyword'),
					'avatar' =>$data['file_name'],
					'created' => time(),
					);
				$this->mservice->add($arr);
				$this->session->set_flashdata('ses_flash',"Thêm");
				redirect(base_url()."admin/service/listall");
			}
            $arr = array(
                'title' => $this->input->post('title'),
				'link' => $this->input->post('link'),
				'content' => $this->input->post('content'),
                'keyword' => $this->input->post('keyword'),
				'desc' => $this->input->post('desc'),
            );
            $this->_data['info'] = $arr;
		}
		$this->_data['template'] = 'admin/service/modify_view';
		$this->_data['title'] = 'Trang Thêm Thực Đơn ';
		$this->load->view("layout/admin",$this->_data);
	}

    function image_check($file){
        if ($_FILES['avatar']['name']!='') return true;
        $this->form_validation->set_message('image_check', 'Vui lòng tải Ảnh Đại Diện');
        return FALSE;
    }

	public function del($id){
		$this->mservice->del($id);
		$this->session->set_flashdata('ses_flash',"Xóa");
		redirect(base_url()."admin/service/listall");
	}
	public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
		if(isset($_POST['ok'])){
            $this->form_validation->set_rules("title","Tiêu Đề","required");
            $this->form_validation->set_rules("content","Nội Dung","trim|required");
            $this->form_validation->set_rules("desc","Giới thiệu","trim|required");
            if($this->form_validation->run()==TRUE){
                
                if($_FILES['avatar']['name']==""){
                    $arr = array(
                        'title' => $this->input->post('title'),
                        'link' => $this->input->post('link'),
                        'content' => $this->input->post('content'),
                        'keyword' => $this->input->post('keyword'),
                        'desc' => $this->input->post('desc'),
                        'created' => time(),
                    );
                } else {
                    $config = array('upload_path'   => $this->_gallery_path,
                        'allowed_types' => 'gif|jpg|png',
                        'max_size'      => '2000');
                    $this->load->library("upload",$config);
                    if(!$this->upload->do_upload("avatar")){
                        $error = array($this->upload->display_errors());
                    }else{
                        $data =$this->upload->data();
                        $this->_create_thumb($data['file_name'],$this->_gallery_path);
                    }
                    //-----------------
                    $arr = array(
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'keyword' => $this->input->post('keyword'),
                        'desc' => $this->input->post('desc'),
                        'avatar' =>$data['file_name'],
                        'created' => time(),
                    );
                }
				$this->mservice->editById($id,$arr);
				$this->session->set_flashdata('ses_flash',"Sửa");
				redirect(base_url()."admin/service/listall");
			}
		}
		$this->_data['info'] = $this->mservice->getById($id);
		$this->_data['template'] = 'admin/service/modify_view';
		$this->_data['title'] = 'Trang Sửa User ';
		$this->load->view("layout/admin",$this->_data);

	}
    
    private function _create_thumb($source,$path){
        $this->load->library('image_lib');
        $config = array(
            "image_library"=>"gd2",
            "source_image"=>$path.'/'.$source,
            "new_image"=>$path.'/thumbnail/'.$source,
            "maintain_ratio"=>TRUE,
            "width"=>"490",
            "height"=>"300",
        );

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
}