<?php
    class Product {
        private $id;
        private $address;
        private $city;
        private $phone;
        private $zip_code;
        private $type;
        private $price;

        /**
         * @param $id
         * @param $address
         * @param $city
         * @param $phone
         * @param $zip_code
         * @param $type
         * @param $price
         */
        public function __construct($id, $address, $city, $phone, $zip_code, $type, $price)
        {
            $this->id = $id;
            $this->address = $address;
            $this->city = $city;
            $this->phone = $phone;
            $this->zip_code = $zip_code;
            $this->type = $type;
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * @param mixed $address
         */
        public function setAddress($address)
        {
            $this->address = $address;
        }

        /**
         * @return mixed
         */
        public function getCity()
        {
            return $this->city;
        }

        /**
         * @param mixed $city
         */
        public function setCity($city)
        {
            $this->city = $city;
        }

        /**
         * @return mixed
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * @param mixed $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * @return mixed
         */
        public function getZipCode()
        {
            return $this->zip_code;
        }

        /**
         * @param mixed $zip_code
         */
        public function setZipCode($zip_code)
        {
            $this->zip_code = $zip_code;
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param mixed $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

    }
?>
