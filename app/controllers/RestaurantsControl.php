<?php

class Restaurants extends Controller {
    public function index() {
        $this->view('restaurants/index');
    }
    
    public function detail() {
        $this->view('restaurantPage/index');
    }
}