<?php
    namespace App;
    class Input extends Control
    {
        private string $_name;
        private string $_value;

        public function getName() :string
        {
            return $this->_name;
        }

        public function setName(string $name) :void
        {
            $this->_name = $name;
        }

        public function getValue() :string
        {
            return $this->_value;
        }

        public function setValue(string $value) :void
        {
            $this->_value = $value;
        }
    }
?>