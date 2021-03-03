<?php
class Users_m extends CI_Model {
 
    public $status;
    public $level;
   
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
        $this->level = $this->config->item('level');
    }    
   
    public function insertUser($d)
    {  
            $string = array(
                'nama_depan'=>$d['nama_depan'],               
                'email'=>$d['email'],
                   'nama_belakang'=>$d['nama_belakang'],
                   'jenis_kelamin'=>$d['jenis_kelamin'],
                   'aturan'=>$d['aturan'],
                'level'=>$this->level[0],
                'status'=>$this->status[0]
            );
            $q = $this->db->insert_string('t_daftar',$string);            
            $this->db->query($q);
            return $this->db->insert_id();
    }
   
    public function isDuplicate($email)
    {    
        $this->db->get_where('t_daftar', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;        
    }
   
    public function insertToken($id_user)
    {  
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');
       
        $string = array(
                'token'=> $token,
                'id_user'=>$id_user,
                'created'=>$date
            );
        $query = $this->db->insert_string('t_tokens',$string);
        $this->db->query($query);
        return $token . $id_user;
       
    }
   
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('t_tokens', array(
            't_tokens.token' => $tkn,
            't_tokens.id_user' => $uid), 1);                        
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();            
           
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);
           
            if($createdTS != $todayTS){
                return false;
            }
           
            $user_info = $this->getUserInfo($row->id_user);
            return $user_info;
           
        }else{
            return false;
        }
       
    }    
   
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('t_daftar', array('id_user' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
   
    public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'terakhir_masuk' => date('Y-m-d h:i:s A'),
               'status' => $this->status[1]
            );
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('t_daftar', $data);
        $success = $this->db->affected_rows();
       
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['id_user'].')');
            return false;
        }
       
        $user_info = $this->getUserInfo($post['id_user']);
        return $user_info;
    }
   
    public function checkLogin($email)
    {
        //$this->load->library('password');      
        $hasil = $this->db->where('email', $email)->limit(1)->get('t_daftar');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
       
        $this->updateLoginTime($userInfo->id_user);
       
        unset($userInfo->password);
        return $userInfo;
    }
   
    public function updateLoginTime($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('t_daftar', array('terakhir_masuk' => date('Y-m-d h:i:s A')));
        return;
    }
   
    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('t_daftar', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
   
    public function updatePassword($post)
    {  
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('t_daftar', array('password' => $post['password']));
        $success = $this->db->affected_rows();
       
        if(!$success){
            error_log('Unable to updatePassword('.$post['id_user'].')');
            return false;
        }        
        return true;
    }
        public function hitungUsr(){
    $this->db->select('COUNT(id_user) as total');
        
        $this->db->from('t_daftar');
        $query=$this->db->get();
        return $query->row_array();
}

      
   
}