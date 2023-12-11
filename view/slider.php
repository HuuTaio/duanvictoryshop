<div id="banner">
            <!-- <div class="danhmuc">
                <style>
                    .danhmuc  table{
                        text-align: center;
                    }
                </style>
                <table>
                    <?php 
                     $getdanhmuc = $dm ->getdanhmuc();
                     if (  $getdanhmuc) {
                         while ($result=$getdanhmuc->fetch_assoc() ) {                    
                     ?>       
                    <tr>
                        <td><?php echo $result['tendm'] ?></td>
                    </tr>
                    |<?php 
                         }
                        }
                    
                    ?>
                </table>
            </div> -->
            <div class="box">
                <img src="./img/0.jpg" alt="" id="anh">
                <div class="dieuhuong">
                    <i class="fa fa-chevron-circle-left" onclick="previous();"></i>
                    <i class="fa fa-chevron-circle-right" onclick="next();"></i>
                </div>
            </div>
            <!-- <script src="./js/style.js"></script> -->
        </div>