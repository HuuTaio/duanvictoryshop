<?php 
    include 'view/header.php';
?>
<?php 

if(isset($_GET['proid']) && $_GET['proid']!=NULL){
    $id = $_GET['proid'];
}
else {
    // echo "<script>window.location ='catlist.php'</script>";
}

?>
<?php 
if (isset($_POST['submit'])) {
    $logincheck= session::get('customer_login');
    if ($logincheck==false) {
             $ms= '<span style="color: red;">Bạn phải đăng nhập!</span>';
            // header('location:login.php');            
    }
    else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $quanlity  =$_POST['quanlity'];    
            $addToCart= $ct ->add_to_cart($quanlity,$id); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
       }
    }
}
 

?>
<div>
    <style>
        .box-left img {
    width: 650px;
    margin-right: 30px;
    height: 450px;
    margin-bottom: 30px;
    
}
    </style>
</div>

        <main>
            <div class="top">

                <a href="index.php"> <i class="fa-solid fa-house-chimney">

            </i> Trang Chủ 
                </a>
                <a href="product.php">Giày Nike /</a>
                <a href=""> Chi tiết sản phẩm</a>
            </div>
            <div class="chitiet">
              <?php 
              $getproduct_chitiet =  $product->get_chitiet($id);
              if($getproduct_chitiet) {
                  while ($result_chitiet=$getproduct_chitiet ->fetch_assoc()) {
                     
                  
              
              ?>  
              
                <div class="box-left">
                    <img src="admin/uploads/<?php echo $result_chitiet['image'] ?>" alt="" width="50px">
                </div>
                <div class="box-right">
                     <!-- <h3>Thương hiệu: <?php echo $result_chitiet['brandName'] ?></h3> -->
                     <?php if (isset($_POST['submit'])) {
              echo $ms;
             }
              ?>
                    <h3><?php echo $result_chitiet['tensp'] ?></h3>
                    <h4>Giá: <?php echo $result_chitiet['price'] ?> ₫</h4>
                    <!-- <h4>Giảm giá: -<?php echo $result_chitiet['giam_price'] ?> ₫</h4> -->
                    <!-- <p>Size:</p> -->
                    
                    <!-- <div class="size">
                        <p>35</p>
                        <p>36</p>
                        <p>37</p>
                        <p>39</p>
                        <p>39</p>
                        <p>40</p>
                        <p>41</p>
                        <p>42</p>
                    </div> -->
                    <style>
                        .mua span  {
                            width: 200px;
                            padding: 10px;
                            
                            color: white;
                            font-weight: bold;
                            transition: 0.3s;

                        }
                        .mua span .one {
                            background-color: black;
                        }
                        .mua span .two {
                            background-color: red;
                        }
                        .mua span input{
                            padding: 10px;
                            color: white;
                            
                        }
                        .mua span input:hover{
                            background-color: gray;
                            
                        }
                    </style>
                    <hr>
                    <form action="" method="post">
                    <div class="mua">
                    <input type="number" name="quanlity" value="1" min="1" >
                        <span id="one"> <input type="submit" name="submit" 
 class="one" value="Thêm vào giỏ hàng"></span>
                        <span id="two"> <input type="submit" name="submit"
 class="two" value="Mua ngay"></span>
                        <?php 
                        if ( isset($addToCart)) {
                            echo '<br> <span style="color:red; font: size 18px;">Sản phẩm đã được thêm vào giỏ hàng </span>';
                            
                        }
                                                
                        ?>
                    </div>

                    </form>
                    <div class="box-1">
                        <h3>KHUYẾN MÃI NĂM MỚI 2022</h3>

                        <p> <span style="color: red;">></span> Ship COD Toàn Quốc Giảm Giá Toàn Bộ Sản Phẩm Lên Đến 60% </p>
                        <p> <span style="color: red;">></span> Nhận hàng và kiểm tra trước khi thanh toán.</p>
                        <p> <span style="color: red;">></span> Double Box kèm chống sốc khi giao hàng</p>
                        <p> <span style="color: red;">></span> Giao hàng nhanh 60 phút trong nội thành Hà Nội và tp Hcm</p>
                    </div>
                </div>
              <?php 
              
            }}
              ?>
            </div>
            <h4>Cách chọn size giày
                <hr>
            </h4>
            <div class="hd">
                <p>Để chọn size giày phù hợp với chân của mình, bạn có thể làm theo cách sau:</p>
                <p>Bước 1: Đo chiều dài bàn chân theo huớng dẫn ở hình dưới:</p>
                <img src="img/size1.jpg" alt="">
                <p>Bước 2: Sau khi đo được chiều dài bàn chân, bạn có thể đối chiếu với bảng size giày dưới để chọn được size giày phù hợp cho mình. Ví dụ chiều dài bàn chân là 26.5cm thì size giày nam Adidas phù hợp là 42.</p>
                <img src="img/size2.jpg" alt="">
                <img src="img/size3.jpg" alt="">
                <p>Chúc các bạn tìm được size đúng với mình !!!.</p>
            </div>
            <div class="box-2">
                <h3>KIẾN THỨC & MẸO VẶT</h3>
                <div class="product3">
                    <div class="item3">
                        <img src="img/product3_1.jpg" alt="">
                        <div class="name"> Top mẫu giày sneaker hot trend 2021 được săn đón</div>
                        <p>Sau một năm đầy biến động của dịch bệnh trên toàn cầu, văn hóa sneakers vẫn tiếp tục..</p>
                    </div>
                    <div class="item3">
                        <img src="img/product3_2.jpg" alt="">
                        <div class="name"> Hướng dẫn chi tiết cách buộc dây giày Alexander Mcqueen </div>
                        <p>Những kiểu buộc dây giày Alexander Mcqueen dưới đây chẳng đòi hỏi sự khéo tay hay cầu...</p>
                    </div>
                    <div class="item3">
                        <img src="img/product3_3.jpg" alt="">
                        <div class="name"> Phối đồ cùng Nike Air Jordan 1 để vừa sang vừa chất</div>
                        <p>Nike Air Jordan 1 từ lâu đã trở thành biểu tượng của phong cách thời trang đường phố ...</p>
                    </div>
                </div>
            </div>
        </main>
        <?php 
    include 'view/footer.php';
?>