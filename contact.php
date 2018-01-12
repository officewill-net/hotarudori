<?php
session_set_cookie_params(0);
session_start();

// フォーム項目など設定ファイル
require 'form_func/config.php';
// 共通関数ファイル
require 'form_func/common.php';
// 入力フォーム処理ファイル
require 'form_func/proc_input.php';
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
                <div>
                    <iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3118.8963134061655!2d141.24238511518686!3d38.58223547306487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f890644733b42d7%3A0x90ed09810376bb1e!2z44CSOTg3LTAzNjYg5a6u5Z-O55yM55m757Gz5biC6LGK6YeM55S65rWm6LuS77yR77yQ77yQ4oiS77yV!5e0!3m2!1sja!2sjp!4v1512628435755" width="1200" height="1000" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <br />
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <h4>住所</h4>
                    <p class="block-author"></p>
                        〒987－0366 宮城県登米市豊里町浦軒100-5<br>
                        TEL　0225(76)3274<br>
                        FAX　0225(76)3218<br>
                    <em class="block-author">Email: toyosato_scis@office.miyagi-fsci.or.jp </em> <br>
                    <br>

                    <!--<p class="lead">Social Link</p><hr>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <a href="#"><img src="assets/img/social-icons/btn_skype.png" alt="Instagram"></a>
                        Call us
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <a href="#"><img src="assets/img/social-icons/btn_facebook.png" alt="Facebook"></a>
                        Like us
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                        <a href="#"><img src="assets/img/social-icons/btn_twitter.png" alt="Twitter"></a>
                        Follow us
                    </div>-->
                    <br>
                </div>
                <div class="col-lg-5">
                    <div class="feedback-form">

                        <div id="contact-response"></div>

                        <form action="contact_thanks.php" method="post" id="contact-form">
                            <fieldset>
                                <div class="form-group form-group-fullname">
                                    <label class="control-label" for="fullname">お名前 <span class="red">(必須)</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="例）冬野　蛍" value="<?= $post['name']; ?>">
                                    <p class="errmsg"><?= h($errors['name']); ?></p>
                                </div>
                                <div class="form-group form-group-email">
                                    <label class="control-label" for="email">Eメールアドレス <span class="red">(必須)</span></label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="例）fuyuno-hotaru@toyosato.com" value="<?= $post['email']; ?>">
                                    <p class="errmsg"><?= h($errors['email']); ?></p>
                                </div>
                                <div class="form-group form-group-message">
                                    <label class="control-label" for="message">お問い合わせ内容 <span class="red">(必須)</span></label>
                                    <textarea class="form-control" name="message" id="message" rows="10"><?= $post['message']; ?></textarea>
                                    <p class="errmsg"><?= h($errors['message']); ?></p>
                                </div>
                                <button type="submit" class="btn btn-primary">送信</button>
                            </fieldset>
                            <input type="hidden" name="ticket" value="<?= $_SESSION['ticket']; ?>" />
                            <input type="hidden" name="enc" value="あ" />
                        </form>
                    </div>
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
                <h3><i class="fa fa-heart"></i> Socialize</h3>
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
