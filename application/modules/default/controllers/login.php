<?php
class Login extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Sigin, Create Account - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Sigin, Create Account - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Sigin, Create Account - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='home';
        if($this->agent->mobile()){
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/login/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('login/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function validate(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->muser->checkLogin2($email, $password);
        if(count($user) != 0) {
            $wishList = array();
            $userData = array(
                'user_id' => $user['user_id'],
                'name' => $user['name'],
                'user_email' => $user['user_email'],
                'user_address' => $user['user_address'],
                'loggedIn' => true,
                'wishList' => $wishList
            );
            $this->session->set_userdata($userData);
            redirect();
        } else {
            $this->session->set_flashdata('response','Email or password is incorect');
            redirect(base_url().'sign-in');
        }
    }
    
    public function facebook(){
		$user = $this->facebook->getUser();
        if ($user) {
            $user_fb = $this->facebook->api('/me/');
            if(count($this->muser->getUserByIdOther($user_fb['id']))==0){
                $data = array(
                    'id_other'=>$user_fb['id'],
                    'name'=> $user_fb['name']
                );
                $this->muser->addUser($data);   
            }
            $user = $this->muser->getUserByIdOther($user_fb['id']);
            $wishList = array();
            $newdata = array(
                'user_id' => $user['user_id'],
                'name' => $user_fb['name'],
                'user_email' => $user['user_email'],
                'user_address' => $user['user_address'],
                'loggedIn' => true,
                'wishList' => $wishList
            );
            $this->session->set_userdata($newdata);
            redirect();
        }
        else{
            redirect($this->facebook->getLoginUrl());
        }
        // $this->session->set_flashdata('response','This function is updating...');
        // redirect(base_url().'sign-in');

    }
    
    public function signup(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $gender = $this->input->post('sex');
        $birthday = $this->input->post('birthday');
        $signUpData = array(
            'signUpEmail' => $email,
            'signUpPassword' => $password,
            'signUpPassword2' => $password2,
            'signUpName' => $name,
            'signUpAddress' => $address
        );
        $this->session->set_userdata($signUpData);
        if(!$this->muser->checkEmail($email)) {
            $this->session->set_flashdata('response','This email has already sign up');
            redirect(base_url().'sign-in');
        }
        if($password !== $password2) {
            $this->session->set_flashdata('response','Password confirm not match');
            redirect(base_url().'sign-in');
        }
        $data = array(
            'user_name' => $email,
            'user_pass' => $password,
            'name' => $name,
            'user_email' => $email,
            'user_type' => 'member',
            'user_gender' => $gender,
            'user_birthday' => $birthday,
            'user_address' => $address
        );
        $this->muser->addUser($data);
        $this->session->unset_userdata($signUpData);
        $this->session->set_flashdata('response','Sign Up Account Success');
        redirect();
    }
    
    public function signout(){
        $this->session->sess_destroy();
        redirect();
    }
 }