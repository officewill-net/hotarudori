<?php

// POST がなければ戻す
if ( $_SERVER['REQUEST_METHOD'] != 'POST' ) {
	header("Location: index.html");
	exit();
}

// $_POST の入力値をチェック
check_input($_POST);
form_encode($_POST);

// ワンタイムチケットを確認し、エラーなら戻す
if ( ! isset($_POST['ticket']) || ! check_ticket($_POST['ticket']) ) {
	header("Location: index.html");
	exit();
}


// $_POST 変数文字列の先頭末尾の全角・半角スペースを削除してセッション変数へ格納
foreach ($fields as $field) {
	if ( isset($_POST[$field]) ) {
		$_POST[$field] = trim($_POST[$field]);
		$_SESSION['post'][$field] = $_POST[$field];
	}
}


// 以下、フォームバリデーション
require "validator.php";
$val = new Validator;
$_SESSION['errors'] = array();


// 氏名（名）
if(! $val->required($_SESSION['post']['name'])) {
	$_SESSION['errors']['name'] = 'お名前をご入力ください。';
}
// メアド
if(! $val->required($_SESSION['post']['email'])) {
	$_SESSION['errors']['email'] = 'メールアドレスをご入力ください。';
} elseif(! $val->email($_SESSION['post']['email'])) {
	$_SESSION['errors']['email'] = '正しいメールアドレスの形式でご入力ください。';
}
// お問い合せ内容
if(! $val->required($_SESSION['post']['message'])) {
	$_SESSION['errors']['message'] = 'お問い合わせ内容をご入力ください。';
}



// エラーがあるならフォームへ移動
if ( $_SESSION['errors'] ) {
	header("Location: contact.php#contact-form");
	exit;
}




// 送信前準備（mbstring 設定等）
mb_language('ja');
mb_internal_encoding('UTF-8');

$posted_at = date("Y/m/d H:i:s");

$sender = array();
$sender['name'] = '豊里駅前冬の蛍通り実行委員会';						// 自動送信メールの送信者名
$sender['address'] = 'toyosato_scis@office.miyagi-fsci.or.jp';		// 自動送信メールの送信元アドレス

/* 管理者へのメール構築
--------------------------------------------------------------------------------------------------------- */

$manager = array();
$manager['to'] = $sender['address'];
$manager['subject'] = "【冬の蛍通り】お問い合わせがありました";
$manager['header'] =
	"From: " . mb_encode_mimeheader($sender['name'], 'ISO-2022-JP', 'UTF-8,EUC-JP,auto') . " < {$sender['address']} > ";
$manager['header'] .= "\nCc: info@officewill.net";


// メール本文
$manager['body'] = <<< EOM
冬の蛍通りホームページのコンタクトフォームからお問い合わせがありました。
送信された内容をご確認いただいたうえで、お客様にご連絡お願いいたします。

------------------------------------------------


【 送信日時 】
{$posted_at}

【 お名前 】
{$_SESSION['post']['name']}

【 メールアドレス 】
{$_SESSION['post']['email']}

【 お問い合わせ内容 】
{$_SESSION['post']['message']}


EOM;




/* フォーム入力者へのサンキューメール構築
--------------------------------------------------------------------------------------------------------- */

$customer = array();
$customer['to'] = $_SESSION['post']['email'];
$customer['subject'] =
	"【冬の蛍通り】お問い合わせありがとうございます";
$customer['header'] =
	"From: " . mb_encode_mimeheader($sender['name'], 'ISO-2022-JP', 'UTF-8,EUC-JP,auto') . " < {$sender['address']} > ";

$customer['body'] = <<< EOM
{$_SESSION['post']['name']}　様

この度はお問い合わせいただき、誠にありがとうございました。
改めて担当者よりご連絡いたしますので、お待ちくださいますようお願い申し上げます。


── ご送信内容の確認 ──────────────────────────────────

【 送信日時 】
{$posted_at}

【 お名前 】
{$_SESSION['post']['name']}

【 メールアドレス 】
{$_SESSION['post']['email']}

【 お問い合わせ内容 】
{$_SESSION['post']['message']}


────────────────────────────────────────────────────

このメールに心当たりの無い場合は、お手数ですが
下記連絡先までお問い合わせください。

この度はお問い合わせいただき、重ねてお礼申し上げます。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

豊里駅前冬の蛍通り実行委員会

〒987-0366
宮城県登米市豊里町浦軒100-5

TEL: 0225-76-3274
FAX: 0225-76-3218
MAIL: toyosato_scis@office.miyagi-fsci.or.jp

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

EOM;





/* メール送信処理
--------------------------------------------------------------------------------------------------------- */

// 管理者へ
$result['manager']  = mb_send_mail($manager['to'], $manager['subject'], $manager['body'], $manager['header']);
// お客様へ
$result['customer'] = mb_send_mail($customer['to'], $customer['subject'], $customer['body'], $customer['header']);

