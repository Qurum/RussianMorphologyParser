<?php
/********************************
* �����    - Inferno
* �������� - LGPL
* ������: 1.0
* 15.07.2011
* 
*/
	setlocale (LC_ALL, 'ru_RU');	// ��������� ������
    include "nouns.php";    		// ������� ���������������
    include "prefix.php";   		// ������� ���������
	include "nuunstemmer.php";  	// ���������� ���������   
	include "prefixParser.php";		// ���������� ������ ���������
	include "classes.Parser.php";			// ����� �������
	include "classes.Word.php";		// ����� �����   
	
    $word	= "�����������������"; // ���������� �����, ������� ����� �������	
	$MyWord	= Parse($word);
	$MyWord	-> ShowWord();
    
?>