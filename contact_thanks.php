<?php
session_set_cookie_params(0);
session_start();

// フォーム項目など設定ファイル
require 'form_func/config.php';
// 共通関数ファイル
require 'form_func/common.php';
// 入力フォーム処理ファイル
require 'form_func/proc_complete.php';
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>お問い合わせ | 冬の蛍通り ホームページ | 豊里町の冬を彩るイルミネーション</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="assets/css/style-projects.css">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>


    <body>

        <!-- Header -->

        <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand wow fadeInDownBig" href="index.html"><img class="office-logo" src="assets/img/slider/title.png" alt=""></a>
                </div>

                <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="index.html">ホーム</a>
                        </li>
                        <li>
                            <a href="about.html">冬の蛍通り</a>
                        </li>
                        <li>
                            <a href="team.html">サポーター</a>
                        </li>
                        <li class="active">
                            <a href="contact.php"><span>お問い合わせ</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--End Header -->


        <!-- Main Container -->

        <div class="container-fluid-kamn">
            <div class="row">
                <div class="sended_message">
                   お問い合わせいただきありがとうございました。<br>
                   近日、担当者からご連絡いたしますので、しばらくお待ちください。<br>
                   また、ご入力いただいた内容の写しのメールが送信されておりますので、ご確認ください。
                </div>
            </div>
        </div>

    <!--End Main Container -->


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> お問い合わせ:</h3>
                    <p class="footer-contact">
                        〒987－0366 宮城県登米市豊里町浦軒100-5<br>
                        ＴＥＬ　０２２５（７６）３２７４<br>
                        ＦＡＸ　０２２５（７６）３２１８<br>
                        Email: toyosato_scis@office.miyagi-fsci.or.jp<br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-external-link"></i> サイトメニュー</h3>
                    <p> <a href="about.html"> 冬の蛍通り</a></p>
                    <p> <a href="team.html"> サポーター </a></p>
                    <p> <a href="contact.php"> お問い合わせ</a></p>
                </div>
              <div class="col-md-4">
                <h3><i class="fa fa-heart"></i>リンク</h3>
                <div id="social-icons">
                      <a href="https://www.instagram.com/fuyuno_hotarudoori/" class="btn-group Instagram">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
              </div>
        </div>
      </div>
    </footer>


    <div class="copyright text center">
        <p>&copy; Copyright 2017　豊里駅前冬の蛍通り実行委員会</a></p>
    </div>



    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>

  </body>
</html>

<?php
// セッション終了処理
$_SESSION = array();
session_destroy();
?>