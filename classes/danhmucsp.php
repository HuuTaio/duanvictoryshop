<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../helper/format.php');
    class danhmucsp
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
        //Thêm dm
        public function insert_danhmuc($tendm)
        {
            $tendm= $this ->fm->validation($tendm);
            $tendm= mysqli_real_escape_string($this->db->link, $tendm);

            if (empty($tendm) ) {
                // $alert='Danh mục không nên trống';
                // return $alert;
            }
            else {
                $query= "INSERT INTO tbl_danhmuc(tendm) VALUES('$tendm')";
                $_result= $this ->db->insert($query);
               if ($_result) {
                   $alert="<span class='success'>Thêm danh mục thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Thêm danh mục không thành công </span>";
                return $alert;
               }
                
            }
     
        }
        //Hiển thị danh mục
        public function show_danhmuc(){
            $query= "SELECT * FROM tbl_danhmuc order by iddm desc ";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        
        public function getdanhmucbyId($id){
            $query= "SELECT * FROM tbl_danhmuc where iddm ='$id'";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //cập nhật danh mục
        public function update_danhmuc($tendm,$id){
            $tendm= $this ->fm->validation($tendm);
            $tendm= mysqli_real_escape_string($this->db->link, $tendm);
            $id= mysqli_real_escape_string($this->db->link, $id);
            if (empty($tendm) ) {
                $alert='Danh mục không nên trống';
                return $alert;
            }
            else {
                $query= "UPDATE tbl_danhmuc SET tendm ='$tendm' Where iddm='$id'";
                $_result= $this ->db->update($query);
               if ($_result) {
                   $alert="<span class='success'>Update danh mục thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Update danh mục không thành công </span>";
                return $alert;
               }
                
            }
        }
        //xóa danh mục
        public function del_danhmuc($id){
            $query= "DELETE FROM tbl_danhmuc where iddm ='$id'";
            $_result= $this ->db->delete($query);
            if ($_result) {
                $alert="<span class='success'>Xóa danh mục thành công </span>";
                return $alert;
            }
            else {
                $alert="<span class='success'>Xóa danh mục không thành công </span>";
                return $alert;
               }
        
        }
        //show dang
        public function getdanhmuc(){
            $query= "SELECT * FROM tbl_danhmuc order by iddm desc";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //show all danh mục
        public function show_danhmuc_all(){
            $query= "SELECT * FROM tbl_danhmuc order by iddm asc ";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //show 
      public function get_product_by_cart($id){
        $query= "SELECT tbl_sanpham.*,tbl_danhmuc.tendm,tbl_danhmuc.iddm 
        FROM tbl_sanpham, tbl_danhmuc where tbl_sanpham.iddm =tbl_danhmuc.iddm and  tbl_sanpham.iddm='$id' ";
        $_result= $this ->db->insert($query);
        return $_result; 
      }   
    }
?>