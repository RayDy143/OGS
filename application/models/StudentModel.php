<?php
    /**
     *
     */
    class StudentModel extends CI_Model
    {
        public function Add($fields)
        {
            $this->db->insert('student',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getStudent($classid)
        {
            $query=$this->db->query("SELECT * FROM student where IsDeleted=0 and ClassID='$classid'");
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }
        public function Update($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('student',$fields);
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
            $this->db->update('student',$field);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
