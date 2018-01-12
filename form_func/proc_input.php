<?php

// ワンタイムチケットを発行（不正アクセス検知に使います）
if ( ! isset($_SESSION['ticket']) ) {
	$_SESSION['ticket'] = md5(uniqid(mt_rand(), TRUE));
}

// 送信内容のセッション変数を通常変数へ代入 (isset 判定を逐一行わないようにするため)
$post = array();
foreach ($fields as $field) {
	$post[$field] = isset($_SESSION['post'][$field]) ? $_SESSION['post'][$field] : '';
	unset($_SESSION['post'][$field]);
}

// エラーメッセージのセッション変数を通常変数へ代入 (isset 判定を逐一行わないようにするため)
// また、エラーメッセージが1つでもある場合はエラーフラグを立てておく
$errors = array();
$err_flg = FALSE;
foreach ($fields as $field) {
	if (isset($_SESSION['errors'][$field])) {
		$errors[$field] = $_SESSION['errors'][$field];
		$err_flg = TRUE;
	} else {
		$errors[$field] = '';
	}
	unset($_SESSION['errors'][$field]);
}
