<?php

class Update extends Controller {
    public function index() {
        $this->view('update/index');
    }

    public function editRestaurant() {
        $this->view('update/editPage');
    }

    public function addRestaurant() {
        $this->view('add/index');
    }
}