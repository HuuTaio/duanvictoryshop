<?php
 $filepath = realpath(dirname(__FILE__));
 include  ($filepath.'/../lib/session.php');
 Session::checkLogin();
 include  ($filepath.'/../lib/database.php');
 include  ($filepath.'/../helper/format.php');
    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db= new Database();
            $this->fm= new Format();
        }
        public function login_admin($adminUser, $adminPass)
        {
            $adminUser= $this ->fm->validation($adminUser);
            $adminPass= $this ->fm->validation($adminPass);

            $adminUser= mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass= mysqli_real_escape_string($this->db->link, $adminPass);

            if (empty($adminUser) || empty($adminPass)) {
                $alert='User and password không nên trống';
                return $alert;
            }
            else {
                $query= "SELECT * FROM tbl_admin Where adminUser = '$adminUser' AND adminPass='$adminPass' LIMIT 1";
                $_result= $this ->db->select($query);
                if ($_result != false) {
                    $value = $_result->fetch_assoc();
                    
                    Session::set('adminlogin',true);
                    Session::set('adminID',$value['adminID']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
                    header('location:index.php');
                }
                else {
                    $alert="Sai tai khoan hoac mat khau";
                    return $alert;
                }
            }
        }
        public function admin_check()
        {
            
        }
    }
?>