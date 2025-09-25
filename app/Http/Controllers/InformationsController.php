<?php 

namespace App\Http\Controllers;

class InformationsController extends Controller {
  public function index() {
    return view('settings');
  }
}