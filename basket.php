<?php
session_start();
//unset($_SESSION);
//print_r($_POST['quantity']);
$Del = "false";
$update = "false" ;
if(isset($_POST['EditCart']) && $_POST['EditCart'] == "UPDATE"){
    for ($i = 0; $i< count($_SESSION['Cart']); $i++){
        if($_POST['quantity'][$i] <= 0) $_POST['quantity'][$i]=1;
        $_SESSION['Cart'][$i]['quantity'] = $_POST['quantity'][$i];
    }
$update = "true";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>
        OLVIA. House : 
    </title>
    

   <?php require_once('template/head_file.php'); ?>




</head>

<body>
 
<?php require_once('template/navbar.php'); ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>我的購物車</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="basket.php">

                           <h1>我的購物車</h1>
                            <?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){ ?>
                            <p class="text-muted"><?php echo count($_SESSION['Cart']); ?></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">產品名稱</th>
                                            <th>數量</th>
                                            <th>單價</th>
                                            <th>折扣</th>
                                            <th colspan="2">金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                       $subtotal = 0;
                                       $total_price = 0;
                                     
                                     
                                     for ($i = 0; $i< count($_SESSION['Cart']); $i++){ ?>
                                        <tr>
                                            <td>
                                            <a href="products.php?product_id=<?php echo $_SESSION['Cart'][$i]['products_id']; ?>">
                                                    <img src="uploads/products/<?php echo $_SESSION['Cart'][$i]['pic'] ?>" width="100px" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="products.php?product_id=<?php echo $_SESSION['Cart'][$i]['products_id']; ?>"><?php echo $_SESSION['Cart'][$i]['product_name']; ?></a>
                                            </td>
                                            <td>
                                            <input type="number" name="quantity[]" value="<?php echo $_SESSION['Cart'][$i]['quantity']; ?>" class="form-control">
                                            </td>
                                            <input type="hidden" name="index" value="<?php echo $i;?>">
                                            <input type="hidden" name="EditCart" value="UPDATE">

                                            <td>$NT <?php echo $_SESSION['Cart'][$i]['price'] ; ?></td>
                                            <td>$NT0.00</td>
                                            <td>$NT<?php $subtotal = $_SESSION['Cart'][$i]['quantity'] * intval($_SESSION['Cart'][$i]['price']); echo $subtotal;?></td>
                                            <td><a href="cart/delete_cart.php?CartID=<?php echo $i; ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php 
                                           $total_price += $subtotal;
                                    } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">總計</th>
                                            <th colspan="2">$<?php echo $total_price; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <!-- /.table-responsive -->

<div class="box-footer">
      <div class="pull-left">
           <a href="product_list.php?category_id=1" class="btn btn-default"><i class="fa fa-chevron-left"></i> 繼續購物</a>
      </div>
  <div class="pull-right">
         <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> 更新購物車</button>
         <?php if(isset($_SESSION['member']) && $_SESSION['member'] !=null) { ?>
          <a href="checkout1.php" class="btn btn-primary">我要結帳 <i class="fa fa-chevron-right"></i>
          <?php }else{ ?>
                   <a href="register.php?url=basket" class="btn btn-primary">我要結帳 <i class="fa fa-chevron-right"></i>
                    </a>
         <?php } ?>
       </a>
   </div>
</div>

                            <?php }else{ ?>
                                <h4>目前購物車沒有商品，請至<a href="product.php?category=10">產品專區</a>進行購物。</h4>         
                            <?php } ?>


                        </form>

                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                    <div class="box-header">
                            <h3>訂單總計</h3>
                        </div>
                        <p class="text-muted">購物滿2000免運費，只限台灣本島，離島需加上稅金與運費</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                <?php if(!isset($_SESSION['Cart']) || $_SESSION['Cart']==null) $total_price = 0; ?>
                                        
                                

                                        <td>商品總計</td>
                                        <th>$NT<?php echo $total_price; ?></th>
                                    </tr>
                                    <tr>
                                <?php if( $total_price >=2000 || (!isset($_SESSION['Cart'])) || $_SESSION['Cart']==null )
                                           $deliverry=0;
                                      else $deliverry=150;
                            ?>  
                                        <td>運費</td>
                                        <th>$NT <?php echo $deliverry ;?></th>
                                    </tr>
                                   
                                    <tr class="total">
                                        <td>總金額</td>
                                        <th>$NT<?php echo $total_price+$deliverry; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>


                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

       <?php require_once('template/footbar.php'); ?>

       <div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">訊息</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center text-muted">成功更新數量!</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
            </div>
        </div>
    </div>
</div>   

 <?php if($update == "true"){ ?>
            <script>
                $(function(){
                    $('.modal-body>p').php('更新完成!');
                    $('#info-modal').modal();
                    setTimeout(function() {
                        $('#info-modal').modal('hide');
                    }, 1000);   
                });
            </script>
        <?php } ?>

        <?php if(isset($_GET['Del']) && $_GET['Del'] == "true"){ ?>
            <script>
                $(function(){
                    $('.modal-body>p').php('成功移除一個商品!');
                    $('#info-modal').modal();
                    setTimeout(function() {
                        $('#info-modal').modal('hide');
                    }, 1000);   
                });
            </script>
        <?php } ?>





</body>

</html>