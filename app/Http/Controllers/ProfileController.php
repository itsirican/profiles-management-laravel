<?php 

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
  public function index() {
    $profiles = Profile::paginate(9);
    return view('profile.profiles', compact('profiles'));
  }

  public function show(Profile $profile) {
    // dd($profile);
    // $profile = Profile::findOrFail((int)$request->id);
    
    // if ($profile == NULL) {
    //   return abort(404);
    // }
    return view('profile.show', compact('profile'));
  }

  public function create() {
    return view('profile.create');
  }
  public function store(ProfileRequest $request) {
    // dd($request);
    
    // $name = $request->name;
    // $email = $request->email;
    // $password = $request->password;
    // $bio = $request->bio;

    // // Verification method 1
    // $verifiedFields = $request->validate([
    //   'name' => 'required|min:5|max:20',
    //   'email' => 'required|email|unique:profiles',
    //   'password' => 'required|min:8|same:repeted_password',
    // ], [
    //   // 'name.required' => 'name is required'
    // ]);

    // Verification method 2 [Request Validation class]
    $verifiedFields = $request->validated();
    

    $verifiedFields['password'] = Hash::make($request->password);
    // $verifiedFields['bio'] = $request->bio;
    // dd($verifiedFields);

    // Insert
    // Profile::create($request->post());
    Profile::create($verifiedFields);

    return redirect()->route('profiles.index')->with('success', 'Profile added successfuly');

  }
}