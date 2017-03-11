<?php
class mproduct extends CI_Model{
    protected $_table='products';
    public function __construct(){
        parent::__construct();
    }
    
    public function listAll($limit,$start,$s=''){
        $this->db->select('products.*');
        $this->db->like('products.name',$s);
        $this->db->limit($limit,$start);
        $this->db->order_by('products.created','desc');
        return $this->db->get($this->_table)->result_array();
    }
    
    public function getAll(){
        $this->db->select('products.*');
        return $this->db->get($this->_table)->result_array();
    }
    // Lấy ra sản phẩm mói
    public function getNew(){
        $this->db->select('products.*');
        $this->db->limit(12,0);
        $this->db->order_by('products.id','random');
        return $this->db->get($this->_table)->result_array();
    }
    
    public function add($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }

    public function del($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
    public function numRows($s=''){
        $this->db->select('products.*');
        $this->db->like('products.name',$s);
        return $this->db->get($this->_table)->num_rows();
    }
    public function getById($id){
        $this->db->where("products.id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getByLink($link){
        $this->db->select('products.*');
        $this->db->where("products.link",$link);
        return $this->db->get($this->_table)->row_array();
    }
    public function editById($id,$data){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data);
    }
    // function kiểm tra tồn tại user
    public function checkLink($link){
        $this->db->where("link",$link);
        if($this->db->get($this->_table)->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
    public function getByCategory($category, $limit=0, $start=0, $s=''){
        $this->db->where("category",$category);
        $this->db->like('name',$s);
        if($limit!=0){
            $this->db->limit($limit, $start);   
        }
        $this->db->order_by('products.created','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function numRowCategory($category,$s=''){
        $this->db->where("category",$category);
        $this->db->like('name',$s);
        return $this->db->get($this->_table)->num_rows();
    }
    public function getFeaturedProducts(){
        $this->db->where("featured",1);
        $this->db->order_by('id','random');
        return $this->db->get($this->_table)->result_array();
    }
    public function getBestSellProducts(){
        $this->db->where("bestsell",1);
        $this->db->order_by('id','random');
        return $this->db->get($this->_table)->result_array();
    }
}