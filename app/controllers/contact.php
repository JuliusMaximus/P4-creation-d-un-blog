<?php
class contact extends Controller {
  public function index() {
    $this->view( 'home/contact', [] );
  }
}