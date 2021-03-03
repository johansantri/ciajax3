<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_m extends CI_Model {
public function __construct(){
	parent::__construct();
}
	
	public function insert()
	{	
		$status="draft";
		 $slug = url_title($this->input->post('title'), 'dash', TRUE);
		$data = array('title' 		=>	$this->input->post('title',true) ,
						'slug' => $slug,
					 'meta' 		=> $this->input->post('meta',true),
					 'description' 		=> $this->input->post('description'),
					 'tags' 		=> $this->input->post('tags',true),
					 'status' 		=> $status,
					 'id_categori' 		=> $this->input->post('id_categori',true),
					 'id_sub_categori' 		=> $this->input->post('id_sub_categori',true),
					'id_user'        => $this->session->userdata('id_user'));

		$sql=$this->db->insert('t_blog',$data);
		if($sql===true){
			return true;
		}else{
			return false;
		}
	}

	public function listAll(){
		/*$id = $this->session->userdata['id_user']; 
		$this->db->where('t_jurusan.id_user',$id);*/
		$this->db->select('t_blog.id_blog,t_blog.title,t_blog.meta,t_blog.status,t_blog.create_ad,t_blog.update_ad,t_daftar.nama_depan,t_category.nama_category,t_sub_category.nama_sub');
		$this->db->join('t_category','t_category.id_category=t_blog.id_categori');
		$this->db->join('t_sub_category','t_sub_category.id_sub_category=t_blog.id_sub_categori');
		$this->db->join('t_daftar','t_daftar.id_user=t_blog.id_user');
		$this->db->from('t_blog');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function getId($id=null){
		if ($id) {
    		
    	
		$this->db->where('t_blog.id_blog',$id);
		$this->db->select('t_blog.id_blog,t_blog.title,t_blog.meta,t_blog.description,t_blog.tags,t_blog.status,t_blog.create_ad,t_blog.update_ad,t_daftar.nama_depan,t_category.nama_category,t_category.id_category,t_sub_category.nama_sub,t_sub_category.id_sub_category');
		$this->db->join('t_category','t_category.id_category=t_blog.id_categori');
		$this->db->join('t_sub_category','t_sub_category.id_sub_category=t_blog.id_sub_categori');
		$this->db->join('t_daftar','t_daftar.id_user=t_blog.id_user');
		$this->db->from('t_blog');
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
			$status="draft";
			$update_ad=date("Y-m-d h:i:s");
			$slug = url_title($this->input->post('etitle'), 'dash', TRUE);
			$data = array('title' 		=>	$this->input->post('etitle',true) ,
						'slug' => $slug,
					 'meta' 		=> $this->input->post('emeta',true),
					 'description' 		=> $this->input->post('edescription'),
					 'tags' 		=> $this->input->post('etags',true),
					 'status' 		=> $status,
					 'update_ad'	=>$update_ad,
					 'id_categori' 		=> $this->input->post('eid_categori',true),
					 'id_sub_categori' 		=> $this->input->post('eid_sub_categori',true),
					'id_user'        => $this->session->userdata('id_user'));

			$this->db->where('id_blog', $id);
			$sql=$this->db->update('t_blog',$data);
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
    



 function subCategori($id_categori)
 {
  $this->db->where('id_category', $id_categori);
  $this->db->order_by('nama_sub', 'ASC');
  $query = $this->db->get('t_sub_category');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id_sub_category.'">'.$row->nama_sub.'</option>';
  }
  return $output;
 }


}

