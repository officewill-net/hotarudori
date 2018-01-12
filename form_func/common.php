<?php

// HTML エスケープ処理
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

// ワンタイムチケット確認
function check_ticket($ticket) {
    if ( isset($ticket) && isset($_SESSION['ticket']) ){
        if ( $ticket != $_SESSION['ticket'] ){
            return FALSE;
        } else {
            return TRUE;
        }
    } elseif ( isset($ticket) && ! isset($_SESSION['ticket']) ) {
        return FALSE;
    } else {
        return FALSE;
    }
}


// フォームバリデーション
function validate_required($val) {
    if ( !$val ) {
        return FALSE;
    } else {
        return TRUE;
    }
}



// フォームからの不正入力チェック関数
function check_input($var){

    if (is_array($var)) {                        // チェックする変数が配列だったら
        return array_map('check_input', $var);   // 要素を1つずつ取り出してチェック

    } else {
        if ( !mb_check_encoding($var, 'UTF-8') ) {  // 文字エンコードの確認
            return FALSE;
        }

        if (get_magic_quotes_gpc()) {           // magic_quotes_gpc が有効の場合
            $var = stripslashes($var);          // バックスラッシュのクォート除去
        }

        return str_replace("\0", "", $var);     // NULL バイトを除去して返す
    }
}





# 以下、フォームデータ文字化け対策
# 引用サイト： http://jehupc.exblog.jp/15053235/

function form_encode(&$post){
    if ( isset($post['enc']) ){
        return;
    }
    //どのエンコーディングか判定
    $enc = mb_detect_encoding($post['enc']);
    $default_enc = "UTF-8";
    foreach ($post as &$value) {
        encode_core($value,$default_enc,$enc);
    }
    unset($value);
}

function encode_core( &$value , $default_enc , $enc){
    if( is_array($value)){
        //配列の場合は再帰処理
        foreach ($value as &$value2) {
            encode_core($value2 , $default_enc , $enc);
        }
    }else if( $enc != $default_enc){
        //文字コード変換
        $value = mb_convert_encoding( $value , $default_enc , $enc ) ;
    }
}