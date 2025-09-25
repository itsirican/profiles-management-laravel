<?php 

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProfileController extends Controller {
  public function index() {
    $profiles = Profile::paginate(9);
    return view('profile.profiles', compact('profiles'));
  }

  public function show(Request $request) {
    $profile = Profile::findOrFail((int)$request->id);
    // if ($profile == NULL) {
    //   return abort(404);
    // }
    return view('profile.show', compact('profile'));
  }

  public function create() {
    return view('profile.create');
  }
  public function store(Request $request) {
    // dd($request);
    
    // $name = $request->name;
    // $email = $request->email;
    // $password = $request->password;
    // $bio = $request->bio;

    // Verification

    // Insert
    Profile::create($request->post());

    return redirect()->route('profiles.index');

    // if ($_GET) {
    //   Profile::insert($_GET);
    // }
    // return header('location:profiles');
    // return Route('profiles.index');
    // return $this->index();
    // redirect(Route('profiles.index'));
    // dd($_GET);
    // return "Store";
  }
}