<?php
    namespace App;
    class Control
    {
        private string $_background;
        private float $_width;
        private float $_height;

        public function getBackground() : string
        {
            return $this->_background;
        }

        public function setBackground(string $background) : void
        {
            $this->_background = $background;
        }

        public function getWidth() : float
        {
            return $this->_width;
        }

        public function setWidth(float $width) : void
        {
            $this->_width = $width;
        }

        public function getHeight() : float
        {
            return $this->_height;
        }

        public function setHeight(float $height) : void
        {
            $this->_height = $height;
        }


    }
?>