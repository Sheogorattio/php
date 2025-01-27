<?php
    namespace App;
    class Button extends Input
    {
        private bool $_isSubmit;

        public function getSubmitState() : bool
        {
            return $this->_isSubmit;
        }

        public function setSubmitState(bool $isSubmit=true) :void
        {
            $this->_isSubmit = $isSubmit;
        }

        public function __construct(
            string $background,
            float $width,
            float $height,
            string $name,
            string $value,
            bool $isSubmit
        ) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setName($name);
            $this->setValue($value);
            $this->setSubmitState($isSubmit);
        }
    }
?>