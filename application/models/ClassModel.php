<?php
    /**
     *
     */
    class ClassModel extends CI_Model
    {
        public function Add($fields)
        {
            $this->db->insert('classes',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getClass()
        {
            $query=$this->db->query("SELECT * FROM classes inner join useraccount on classes.UserID=useraccount.UserAccountID");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getClassByTeacher()
        {
            $tid=$_SESSION['UserAccountID'];
            $query=$this->db->query("SELECT * FROM classes inner join useraccount on classes.UserID=useraccount.UserAccountID where UserID='$tid'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getSpecificClass($id)
        {
            $query=$this->db->query("SELECT * FROM classes inner join useraccount on classes.UserID=useraccount.UserAccountID where ClassID='$id'");
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
    }

 ?>
