<?php 

namespace pondit\calculator;
 class Calculator{

        public $num1= null;
        public $num2= null;

        public function __construct($num1,$num2){
                $this->num1=$num1;
                $this->num2=$num2;

        }

        function sum(){
            return $this->num1+ $this->num2;
            
        }
        function sub(){
            return $this->num1 - $this->num2;

        }
        function multi(){
            return $this->num1 * $this->num2;

        }
        function div(){
            return $this->num1 / $this->num2;

        }

 }




?>