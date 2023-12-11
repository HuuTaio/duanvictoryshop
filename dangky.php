<div>
    <style>
    .register-form{
        
        height:400px;
        width: 100%;
        color:white;
      text-align: center;
      border-radius: 10px;
      background-color: rgb(41, 40, 40);
      box-shadow: 0 1px 2px 0 rgb(60 64 67 / 10%), 0 2px 6px 2px rgb(60 64 67 / 15%);
}

  
input[type=submit]{
    width: 80px;
    background-color: violet;
    border-radius: 5px;
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
    
}
.ip{
    width: 100%; 
    display: flex;
    height: 45px;
}
label{
    width: 30%;
    padding-top: 15px;
}
input{
        margin-top: 10px;
    width: 60%;

   border-radius: 5px;
   
}

    </style>
</div>
<?php 
    include 'view/header.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
           
            $insertCustomer=  $cs->insertCustomer($_POST,$_FILES);
        }
      
         
?>
        <main>
            <div class="login-page">
              <div class="thongbao">
               
              </div>
                    <form class="register-form" method="POST" action=""  enctype="multipart/form-data">
                    <p class="dk">Đăng Ký</p>
                    <div class="ip">
                    <label for="">Name :</label>
                        <input type="text" placeholder="" name="name" />
                    </div>
                         <div class="ip">
                            <label for="">Password :</label>
                            <input type="password"  placeholder=""  name="pass"/>
                         </div>
                         <div class="ip">
                            <label for="">Email :</label>
                            <input type="text" placeholder=" "  name="email"/>
                         </div>
                         <div class="ip">
                            <label for="">Phone :</label>
                            <input type="text" placeholder=""  name="Phone"/>
                         </div>
                         <div class="ip">
                            <label for="">City :</label>
                            <input type="text" placeholder=""  name="City"/>
                         </div>
                         <div class="ip">
                            <label for="">Address :</label>
                            <input type="text" placeholder=""  name="address"/>
                         </div>
                         <!-- <div class="ip">
                            <label for="">Image :</label>
                            <input type="file"  name="image"/>
                         </div> -->
                  
                        <input type="submit" name="submit" value="Registered">
                        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
                    </form>
                    <?php 
        if (isset( $insertCustomer)) {
           echo  $insertCustomer;
        }
       
        
        ?>
                    <!-- <form class="login-form">
                        <input type="text" placeholder="username" />
                        <input type="password" placeholder="password" />
                        <button>login</button>
                        <p class="message">Not registered? <a href="dangky.php">Create an account in</a></p>
                    </form> -->
                </div>
        
            <script src="login.js"></script>
        </main>
        <?php 
    include 'view/footer.php';
?>