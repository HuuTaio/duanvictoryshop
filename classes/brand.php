<?php
//Đưa ra một chuỗi chứa đường dẫn của tệp hoặc thư mục,
// hàm này sẽ trả về đường dẫn của thư mục mẹ levelstừ thư mục hiện tại.
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../helper/format.php');
    class brand
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
        //Thêm thương hiệu
        public function insert_brand($brandName)
        {
            $brandName= $this ->fm->validation($brandName);
            $brandName= mysqli_real_escape_string($this->db->link, $brandName);

            if (empty($brandName) ) {
                $alert='Thương hiệu không nên trống';
                return $alert;
            }
            else {
                $query= "INSERT INTO tbl_brand(brandName) VALUES('$$brandName')";
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
        public function show_brand(){
            $query= "SELECT * FROM tbl_brand order by brandid desc ";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        
        public function getdanhmucbyId($id){
            $query= "SELECT * FROM tbl_brand where brandid ='$id'";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //cập nhật danh mục
        public function update_brand($brandName,$id){
            $brandName= $this ->fm->validation($brandName);
            $brandName= mysqli_real_escape_string($this->db->link, $brandName);
            $id= mysqli_real_escape_string($this->db->link, $id);
            if (empty($brandName) ) {
                $alert='Danh mục không nên trống';
                return $alert;
            }
            else {
                $query= "UPDATE tbl_brand SET brandName ='$brandName' Where brandid='$id'";
                $_result= $this ->db->update($query);
               if ($_result) {
                   $alert="<span class='success'>Update thương hiệu thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Update thương hiệu không thành công </span>";
                return $alert;
               }
                
            }
        }
        //xóa danh mục
        public function del_brand($id){
            $query= "DELETE FROM tbl_brand where brandid ='$id'";
            $_result= $this ->db->delete($query);
            if ($_result) {
                $alert="<span class='success'>Xóa thương hiệu thành công </span>";
                return $alert;
            }
            else {
                $alert="<span class='success'>Xóa thương hiệu không thành công </span>";
                return $alert;
               }
        
        }
        
    }
?>