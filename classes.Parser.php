<?php
/********************************
* ����� - Inferno
* �������� - LGPL
* ������: 1.0
* 15.07.2011
* 
*/ 
	function Parse($word)
	{
		$result = new Word();					// ��������� ������ �������
		$word = mb_strtolower($word, "cp1251"); // ������� �������� � ������ �������
		$word1 = $word;							// ��������������� ��������� ����������
		$flag = true;

		while($flag){ // ����� ���������
			$flag = false;
			$prefix1 = getPrefix($word1);
			if ($prefix1) // �����-�� ��������� �������
			{
				$result -> AddPrefix($prefix1);
				$word1 = substr($word1, strlen($prefix1));
				$flag = true;
			}
		}
		
		$body = stemming($word1);
		$flex = substr($word1, strlen($body));
		
		$result -> AddBody($body);
		$result -> AddFlexia($flex);		
		
		return $result;
	}
?>