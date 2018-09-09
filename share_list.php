<?php 
require_once('connection/connection.php');
$limit = 4;
if (isset($_GET["page"])) { 
  $page  = $_GET["page"]; 
} else { 
  $page=1; 
};
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY published_date DESC LIMIT ".$start_from.",".$limit);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$total_rows = count($data);
?>

<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>花藝分享</title>
    <link rel="stylesheet" href="fontawesome-5.2.0/css/all.css">
    <link type="text/css" rel="stylesheet" href="path_to/simplePagination.css" />
    <link rel="stylesheet" href="css1/pagebtn.css">
    <link rel="stylesheet" href="css1/navbar.css">
    <link rel="stylesheet" href="css1/page1.css">
    <link rel="stylesheet" href="css1/footer.css">

</head>


<body>



    <div id="document">

        <div id="banner"></div>


        <div id="navbar">
            <ul class="nav">
                <li class="logoli">
                    <a href='OFD.php'><img src="images/logo.png"></a>
                </li>
                <li>
                    <p class="logoP"><i class="fas fa-bars"></i></p>
                    <ul class="tresA">
                        <li>
                            <h3 class='tres'>
                                <a href='OFD.php'>關於Olivia</a>
                            </h3>
                        </li>
                        <li>
                            <h3 class='tres'>
                                <a href='share_list.php'>花藝分享</a>
                            </h3>
                        </li>
                        <li>
                            <h3 class='tres'>
                                <a href='designflower.php'>特殊佈置</a>
                            </h3>
                        </li>
                        <li>
                            <h3 class='tres'>
                                <a href='OFD.php'>花坊位置</a>
                            </h3>
                        </li>
                        <li>
                            <h3 class='tres'>
                                <a href='index.php'>線上花店</a>
                            </h3>
                        </li>

                    </ul>
                </li>
            </ul>
            <div style="clear:both"></div>
        </div>
        <?php foreach ($data as $news) {?>
        <div class="content"><a href="share.php?id=<?php echo $news['news_id']; ?>">
            <div class="contentdiv">
           
                <div class="contentimg">
                    <img src="uploads/news/<?php echo $news['picture'];  ?>" alt="">
                </div>
                <span><?php echo $news['published_date'];?></span>
                <p><?php echo mb_strimwidth(strip_tags( $news['content']),0,20,"...");?></p>
        </a> </div>

           
        </div>

        <?php } ?>



        <div class="pagination-holder<?php  if($total_rows > 0){
                        $sth = $db->query("SELECT * FROM news ORDER BY published_date DESC ");
                        $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
                        $total_pages = ceil($data_count / $limit); //無條件進位
                    ?>" >
                    <ul class="pagination">
                        <li class="page-item">
                        <?php   if($page > 1){ ?>
                        <!-- 頁數超過1，上一頁可連結 -->
                        <a class="page-link" href="share_list.php?page=<?php echo $page-1; ?>">
                            <span>«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <?php }else{ ?>
                        <!-- 頁數不超過1頁，上一頁按鈕不可連結 -->
                        <span class="page-link">«</span>
                        <?php } ?>
                        </li>
                        <?php for($i=1; $i <= $total_pages; $i++){ ?>
                        <li class="page-item">
                        <a class="page-link" href="share_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php } ?>
                        <li class="page-item">
                        <?php   if($page < $total_pages){ ?>
                        <a class="page-link" href="share_list.php?page=<?php echo $page+1; ?>">
                            <span>»</span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php }else{ ?>
                            <span class="page-link">»</span>
                        <?php } ?>
                        </li>
                    </ul>
                            
        </div>
        <?php } ?>  

        <div id="footer">

            <div class="footerlogo"><a href='index.php'><img src="images/footerlogo.png" alt=""></a></div>

            <div class="footercontent">
                <div class="footericon">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-blogger-b"></i>
                    <i class="fab fa-facebook-messenger"></i>

                </div>
                <div class="footerp">
                    <p>Copyright <i class="far fa-copyright"></i>2018 Olivia flower design. All rights reserved</p>
                </div>
            </div>

        </div>

    </div>





    <script src="js1/jquery-1.12.4.js"></script>
    <script src="js1/navbar.js"></script>
    <!-- <script type="text/javascript" src="path_to/jquery.js"></script>
    <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script> -->
    <script src="js1/pagebtn.js"></script>
    <script src="js1/share_list.js"></script>


 








</body>

</php>