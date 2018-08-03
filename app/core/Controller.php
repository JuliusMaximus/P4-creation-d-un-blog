<?php
class Controller {
  protected function view( string $view, array $data = [] ) {
    require_once ROOT . 'app/views/' . $view . '.php';
  }
}
