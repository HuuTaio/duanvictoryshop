<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/database.php');
 include_once ($filepath.'/../helper/format.php');
    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
       
        public function add_to_cart($quanlity,$id){
            $quanlity= $this ->fm->validation($quanlity);
            $quanlity= mysqli_real_escape_string($this->db->link, $quanlity);
            $id= mysqli_real_escape_string($this->db->link,$id);
            $sId=session_id();

            $query = " SELECT * FROM tbl_sanpham where idsp ='$id' ";
            $result = $this ->db->select($query)->fetch_assoc();

            $image = $result["image"];
            $price = $result["price"];
            $giam_price = $result["giam_price"];
            $tensp = $result["tensp"];

            // $checkcart=" SELECT * FROM tbl_sanpham where idsp ='$id' and sId='$sId'  ";
            // if ($checkcart) {
            //     $msg="Sản phẩm đã được thêm vào giỏ hàng";
            //     return $msg;
            // }
            // else{
           

            $query_insert= "INSERT INTO tbl_cart(idsp,quanlity,sid,image,price ,giam_price,tensp) VALUES('$id'
            ,'$quanlity','$sId','$image','$price','$giam_price','$tensp')";

            $insert_cart = $this ->db->insert($query_insert);
           if ($result) {
           header('location:cart.php');
           }
           else {
           header('location:index.php');
           }
                  
            // }

        }
        public function getproduct_cart(){
            $sId =session_id();
            $query= "SELECT * FROM tbL_cart Where sId ='$sId'";
            $result= $this->db->select($query);
            return $result;
        }



    public function update_quanlity($cartId,$quanlity){
   
           $cartId= mysqli_real_escape_string($this->db->link,$cartId);
           $quanlity= mysqli_real_escape_string($this->db->link, $quanlity);
            $query= "UPDATE tbl_cart SET quanlity =' $quanlity' Where cartId='$cartId'";
              $result= $this -> db-> update($query);
              echo $query;
        if ($result) {
            $msg="Update thành công";
            return $msg;
        }
        else {
            $msg="Update không thành công";
            return $msg;
        }
        }
        public function delproduct_cart($cartId){
            $cartId= mysqli_real_escape_string($this->db->link,$cartId); 
            $query = " DELETE FROM tbl_cart where cartId ='$cartId' ";
            $result= $this->db->delete($query);
            if ($result) {
                header('location:cart.php');
            }
            else {
                $msg="Xóa không thành công";
                return $msg;
            }
        }
        public function checkcart(){
            $sId =session_id();
            $query= "SELECT * FROM tbL_cart Where sId ='$sId'";
            $result= $this->db->select($query);
            return $result;
        }
        public function check_oder( $customer_id){
            $sId =session_id();
            $query= "SELECT * FROM tbL_oder Where customer_id =' $customer_id'";
            $result= $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart(){
            $sId =session_id();
            $query= "DELETE FROM tbL_cart Where sId ='$sId'";
            $result= $this->db->select($query);
            return $result;
        }
        // đặt hàng
        public function  insertOder($customer_id){
            $sId = session_id();
            $query= "SELECT * FROM tbL_cart Where sId ='$sId'";
            $get_product= $this->db->select($query);
            if ($get_product ) {
                while ($result= $get_product->fetch_assoc()) {
                    $idsp=$result['idsp'];
                    $tensp=$result['tensp'];
                    $quanlity=$result['quanlity'];
                    $price=$result['price'];
                    $image=$result['image'];
                    $customer_id= $customer_id;


                    $query_oder= "INSERT INTO tbl_oder(idsp,tensp,quanlity,price,image,customer_id) VALUES('$idsp'
                    ,'$tensp',' $quanlity',' $price','$image',' $customer_id')";
        
                    $insert_oder = $this ->db->insert($query_oder);
                   if ($result) {
                       $msg ='Sản phẩm đã được thêm vào giỏ hàng';
                //    header('location:cart.php');
                   }
                   else {
                   header('location:index.php');
                   }
                }
            }

        }
        
        public function getAmoutPrice($customer_id){
          
            $query= "SELECT price From tbL_oder Where customer_id ='$customer_id'";
            $get_price= $this->db->select($query);
            return $get_price; 
        }
        public function 	get_cart_oder($customer_id){
            $query= "SELECT * From tbL_oder Where customer_id ='$customer_id'";
            $get_cart_oder= $this->db->select($query);
            return   $get_cart_oder;  
        }
        public function get_inbox_cart(){
            $query= "SELECT * From tbL_oder  order by date_oder asc";
            $get_inbox_cart= $this->db->select($query);
            return   $get_inbox_cart; 
        }
        public function shifted($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link,$id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            $query= "UPDATE tbl_oder SET status ='1' Where id='$id' and date_oder='$time' and price='$price'";
              $result= $this -> db-> update($query);
        if ($result) {
            $msg="Update thành công";
            return $msg;
        }
        else {
            $msg="Update không thành công";
            return $msg;
        }
        }
        // xóa đơn hàng
        public function del_shifted($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link,$id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            $query= "DELETE  FROM tbl_oder 
             Where id='$id' and date_oder='$time' and price='$price'";
              $result= $this -> db-> update($query);
        if ($result) {
            $msg="Xóa thành công";
            return $msg;
        }
        else {
            $msg="Xóa không thành công";
            return $msg;
        }
    }
    // xử lí thông tin đơn hàng
    public function shifted_confirm($id,$time,$price){
        $id= mysqli_real_escape_string($this->db->link,$id);
        $time= mysqli_real_escape_string($this->db->link, $time);
        $price= mysqli_real_escape_string($this->db->link, $price);
        $query= "UPDATE tbl_oder SET status ='2' Where customer_id='$id' and date_oder='$time' and price='$price'";
          $result= $this -> db-> update($query);
        return $result;
    }
}
?>