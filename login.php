<?php    include 'view/header.php';
 $logincheck= session::get('customer_login');
 if ($logincheck==true) {
        header('location:index.php');
 }

?>
<div>
    <style>
    .login-page1{
        margin: 0 auto;
        height:400px;
        width: 30%;
        color:white;
      text-align: center;
      border-radius: 10px;
      background-color: rgb(41, 40, 40);
      box-shadow: 0 1px 2px 0 rgb(60 64 67 / 10%), 0 2px 6px 2px rgb(60 64 67 / 15%);
}

  
input[type=submit]{
    width: 80px;
    background-color: blue;
    border-radius: 5px;
    color:white;
}

.message{
    margin-top: 10px;
}
.message a{
    text-decoration: none;
    color:red;
}
.dk{
    font-size:30px;
    font-weight: bold;
    padding-top: 20px;
}
.ip{
    width: 100%; 
    display: flex;
    height: 45px;
   
}
label{
    width: 40%;
    padding-top: 15px;
}
input{
        margin-top: 10px;
    width: 50%;

   border-radius: 5px;
   
}
.form1{
    padding-top: 30px;
}
.login-form1{
    
    margin: auto;
}
    </style>
</div>
<?php 
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
           
        $loginCustomer=  $cs->loginCustomer($_POST);
    }
?>

        <main>
            <div class="login-page1">
            <p class="dk">Đăng Nhập</p>
                <div class="form1">
              
                    <form class="login-form1" method="POST" action="">
                    <div class="ip">
                            <label for="">Tên tài khoản :</label>
                            <input type="text" placeholder="" name="email" />
                         </div>
                         <div class="ip">
                            <label for="">Password :</label>
                            <input type="password" placeholder="" name="pass"/>
                         </div>

                        <input style=" margin-top: 25px;width: 100px; height: 35px; " type="submit" name="submit" value="Login">
                        <p class="message">Not registered? <a href="dangky.php">Create an account in</a></p>
                        <p class="message"><a href="../victory/admin/login.php">Login to admin</a></p>
                    </form>
                    <?php 
                    if (isset($loginCustomer)) {
                        echo $loginCustomer;
                    }
                    
                    ?>
                </div>
            </div>

        </main>
        <?php 
    include 'view/footer.php';
?>