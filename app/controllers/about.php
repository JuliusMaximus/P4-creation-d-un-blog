<?php
// Page "Qui suis-je ?"
class About extends Controller {
  public function index() {
    $this->view( 'home/about', [] );
  }
}