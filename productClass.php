<?php
class Product
	{
		public $ID;
		public $name;
		public $price;
		public $quantity;
		public $totalCost;
		public function Product($ID, $name, $price, $quantity)
		{
		$this->ID = $ID;
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
		$this->totalCost = $this->price*$this->quantity;
		}
		public function getFullName()
		{
		return $this->name.' CENA: '.$this->price.' ILOŚĆ: '.$this->quantity.' WARTOŚĆ: '.$this->totalCost;
		}
	} //end Product class;
?>