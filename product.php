<?php 
    include 'view/header.php';
?>
<?php

if(isset($_GET['iddm']) && $_GET['iddm']!=NULL){
    $id = $_GET['iddm'];
}
else {
    // echo "<script>window.location ='catlist.php'</script>";
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $tendm= $_POST['tendm']; 
//    $updateDm= $danhmuc ->update_danhmuc($tendm,$id);
// }



?>
   <div><style>
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
       .chon {
                         
                        margin-right: 22px;
                        position: relative;
                display: block;
                
                height: 100%;
       }
                .chon:before,
                .chon:after {
                position: absolute;
                content: "";
                right: 0;
                top: 0;
                background: rgba(2,126,251,1);
                transition: all 0.3s ease;
                }
                .chon:before {
                height: 0%;
                width: 2px;
                }
                .chon:after {
                width: 0%;
                height: 2px;
                }
                .chon:hover{
                background: transparent;
                box-shadow: none;
                }
                .chon:hover:before {
                height: 100%;
                }
                .chon:hover:after {
                width: 100%;
                }
                .chon:hover{
                color: rgba(2,126,251,1);
                }
                .chon:before,
                .chon:after {
                position: absolute;
                content: "";
                left: 0;
                bottom: 0;
                background: rgba(2,126,251,1);
                transition: all 0.3s ease;
                }
                .chon:before {
                width: 2px;
                height: 0%;
                }
                .chon:after {
                width: 0%;
                height: 2px;
                }
                .chon:hover:before {
                height: 100%;
                }
                .chon:hover:after {
                width: 100%;
                }
                .chon  {
                   background-color: #ddd;
                border: 1px solid #3b5998; box-sizing:
                border-box; color: #3b5998; 
                display: inline-block; font-family: Arial, sans-serif;
                font-size: 14px; 
                line-height: 16.8px; 
                margin: 0px 3px 10px; 
                padding: 10px 14px;
                text-decoration-line: none; 
                transition: all 0.2s;
                color: yellow;
                  font-size: 20px;  
                }
                /* .chon  a:hover{ 

                    color: red;
                } */
            </style></div>
        <main>
            <h1>Danh mục sản phẩm</h1>
            <div class="head">

                <a href="index.php"> <i class="fa-solid fa-house-chimney">

            </i> Trang Chủ

            <!-- <div class="chon"> -->
            <?php 
                        $getall_dm=$dm->show_danhmuc_all();
                        if ($getall_dm) {
                            while ($resualt = $getall_dm->fetch_assoc()) {
                                
                            
                        
                        
                        ?>
                       <li class="chon"> <a href="product.php?iddm=<?php echo $resualt['iddm'] ?>"> <?php echo $resualt['tendm'] ?> </a> </li>
                        
                        
                        <?php
                    }}
                    ?>
                    <!-- </div> -->
                </a>
         

                      
                    
                       
              
            
                    
                </div>
            </div>

            <div class="product2">
               <?php
               $getproductby_cart= $dm -> get_product_by_cart($id);
               if ($getproductby_cart) {
                   while ($result= $getproductby_cart->fetch_assoc()) {
                       
                
               ?>
                <div class="item2">
                <img src="admin/uploads/<?php echo $result['image'] ?>">
                    <div class="name"><?php echo $result['tensp'] ?></div>
                    <div class="pirce">Giá: <?php echo $result['price'] ?> VNĐ</div>
                    <button class="buy"><span><a href="chitiet.php?proid=<?php echo $result['idsp'] ?>"> Mua ngay</a></span></button>
                </div>
                <?php 
                
            }}?>
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
                    <a href="">...</a>
                </div>
                <div class="item">
                    <a href="">19</a>
                </div>
                <div class="item">
                    <a href="">20</a>
                </div>
            </div>
            <div class="in4nike">
                <h3>Giày thể thao Nike rep 1:1</h3>
                <p>Shopgiayreplica là địa chỉ chuyên bán giày Nike replica với giá tốt nhất tại Hà Nội và tp HCM. Shop có hầu hết tất cả các sản phẩm giày thể thao Nike từ Nike Air Jordan, Air Max, Air Uptempo, React…. hàng chuẩn replica 1:1 (và có tùy chọn
                    thêm hàng rep thường).</p> <br>
                <p>Với phương châm mong muốn mang đến cho khách hàng những đôi giày Nike tốt nhất với mức giá hợp lý, shopgiayreplica luôn cố gắng để giúp cho các tín đồ yêu giày có thể mua giày Nike giá rẻ mà vẫn hài lòng về chất lượng. Xem ngay những mẫu
                    giày đang có mặt tại shop để lựa chọn được cho mình đôi giày ưng ý nhất nhé.</p>
            </div>
            <div class="even2">
                <h2>Bài Viết Nổi Bậc</h2>
            </div>
            <div class="event">
                <img src="img/enven1.jpg" alt="">
                <a href="">Phối đồ cùng Nike Air Jordan 1 như thế nào để vừa sang vừa chất</a>
            </div>
            <div class="event">
                <img src="img/event2.jpg" alt="">
                <a href="">Top mẫu giày sneaker hot trend 2021 được săn đón
                </a>
            </div>
            <div class="event">
                <img src="img/event4.jpg" alt="">
                <a href="">Full kiểu phối đồ với giày MLB cực chất cho nam và nữ</a>
            </div>
            <div class="event">
                <img src="img/event3.jpg" alt="">
                <a href="">Cách buộc dây giày Nike Jordan khiến bạn trở nên sành điệu</a>
            </div>
            <div class="event">
                <img src="img/event5.jpg" alt="">
                <a href="">
                    5 cách thắt dây giày thể thao Adidas, Nike đơn giản lại cực đẹp
                    </a>
            </div>
        </main>
        <?php 
    include 'view/footer.php';
?>