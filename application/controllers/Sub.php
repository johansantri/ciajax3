<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller {

	function __construct(){
	parent::__construct();
	  if(empty($this->session->userdata['email'])){
                redirect(site_url().'auth/login');
            }
	
	$this->load->model('Category_m');
}
	public function index()
	{
		    
            $data  = array('title' => 'Welcome',
                             
                            'isi'=>'dasbord/subCategory' ); 
   
      
            $this->load->view('setup/konek',$data);
	}
	


	public function list_all_sub(){
		$result = array('data' =>array() );
		$data=$this->Category_m->listAllSub();
			$no = 1;
		foreach ($data as $key => $value) {
		
			$button='<div class="btn-group">
	             
	             <a type="button" class="btn btn-outline-warning btn-sm" title="klick here on change" onclick="updateSubCategory('.$value['id_sub_category'].')" data-toggle="modal" data-target="#updateModal">  <span class="fa fa-pencil-square-o">edit</span> </a>
	             
	             
	            </div>';
			$result['data'][$key]=array(
				$no++,
				$value['nama_sub'],
				$value['nama_category'],
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

	public function get_id_sub($id=null){
		 if($id) {
            $data = $this->Category_m->getIdSub($id);
           $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit();
        }
	}

	public function updateSub($id=null){

		
			 if($id) {
            $validator = array('success' => false, 'messages' => array());

            $config = array(
            array(
            'field' => 'enama_sub',
            'label' => 'nama sub category',
            'rules' => 'trim|required|max_length[10]'
            )
             
               
           
        );
            $this->form_validation->set_rules($config);
            $this->form_validation->set_error_delimiters('<small class="text-danger control-label ">','</small>');

            if($this->form_validation->run() === true) {

                $edit = $this->Category_m->updateSub($id); 

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
public function insertSub(){
        
            $valid = array('success' =>false,'messages' => array() );
        $config = array(
            array(
                'field'     => 'nama_sub',
                'label'     =>'nama sub category',
                'rules'     =>'trim|required'
            ),
            array(
                'field'     => 'id_category',
                'label'     =>'status category',
                'rules'     =>'trim|required'
            )
         );

        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        if ($this->form_validation->run() === true) {
            $user=$this->Category_m->insertSub();
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

}
