<?php
    namespace App;
    class Label extends Control
    {
        private string $_for;

        public function getParentName(): string
        {
            return $this->_for;
        }

        public function setParentName(object $control): void
        {
            if (method_exists($control, 'getName')) {
                $this->_for = $control->getName();
            } else {
                throw new \Exception("Переданий об'єкт не підтримує метод getName()");
            }
        }

        public function __construct(
            string $background,
            float $width,
            float $height,
            object $control
        ) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setParentName($control);
        }
    }
?>
