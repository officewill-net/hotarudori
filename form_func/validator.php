<?php

class Validator {
	// 必須判定
	public function required($str) {
		return (trim($str) == '') ? FALSE : TRUE;
	}

	// 全角カタカナ
	public function katakana($str) {
		if($str == '') return TRUE;
		return (bool)preg_match('/^(?:\xE3\x82[\xA1-\xBF]|\xE3\x83[\x80-\xB6]|ー|[\s　])+$/', $str);
	}

	// メアド形式
	public function email($str) {
		if($str == '') return TRUE;
		return (bool)preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $str);
	}

	// 数字かどうか
	public function numeric($str) {
		return (! is_numeric($str)) ? FALSE : TRUE;
	}

	// 最大文字数
	public function max_length($str, $val) {
		return (strlen($str) > $val) ? FALSE : TRUE;
	}

	// 最低文字数
	public function min_length($str, $val) {
		return (strlen($str) < $val) ? FALSE : TRUE;
	}

	// 電話番号
	public function tel($str) {
		if ($str == '') return TRUE;
		return (bool)preg_match('/^[0-9-]{10,11}$|^[0-9-]{13}$/', $str, $str);
	}

	// マッチするかどうか
	public function match($str, $str2) {
		if ($str == '') return TRUE;
		return $str !== $str2 ? FALSE : TRUE;
	}
}
