<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {
public function __construct(){
	parent::__construct();
}
	
	public function insert()
	{
		$data = array('nama_category' 		=>	$this->input->post('nama_category',true) ,
					 'status_category' 		=> $this->input->post('status_category',true));

		$sql=$this->db->insert('t_category',$data);
		if($sql===true){
			return true;
		}else{
			return false;
		}
	}

	public function listAll(){
		/*$id = $this->session->userdata['id_user']; 
		$this->db->where('t_jurusan.id_user',$id);*/
		$this->db->select('*');
		
		$this->db->from('t_category');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function getId($id=null){
		if ($id) {
    		
    	
    	$this->db->where('t_category.id_category',$id);
		$this->db->select('*');		
		$this->db->from('t_category');
    	$query=$this->db->get();
    	return $query->row_array();
    	if ($query===true) {
    		return true;
    	}else{
    		return false;
    	}
    }
	}
	public function update($id=null){
		if ($id) {
			$data = array('nama_category' 		=> $this->input->post('enama_category',true),
					 	'status_category' 		=> $this->input->post('estatus_category',true));
			$this->db->where('id_category', $id);
			$sql=$this->db->update('t_category',$data);
			if($sql===true){
				return true;

			}else{
				return false;
			}
		}
	}


	public function insertSub()
	{
		$data = array('nama_sub' 		=>	$this->input->post('nama_sub',true) ,
					 'id_category' 		=> $this->input->post('id_category',true));

		$sql=$this->db->insert('t_sub_category',$data);
		if($sql===true){
			return true;
		}else{
			return false;
		}
	}

	public function listAllSub(){
		/*$id = $this->session->userdata['id_user']; 
		$this->db->where('t_jurusan.id_user',$id);*/
		$this->db->select('t_sub_category.id_sub_category,t_sub_category.nama_sub,t_sub_category.id_category,t_category.nama_category');	
		$this->db->join('t_category','t_sub_category.id_category=t_category.id_category');	
		$this->db->from('t_sub_category');
		
		$query=$this->db->get();
		return $query->result_array();
	}

	public function getIdSub($id=null){
		if ($id) {
    		
    	
    	$this->db->where('t_sub_category.id_sub_category',$id);
		$this->db->select('t_sub_category.id_sub_category,t_sub_category.nama_sub,t_sub_category.id_category,t_category.nama_category');	
		$this->db->join('t_category','t_sub_category.id_category=t_category.id_category');	
		$this->db->from('t_sub_category');
    	$query=$this->db->get();
    	return $query->row_array();
    	if ($query===true) {
    		return true;
    	}else{
    		return false;
    	}
    }
	}
	public function updateSub($id=null){
		if ($id) {
			$data = array('nama_sub' 		=> $this->input->post('enama_sub',true),
					 	'id_category' 		=> $this->input->post('eid_category',true));
			$this->db->where('id_sub_category', $id);
			$sql=$this->db->update('t_sub_category',$data);
			if($sql===true){
				return true;

			}else{
				return false;
			}
		}
	}

	
	function jumlah_data(){
		return $this->db->get('t_category')->num_rows();
	}
    

}

