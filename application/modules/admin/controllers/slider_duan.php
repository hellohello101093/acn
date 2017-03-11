<?php
class slider_duan extends MY_Controller{

	public function __construct(){
		parent::__construct();
        $this->_data['now'] = 'Slider Dự Án';
        $this->load->model('mslider_duan');

        $user = $this->session->userdata('user');
        if(!$user || $user['user_type'] != 'administrator'){
            redirect(base_url()."admin/login");
        }
        $this->form_validation->CI =& $this;
        //--------
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->_gallery_url = base_url()."public/slider_duan/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH. "../public/slider_duan");
	}
	public function listall(){

		$this->_data['template'] = 'admin/slider_duan/list_view';
		$this->_data['title'] = 'Trang Quản Lý Danh Mục ';
		$this->_data['info'] = $this->mslider_duan->listAll();
		$this->load->view("layout/admin",$this->_data);
	}
	public function add(){
        $this->_data['action'] = strtolower(__FUNCTION__);
		if(isset($_POST['ok'])){
            $this->form_validation->set_rules("link","Link","required");
            $this->form_validation->set_rules("image","Hình Ảnh","callback_image_check");
            if($this->form_validation->run()==TRUE){
                //----------------
                $config = array('upload_path'   => $this->_gallery_path,
                    'allowed_types' => 'gif|jpg|png',
                    'max_size'      => '2000');
                $this->load->library("upload",$config);
                if(!$this->upload->do_upload("image")){


                }else{
                    $data =$this->upload->data();
                    //-----------------
                    $arr = array(
                        'link' => $this->input->post('link'),
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'image' =>$data['file_name'],
                        'sort' =>  $this->input->post('sort'),
                    );
                    $this->mslider_duan->add($arr);
                    $this->session->set_flashdata('ses_flash',"Thêm");
                    redirect(base_url()."admin/slider_duan/listall");
                }

			}
		}
		$this->_data['template'] = 'admin/slider_duan/modify_view';
		$this->_data['title'] = 'Trang Thêm Thực Đơn ';
		$this->load->view("layout/admin",$this->_data);
	}
    function image_check(){
        if ($_FILES['image']['name']!='') return true;
        $this->form_validation->set_message('image_check', 'Vui lòng tải Ảnh Đại Diện');
        return FALSE;
    }

	public function del($id){
        $slider_duan = $this->mslider_duan->getById($id);
        unlink($this->_gallery_path.'/'.$slider_duan['image']);
		$this->mslider_duan->del($id);
		$this->session->set_flashdata('ses_flash',"Xóa");
		redirect(base_url()."admin/slider_duan/listall");
	}
	public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
		if(isset($_POST['ok'])){
            $this->form_validation->set_rules("link","Link","required");
            if($this->form_validation->run()==TRUE){
                if($_FILES['image']['name']==""){
                    $arr = array(
                        'link' => $this->input->post('link'),
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'sort' =>  $this->input->post('sort'),
                    );
                    $this->mslider_duan->editById($id,$arr);
                    $this->session->set_flashdata('ses_flash',"Sửa");
                    redirect(base_url()."admin/slider_duan/listall");
                }else{
                    //----------------
                    $config = array('upload_path'   => $this->_gallery_path,
                        'allowed_types' => 'gif|jpg|png',
                        'max_size'      => '2000');
                    $this->load->library("upload",$config);
                    if(!$this->upload->do_upload("image")){



                    }else{
                        $data =$this->upload->data();

                        $arr = array(
                            'link' => $this->input->post('link'),
                            'title' => $this->input->post('title'),
                            'description' => $this->input->post('description'),
                            'image' =>$data['file_name'],
                            'sort' =>  $this->input->post('sort'),
                        );
                        $this->mslider_duan->editById($id,$arr);
                        $this->session->set_flashdata('ses_flash',"Sửa");
                        redirect(base_url()."admin/slider_duan/listall");
                    }
                }

			}
		}
		$this->_data['info'] = $this->mslider_duan->getById($id);
		$this->_data['template'] = 'admin/slider_duan/modify_view';
		$this->_data['title'] = 'Trang Sửa User ';
		$this->load->view("layout/admin",$this->_data);

	}
    public function sort(){
        $id = $_POST['id'];
        $value = $_POST['value'];
        $arr = array(
            'sort' => $value,
        );
        $this->mslider_duan->editById($id,$arr);
    }

}