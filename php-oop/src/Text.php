<?php
    namespace App;
    class Text extends Input
    {
        private string $_placeholder;

        public function getPlaceholder(): string
        {
            return $this->_placeholder;
        }

        public function setPlaceholder(string $placeholder): void
        {
            $this->_placeholder = $placeholder;
        }

        public function __construct(
            string $background,
            float $width,
            float $height,
            string $name,
            string $value,
            string $placeholder
        ) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setName($name);
            $this->setValue($value);
            $this->setPlaceholder($placeholder);
        }
    }
?>
