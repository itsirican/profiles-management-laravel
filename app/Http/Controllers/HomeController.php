<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
  public function index(Request $request) {
    $name = "Irican";
    $languages = ['Javascript', 'Typescript', 'React', 'Node.js', 'Laravel'];
    $users = [
      ['id' => '1', 'name' => 'Abdelilah', 'job' => 'Software developer'],
      ['id' => '2', 'name' => 'Irican', 'job' => 'Freelancer'],
      ['id' => '3', 'name' => 'Ahmed', 'job' => 'Garderner']
    ];
    // $languages = [];
    return view("homePage", compact('users'));
  }
} 