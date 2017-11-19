<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Progressbar extends CI_Controller {
  function __construct(){
  parent::__construct();
  }
  function index(){
    $this->load->view('progressbar/cargararchivo');
  }
}
  ?>
