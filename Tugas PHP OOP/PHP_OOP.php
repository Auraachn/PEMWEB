<?php
    class product 
    {
        public static $name;
        public static $price;
        public static $discount;

        function __construct()
        {
        }

        function setName($n)
        {
           self::$name = $n;
        }

        function setPrice($n)
        {
            self::$price = $n;
        }

        function setDiscount($n)
        {
            self::$discount = $n;
        }

        public function getName()
        {
            echo "Product bernama " .self::$name,  "<br />";
        }

        public function getPrice()
        {
            
            echo" memiliki harga Rp." .self::$price , "<br />";
        }

        public function getDiscount()
        {
            echo " memiliki diskon Rp" .self::$discount , "<br />";
        }
    }

    class CDMusic extends product
    {
        public $artist;
        public $genre;

        function __construct()
        {
        }

        function setArtist($n)
        {
            $this->artist = $n;
        }

        function setGenre($n)
        {
            $this->genre = $n;
        }

        public function getArtist()
        {
            echo "Nama artist adalah " .$this->artist, "<br />";
        }

        public function getGenre()
        {
            echo "Genre CD adalah " .$this->genre, "<br />";
        }

        public function harga_cd()
        {
            $a = parent::$price  + (0.1 * parent::$price);
            echo "Harga untuk CD adalah Rp." . $a, "<br />";
        }

        public function diskon_cd()
        {
            $b = parent::$discount  + (0.05 * parent::$discount);
            echo "Diskon untuk CD Music adalah Rp." . $b, "<br />";
        }
    }

    class CDRack extends product
    {
        protected $capacity;
        protected $model;

        function __construct()
        {
        }

        function setCapacity($n)
        {
            $this->capacity = $n;
        }

        function setModel($n)
        {
            $this->model = $n;
        }

        public function getCapacity()
        {
            echo "Capacitynya adalah " .$this->capacity, "<br />";
        }

        public function getModel()
        {
            echo "Modelnya adalah " .$this->model, "<br />";
        }

        function harga_rack()
        {
            $a = parent::$price  + (0.15 * parent::$price);
            echo "Harga untuk CD adalah Rp." . $a, "<br />";
        }

        function diskon_rack()
        {
            echo "Tidak ada Diskon <br />";
        }
    }

   print product::$name;
   echo"<br />";
   $new_product = new product();
   $new_product->setName("River Springs");
   $new_product->setPrice(200000);
   $new_product->setDiscount(10000);
   $new_product->getName();
   $new_product->getPrice();
   $new_product->getDiscount();
   echo "---------------------------------------<br />";
   print $new_product::$name ."<br />";
   print $new_product::$price ."<br />";
   print $new_product::$discount ."<br />";

   echo"<br />";
   $new_product = new CDMusic();
   $new_product->setArtist("Cassandra");
   $new_product->setGenre("Classical");
   $new_product->getArtist();
   $new_product->getGenre();
   $new_product->harga_cd();
   $new_product->diskon_cd();
   echo "---------------------------------------<br />";
   print $new_product->artist ."<br />";
   print $new_product->genre ."<br />";
   
   echo"<br />";
   
   $new_product = new CDRack();
   $new_product->setCapacity(5);
   $new_product->setModel("A67F009");
   $new_product->getCapacity();
   $new_product->getModel();
   $new_product->harga_rack();
   $new_product->diskon_rack();
   echo "---------------------------------------<br />";
   print $new_product->capacity ."<br />"; // error, tidak dapat di print secara langsung karena variable memiliki scope protected
   print $new_product->model ."<br />"; // error, tidak dapat di print secara langsung karena variable memiliki scope protected
   //sehingga variabel proctected hanya bisa dipanggil melalui fungsi khusus didalamnya yang digunakan untuk memanggil
?>