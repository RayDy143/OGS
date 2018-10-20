<?php
    /**
     *
     */
    class UserAccountModel extends CI_Model
    {
        public function Add($fields)
        {
            $this->db->insert('useraccount',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Authenticate($where)
        {
            $this->db->where($where);
            $query=$this->db->get('useraccount');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Get()
        {
            $query=$this->db->query("SELECT * FROM useraccount inner join role on useraccount.RoleID=role.RoleID where useraccount.IsDeleted=0");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getTeacher()
        {
            $query=$this->db->query("SELECT * FROM useraccount inner join role on useraccount.RoleID=role.RoleID where useraccount.IsDeleted=0 and role.Role='Teacher'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Update($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('useraccount',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Delete($where)
        {
            $field = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('useraccount',$field);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
