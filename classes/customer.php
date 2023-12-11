<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../helper/format.php');
    class customer
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
       // insert user
     public function insertCustomer($data,$files){
        $name= mysqli_real_escape_string($this->db->link, $data['name']);
        $pass= mysqli_real_escape_string($this->db->link, $data['pass']);
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $Phone= mysqli_real_escape_string($this->db->link, $data['Phone']);
        $City= mysqli_real_escape_string($this->db->link, $data['City']);
        $address= mysqli_real_escape_string($this->db->link, $data['address']); 
        // // kiểm tra hinh ảnh và lấy hình ảnh vào foder
        // //$image= mysqli_real_escape_string($this->db->link, $data['image']);
        // $permited = array('jpg', 'jpeg', 'png', 'gif');
        // $file_name = $_FILES['image']['name'];
        // $file_size = $_FILES['image']['size'];
        // $file_temp = $_FILES['image']['tmp_name'];

        // $div = explode('.', $file_name);
        // $file_ext= strtolower(end($div));
        // $unique_image=substr(md5(time()), 0, 10).'.'.$file_ext;
        // $uploaded_image= "uploads/".$unique_image;
        
        
    
        if ($name =="" || $pass=="" || $email==""|| $Phone==""|| $City=="" || $address=="" ) {
            $alert='Không được để trống';
            
       
            return $alert;
            
        }
      
            
        else {
           
            $checkemail=" SELECT * FROM tbl_user where email='$email' LIMIT 1  " ;
            $resultcheck=$this->db->select($checkemail);
            if ($resultcheck) {
                $alert="<span> Email đã được đăng ký </span>";
                return $alert;
            }
            else{
                // move_uploaded_file($file_temp,$uploaded_image);
                $query= "INSERT INTO tbl_user(name,pass,email,Phone,City,address) VALUES('$name'
                ,'$pass','$email','$Phone','$City','$address')";
                $_result= $this ->db->insert($query);
               if ($_result) {
                   $alert="<span class='success'>Đăng ký thành công </span>";
                   return $alert;
               }
               else {
                $alert="<span class='success'>Đăng ký thất bại </span>";
                return $alert;
               }
            }

        }
    } 
    // đăng nhập ng dúng
         public function loginCustomer($data){
            $email= mysqli_real_escape_string($this->db->link, $data['email']);
            $pass= mysqli_real_escape_string($this->db->link, $data['pass']);
            
            if ($email ==""  || $pass=="" ) {
               
                $alert='email và pass không được để trống';
                return $alert;
            }
            else {
                $checkLogin=" SELECT * FROM tbl_user where email='$email' and pass='$pass' LIMIT 1  " ;
                $resultcheck=$this->db->select($checkLogin);
                if ($resultcheck != false) {
                    $value= $resultcheck-> fetch_assoc();
                    session::set('customer_login',true);
                    session::set('customer_id',$value['id']);
                    session::set('customer_name',$value['name']);
                    // header('location:index.php');

                }
                else{
                    $alert='email và pass không đúng';
                    return $alert;
                }
    
            }
     
         }

         // show user address
         public function show_customer($id){
            $query= "SELECT * FROM tbl_user Where id='$id'";
         
            $result= $this ->db->select($query);
            return $result;
         }


         //cập nhật thông tin khách hàng

         public function updatecustomer($data,$id){
            $name= mysqli_real_escape_string($this->db->link, $data['name']);
            $pass= mysqli_real_escape_string($this->db->link, $data['pass']);
            $email= mysqli_real_escape_string($this->db->link, $data['email']);
            $Phone= mysqli_real_escape_string($this->db->link, $data['Phone']);
            $City= mysqli_real_escape_string($this->db->link, $data['City']);
            $address= mysqli_real_escape_string($this->db->link, $data['address']);
        
            if ($name =="" || $pass=="" || $email==""|| $Phone==""|| $City=="" ||$address=="" ) {
                $alert='<span> Không được để trống</span>';
                return $alert;
            }
            else {
               
                    $query= "UPDATE tbl_user SET
                     name='$name' ,pass='$pass' ,email='$email' ,Phone='$Phone' , City='$City', address='$address' 
              
                     Where id='$id'";
      
                    $_result= $this ->db->insert($query);
                   if ($_result) {
                       $alert="<span class='success'>Cập nhật thành công </span>";
                       return $alert;
                   }
                   else {
                    $alert="<span class='success'>Cập nhật thất bại </span>";
                    return $alert;
                   }
                }
    
            
         }
    }
?>