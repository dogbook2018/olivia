<?php 
require_once('connection/connection.php');

$query = $db->query("SELECT * FROM news WHERE news_id =".$_GET['id']);
$news = $query->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="css1/navbar.css">
    <link rel="stylesheet" href="css1/page1_1.css">
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
                                <a href=''>關於Olivia</a>
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

        <div class="content">
            <div class="contentdiv">
                <div class="contentimg">
                    <img src="uploads/news/<?php echo $news['picture'];  ?>" alt="">
                </div>
                <div class="contentp">
                    <h3><?php echo $news['title']; ?></h3>
                    <br>
                    <p><?php echo $news['content']; ?></p>
                    <span> <?php echo $news['published_date']; ?></span>
                </div>
            </div>




        </div>

        <div class="backicon"><a href='share_list.php'><i class="far fa-arrow-alt-circle-left"></i><p>回到上一頁</p></a></div>





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
    <script type="text/javascript" src="path_to/jquery.js"></script>
    <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>












</body>

</php>