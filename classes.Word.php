<?php
/********************************
* ����� - Inferno
* �������� - LGPL
* ������: 1.0
* 15.07.2011
* 
*/ 
	class Word
	{
		private $prefix = array();	// ������ ���������
		private $body	= "";		// ������ � ��������
		private $flexia = "";		// ���������
		
		#AddBody
		public function AddBody($body)		// ���������� �����+���������
		{
			$this -> body = $body;
		}
		
		#AddFlexia
		public function AddFlexia($flexia)	// ���������� ���������
		{
			$this -> flexia = $flexia;
		}
		
		#AddPrefix
		public function AddPrefix($prefix)	// ���������� ���������
		{
			$this -> prefix[] = $prefix;
		}		
		
		#GetBody
		public function GetBody()			// ���������� ������+��������
		{
			return $this -> prefix;
		}
		
		#GetFlexia
		public function GetFlexia()			// ���������� ���������
		{
			return $this -> flexia;
		}
		
		#GetPrefix
		public function GetPrefix()			// ���������� ������ ���������
		{
			return $this -> prefix;
		}		
		
		#ShowWord
		public function ShowWord()			// ����� ����� �� �����
		{
			echo "���������: \n";		print_r($this -> prefix);
			echo "������ � ��������: ";	echo $this -> body, "\n";
			echo "���������: ";			echo $this -> flexia, "\n";			
		}
	}
?>