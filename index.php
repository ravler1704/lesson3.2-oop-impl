<?php
//интерфейсы
interface Flieble
{
	//public function fly();
}

interface Priceble
{
	//public function getDiscountPrice();
	//public function getPrice();
}
//суперклассы
abstract class Product implements Priceble {
	public $name;
	public $price;
	public $discount = 10;
	
	
	public function __construct($name, $price, $discount){
		$this->name = $name;
		$this->price = $price;
		$this->discount = $discount;
	}
	
	public function getPrice(){
			return $this->price;
	}
	public function getDiscountPrice(){
			return $this->price - (($this->price * $this->discount) / 100);
	}
		
}

abstract class Flying implements Flieble {
	public function fly() {
		return 'Я летаю!';
	}
}

//подкласс Flying

class Duck extends Flying {
	public $sound;
	
	public function krya(){
		return 'Кря-кря';
	}
		public function ga(){
		return 'Га-га';
	}
}

//подкласс Product
class Tv extends Product {
	public $size = 40;
	public $brand;
	
	public function __construct(){
		echo '<br />был создан объект класса Tv';
	}
}
class Pan extends Product {
	public $color;
	
	public function __construct($color){
		$this->color = $color;
		echo '<br />был создан объект класса Pan c цветом - ' . $color;
	}
}

class Car extends Product {
	public $color = 'Белая';
	public $type;
	
	public function __construct(){
		parent::__construct($name, $price, $discount);
	}
	public function changeColor($color){
		$this->color = $color;
	}
}

class Phone extends Product {

}

//объекты
$car1 = new Car();
$car2 = new Car();
$car1->changeColor('Зеленая');
echo 'car1 - ' . $car1->color . '<br />';
echo 'car2 - ' . $car2->color . '<br />';

$tv1 = new Tv();
$tv2 = new Tv();
echo $tv2->discount;
echo '<br />';

$pan1 = new Pan('Красный');
$pan2 = new Pan('Синий');
echo '<br /> pan1 - ' . $pan1->color;
echo '<br /> pan2 - ' . $pan2->color;
$pan2->color = 'Черный';
echo '<br /> Меняем цвет pan2, теперь он - ' . $pan2->color;
echo '<br />';
echo '<br />';

$duck1 = new Duck();
$duck2 = new Duck();
echo 'Утка duck1 делает - ' . $duck1->krya() . ' ' . $duck1->fly();
echo '<br />';
echo 'Утка duck2 делает - ' . $duck2->ga() . ' ' . $duck2->fly();;
echo '<br />';
echo '<br />';

$iphone = new Phone('Apple iPhone 7', 72000, 10);
$galaxy = new Phone('Samsung Galaxy S7', 50000, 0);
echo 'Цена ' . $iphone->name . ' - ' . $iphone->price . ' руб. ';
echo '<br />';
echo 'Цена ' . $iphone->name . ' со скидкой ' . $iphone->getDiscountPrice() . ' руб. ';
echo '<br />';
echo 'Цена ' . $galaxy->name . ' - ' . $galaxy->price . ' руб. ';
echo '<br />';

?>
