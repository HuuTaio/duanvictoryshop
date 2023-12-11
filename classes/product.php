<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ( $filepath .'/../lib/database.php');
 include_once ( $filepath .'/../helper/format.php');
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
        //Thêm sản phẩm                //=$_post //=$_file 
        public function insert_product($data,$files)
        {
            // $tendm= $this ->fm->validation($tendm);
            $tensp= mysqli_real_escape_string($this->db->link, $data['tensp']);
            $danhsachsp= mysqli_real_escape_string($this->db->link,$data['danhsachsp']);
// ghi = name dữ liệu bên form
            $brand= mysqli_real_escape_string($this->db->link, $data['brand']);

             $mota= mysqli_real_escape_string($this->db->link, $data['mota']);
            $price= mysqli_real_escape_string($this->db->link, $data['price']);
            $giam_price= mysqli_real_escape_string($this->db->link, $data['giam_price']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);

            // kiểm tra hinh ảnh và lấy hình ảnh vào foder
            //$image= mysqli_real_escape_string($this->db->link, $data['image']);
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext= strtolower(end($div));
            $unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image= "uploads/".$unique_image;

            if ($tensp =="" || $danhsachsp=="" || $brand=="" || $mota=="" || $type=="" || $price== "" || $file_name==""  || $giam_price=="") {
                $alert='Không được để trống';
                return $alert;
            }
            else {
                //di chuyển tệp
                move_uploaded_file($file_temp,$uploaded_image);
                $query= "INSERT INTO tbl_sanpham(tensp,iddm,brandid,mota,type,price,image,giam_price) VALUES('$tensp'
                ,'$danhsachsp','$brand','$mota','$type','$price','$unique_image','$giam_price')";
                $_result= $this ->db->insert($query);
               if ($_result) {
                   $alert="<span class='success'>Thêm sản phẩm thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Thêm sản phẩm không thành công </span>";
                return $alert;
               }
                return $_result;
            }
     
        }
        //Hiển thị sản phẩm
        public function show_product(){
            // $query= "SELECT * FROM tbl_sanpham order by idsp desc ";
            $query= "SELECT tbl_sanpham .*, tbl_danhmuc.tendm, tbl_brand.brandName 

            FROM tbl_sanpham  INNER JOIN tbl_danhmuc ON tbl_sanpham.iddm = tbl_danhmuc.iddm
            INNER JOIN tbl_brand ON tbl_sanpham.brandid = tbl_brand.brandid
             order by tbL_sanpham.idsp desc";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        
        public function getsanphambyId($id){
            $query= "SELECT * FROM tbl_sanpham where idsp ='$id'";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //cập sản phâm
        public function update_product($data,$files,$id){
            
               // $tendm= $this ->fm->validation($tendm);
               $tensp= mysqli_real_escape_string($this->db->link, $data['tensp']);
               $danhsachsp= mysqli_real_escape_string($this->db->link,$data['danhsachsp']);
   // ghi = name dữ liệu bên form
               $brand= mysqli_real_escape_string($this->db->link, $data['brand']);
   
                $mota= mysqli_real_escape_string($this->db->link, $data['mota']);
               $price= mysqli_real_escape_string($this->db->link, $data['price']);
               $giam_price= mysqli_real_escape_string($this->db->link, $data['giam_price']);
               $type= mysqli_real_escape_string($this->db->link, $data['type']);
   
               // kiểm tra hinh ảnh và lấy hình ảnh vào foder
               //$image= mysqli_real_escape_string($this->db->link, $data['image']);
               $permited = array('jpg', 'jpeg', 'png', 'gif');
               $file_name = $_FILES['image']['name'];
               $file_size = $_FILES['image']['size'];
               $file_temp = $_FILES['image']['tmp_name'];
   
               $div = explode('.', $file_name);
               $file_ext= strtolower(end($div));
               $unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
               $uploaded_image= "uploads/".$unique_image;
            if (($tensp =="" || $danhsachsp=="" || $brand=="" || $mota=="" || $type=="" || $price== "" || $file_name=="" || $giam_price=="") ) {
                $alert='Tất cả danh mục không nên trống';
                return $alert;
            }
            else{
                // nếu ng dùng chọn ảnh
                if (empty($file_name)) {
                    // if ($file_size>2048) {
                    //     // echo "<span class='error'> Image size should be less then 1MB </spand>";
                    //     $alert="<span class='success'>Image size should be less then 1MB </span>";
                    //     return $alert;
                    // }

                    // elseif (in_array($file_ext, $permited) == false) {
                    //    // echo "<span class='error'>You can upload only:-".implode(',',$permited). "</span>";
                    //     $alert="<span class='success'>You can upload only:-".implode(', ',$permited). "</span>";
                    //     return $alert;
                    // }
                    $query= "UPDATE tbl_sanpham SET 
                    tensp ='$tensp' ,
                    danhsachsp ='$danhsachsp' ,
                      brand ='$brand' , 
                       mota ='$mota' ,
                       type ='$type ,
                       price ='$price' ,
                        image ='$unique_image' ,
                          giam_price ='$giam_price' 
                    ' 
                    
                 
                    
                    Where idsp='$id'";
                    // $_result= $this ->db->update($query);
                }
                // nếu ng dùng ko chọn ảnh
                else{
                    $query= "UPDATE tbl_sanpham SET     tensp ='$tensp' ,
                                      danhsachsp ='$danhsachsp',  
                                            brand ='$brand' , 
                                          mota ='$mota' ,

                type ='$type'
                    price ='$price' ,
                    giam_price ='$giam_price' 
                
                    
                    Where idsp='$id'";
                }

            }
            
                // $query= "UPDATE tbl_danhmuc SET tendm ='$tendm' Where iddm='$id'";
                $_result= $this ->db->update($query);
               if ($_result) {
                   $alert="<span class='success'>Update sản phẩm thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Update sản phẩm không thành công </span>";
                return $alert;
               }
                
            }
        
        //xóa danh mục
        public function del_product($id){
            $query= "DELETE FROM tbl_sanpham where idsp ='$id'";
            $_result= $this ->db->delete($query);
            if ($_result) {
                $alert="<span class='success'>Xóa sản phẩm thành công </span>";
                return $alert;
            }
            else {
                $alert="<span class='success'>Xóa sản phẩm không thành công </span>";
                return $alert;
               }
        
        }
        //end backend
        public function getproduct_noibac(){
            $query= "SELECT * FROM tbl_sanpham where type ='1' LIMIT 4";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //show sp mới
        public function getproduct_new(){
            $query= "SELECT * FROM tbl_sanpham order by idsp desc LIMIT 4 ";
            $_result= $this ->db->insert($query);
            return $_result;
        }
        //show chi tiết
        public function get_chitiet($id){
        $query= "SELECT tbl_sanpham .*, tbl_danhmuc.tendm, tbl_brand.brandName 

        FROM tbl_sanpham  INNER JOIN tbl_danhmuc ON tbl_sanpham.iddm = tbl_danhmuc.iddm
        INNER JOIN tbl_brand ON tbl_sanpham.brandid = tbl_brand.brandid
         where tbl_sanpham.idsp='$id'"
         ;

        $_result= $this ->db->insert($query);
        return $_result;
    }
    // public function get_sanpham(){
    //     $query= "SELECT * FROM tbl_danhmuc order by idsp desc LIMIT 4 ";
    //     $_result= $this ->db->insert($query);
    //     return $_result;
    // }
    }
?>