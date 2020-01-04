<?php

class Address {
    protected $city;
    protected $country;

    public function setCity($city) { $this->city = $city;}
    public function getCity() { return $this->city;}
    public function setCountry($country) { $this->country = $country;}
    public function getCountry() { return $this->country;}
    
}

?>