<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	function __construct(){
	parent::__construct();
	  if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
	
	$this->load->model('Category_m');
	$this->load->model('Blog_m');
}
	public function index()
	{
		    
            $data  = array('title' => 'Welcome',
                             
                            'isi'=>'dasbord/blog' ); 
   
      
            $this->load->view('setup/konek',$data);
	}

	public function insert(){
		
			$valid = array('success' =>false,'messages' => array() );
		$config = array(
			array(
				'field'		=> 'title',
				'label'		=>'title',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'meta',
				'label'		=>'meta',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'description',
				'label'		=>'description',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'tags',
				'label'		=>'tags',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'id_categori',
				'label'		=>'category',
				'rules'		=>'required'
			),
			array(
				'field'		=> 'id_sub_categori',
				'label'		=>'sub',
				'rules'		=>'required'
			)
			
		 );

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if ($this->form_validation->run() === true) {
			$user=$this->Blog_m->insert();
			if ($user===true) {
				$valid['success']=true;
				$valid['messages']="success create data";
			}else{
				$valid['success']=false;
				$valid['messages']="someting wrong...";
			}
		}else{
			$valid['success']=false;
			foreach ($_POST as $key => $value) {
				$valid['messages'][$key]=form_error($key);
			}
		}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($valid, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
		

	}

	public function subCategori()
	{
		if($this->input->post('id_categori'))
		{
		echo $this->Blog_m->subCategori($this->input->post('id_categori'));
		}
	}

	public function esubCategori()
	{
		if($this->input->post('eid_categori'))
		{
		echo $this->Blog_m->subCategori($this->input->post('eid_categori'));
		}
	}

	public function list_all(){
		$result = array('data' =>array() );
		$data=$this->Blog_m->listAll();
			$no = 1;
		foreach ($data as $key => $value) {
		
			$button='<div class="btn-group">
	             
	             <a type="button" class="btn btn-outline-warning btn-sm" title="klick here on change" onclick="updateBlog('.$value['id_blog'].')" data-toggle="modal" data-target="#updateModal">  <span class="fa fa-pencil-square-o">edit</span> </a>
	             
	             
	            </div>';
			$result['data'][$key]=array(
				$no++,
				$value['title'],
				$value['meta'],
				$value['nama_category'],
				$value['nama_sub'],				
				$value['create_ad'],
				$value['update_ad'],
				$value['status'],
				$value['nama_depan'],
				$button
			);
		}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        
        ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
		//echo json_encode($result);
	}

	public function get_id($id=null){
		 if($id) {
            $data = $this->Blog_m->getId($id);
           $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
        }
	}

	public function update($id=null){

		
			 if($id) {
            $validator = array('success' => false, 'messages' => array());

          $config = array(
			array(
				'field'		=> 'etitle',
				'label'		=>'title',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'emeta',
				'label'		=>'meta',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'edescription',
				'label'		=>'description',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'etags',
				'label'		=>'tags',
				'rules'		=>'trim|required'
			),
			array(
				'field'		=> 'eid_categori',
				'label'		=>'category',
				'rules'		=>'required'
			),
			array(
				'field'		=> 'eid_sub_categori',
				'label'		=>'sub',
				'rules'		=>'required'
			)
			
		 );
             
               
           
        
            $this->form_validation->set_rules($config);
            $this->form_validation->set_error_delimiters('<small class="text-danger control-label ">','</small>');

            if($this->form_validation->run() === true) {

                $edit = $this->Blog_m->update($id); 

                if($edit === true) {
                    $validator['success'] = true;
                    $validator['messages'] = "Successfully updated";
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = "Error while updating the infromation";
                }           
            } 
            else {
                $validator['success'] = false;
                foreach ($_POST as $key => $value) {
                    $validator['messages'][$key] = form_error($key);    
                }           
            }

           $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($validator, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
        }
	}	


}
