<?php
/********************************
* ����� - insideone@cyberforum.ru
* �������� - LGPL
* ������: 2.0
* 27.07.2010
*
* ���������: Inferno
* 
*/ 
 
 
define('MODE', 's');
define('RVRE', '/^(.*?[���������])(.*)$/'.MODE);
define('ADJECTIVE', '/(��|��|��|��|���|���|��|��|��|��|��|��|��|��|���|���|���|���|��|��|��|��|��|��|��|��)$/'.MODE);
define('NOUN', '/(�|��|��|��|��|�|����|���|���|��|��|�|���|��|��|��|�|���|��|���|��|��|��|�|�|��|���|��|�|�|��|��|�|��|��|�)$/'.MODE);
define('DERIVATIONAL', '/[^���������][���������]+[^���������]+[���������].*(?<=�)���?$/'.MODE);

class stem
{
	public static $LowerMode = FALSE;
	public static $RV = '';
 
	private static function clear($pattern)
	{
		$uncleared = self::$RV;
		self::$RV = preg_replace($pattern, '', self::$RV);
		$replaced = str_replace(self::$RV, '', $uncleared); 
		return $uncleared !== self::$RV;
	}
 
	public static function word(&$word)
	{
			if ( self::$LowerMode ) $word = mb_strtolower($word);
			
			//��� ������� �����: 
			// RV � ��� ����� ����� ����� ������� ��������
			// R1 � ��� ����� ����� ����� ������� ����������, ���������� ����� ��������
			// R2 � ��� ����� ����� ����� ������� ����������, ���������� ����� �������� � R1
			if (!preg_match(RVRE, $word, $word_parts) || !$word_parts[2]) return;
			list( ,$start, self::$RV) = $word_parts;

			self::clear(ADJECTIVE);
			self::clear(NOUN);

			// [��� 2]
			// ���� ����� ������������ �� ������ '�' , �� ������� ���.
			self::clear('/�$/'.MODE);
			
			// [��� 3]
			// ����� ��������������� ��������� � R2, ���� ��������� �������, �� ������� ���.
			if ( preg_match(DERIVATIONAL, self::$RV) ) // ���������������
					self::clear('/����?$/'.MODE);
			
			$word = $start.self::$RV;
			self::$RV = '';
	}
};

/* �������, � ������� ������� ����� �������� � ������� */
function stemming($word){
	$result = $word;
	stem::word($result);
	return $result;
}

?>