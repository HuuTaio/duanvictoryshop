<?php 
    include 'view/header.php';
    include 'view/slider.php';
?>
<?php 
 $logincheck= session::get('customer_login');
 if ($logincheck==false) {
        // header('location:login.php');
 }

?>
<div><style>
      #banner .box {
            width: 100%;
            position: relative;
            margin: 0 auto;
        }
        #banner .box img {
            width: 100%;
            height: 700px;
            border-radius: 10px;
          
        }
        body {
            list-style: none;
            text-decoration: none;
            background-color: #fff;
        }
        .buy{
            border:none;
            background-color: black;
            border-radius: 2px; 
        }
        .buy a{
            color:white;
        }
        #product .item {
            height: 420px;
        }
</style></div>
        <main>
            <h2>Featured products</h2>
            <div id="product">
                <?php 
                
                $getproduct = $product ->getproduct_noibac();
                if ($getproduct) {
                    while ($result=   $getproduct->fetch_assoc() ) {
               
                
                ?>
                <div class="item">
                    <img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                    <div class="name"><?php echo $result['tensp'] ?></div>
                    <div class="pirce">Giá: <?php echo $result['price'] ?> VNĐ</div>
                    <!-- <div class="pirce">Giảm giá: -<?php echo $result['giam_price'] ?> VND</div> -->
                    <button class="buy"><span><a href="chitiet.php?proid=<?php echo $result['idsp']  ?>"> Mua ngay</a></span></button>
                </div>
                <?php 
                }}
                ?>
            </div>
            <h2>New Product</h2>
            <div id="product">
                <?php 
                
                $getproduct_new = $product ->getproduct_new();
                if ($getproduct_new) {
                    while ($result=   $getproduct_new->fetch_assoc() ) {
               
                
                ?>
                <div class="item">
                    <img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                    <div class="name"><?php echo $result['tensp']  ?></div>
                    <div class="pirce"><?php echo $result['price'] ?> VNĐ</div>
                    <!-- <div class="pirce">-<?php echo $result['giam_price'] ?> VND</div> -->
                    <button class="buy"><span><a href="chitiet.php?proid=<?php echo $result['idsp'] ?>"> Mua ngay</a></span></button>
                </div>
                <?php 
                }}
                ?>
            </div>
            <div class="xemtiep">
                <div class="xt">
                    <a href="product.php?iddm=52">
                        << Xem tất cả các sản phẩm>> </a>
                </div>
            </div>
            <div class="list-page">
                <div class="item">
                    <a href="">1</a>
                </div>
                <div class="item">
                    <a href="">2</a>
                </div>
                <div class="item">
                    <a href="">3</a>
                </div>
                <div class="item">
                    <a href="">4</a>
                </div>
            </div>
            <div class="profile">


                <div class="box-left">
                    <h4>Về chúng tôi</h4>
                    <h3>ShopVictory.com™</h3>
                    <p>Uy tín lâu năm chuyên cung cấp giày thể thao sneaker nam, nữ hàng Replica 1:1 - Like Auth với chất lượng đảm bảo và giá tốt nhất. Shop có sẵn hàng tại 2 cơ sở Hà Nội, tp HCM</p> <br>
                    <p>Bạn đang cần tìm một đôi giày thể thao sneaker đẹp và hợp thời trang và đang hot Trends đến từ các thương hiệu lớn nhưng lại không đủ hầu bao để sắm được hàng chính hãng? Hãy đến với shopgiayreplica.com – nơi bạn thỏa lòng mong ước
                        mà chỉ phải chi ra 1 phần nhỏ so với dòng chính hãng ngoài store mà vẫn sắm cho mình được một đôi chất lượng từ rep 1:1 đến siêu cấp like auth.</p>
                </div>
                <div class="box-right">
                    <img src="img/sp2.jpg" alt="">
                </div>
            </div>
        </main>
<?php 
    include 'view/footer.php';
?>
       