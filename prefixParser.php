<?php
/********************************
* ����� - Inferno
* �������� - LGPL
* ������: 1.0
* 15.07.2011
* 
*/ 

    function getPrefix($word)
	{
		/* ������� ���������� ������� ����� ��������� ����� */
		global $nouns;	
		global $prefix;
		
		foreach($prefix as $value)
		{
			// $value - ���� �� ��������� �� ������� ���������
			$prefixLength = strlen($value);
			if (substr($word, 0, $prefixLength) == $value) // ���� ����� ���������� � ���������, ������ ���� ���������
			{
				if (searchWord(substr($word, $prefixLength)))	// ���� ���������� ������������ �����
				{
					return $value;
				}
			}
		}
		
		return false;
    }

	function searchWord($word)
	{
		/* ������� ��������� ������������� ������������� ����� */
		global $nouns;	// ������� ���������������
		global $prefix;	// ������� ���������
		foreach($nouns as $value)
		{
			$length = (strlen($word)>4)?4:3;
			if(
				(levenshtein(substr($word,0,$length), substr($value[0],0,$length))<1)
				&&
				(substr($word,0,1) == substr($value[0],0,1))
			)
			{
				return true;
			}
		}
		return false;
	}


?>