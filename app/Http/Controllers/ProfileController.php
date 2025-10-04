<?php 

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
  public function index() {
    $profiles = Profile::paginate(9);
    if (Auth::check()) {
      return view('profile.profiles', compact('profiles'));
    } else {
      return to_route('login.show');
    }
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
    if ($request->hasFile('image')) {
      $verifiedFields['image'] = $request->file('image')->store('profile', 'public');
    }

    // $verifiedFields['bio'] = $request->bio;
    // dd($verifiedFields);

    // Insert
    // Profile::create($request->post());
    Profile::create($verifiedFields);

    return redirect()->route('profiles.index')->with('success', 'Profile added successfuly');

  }

  public function destroy(Profile $profile) {
    $profile->delete();
    return to_route('profiles.index')->with('success', 'Profile deleted successfully');
  }

  public function edit(Profile $profile) {
    return view('profile.edit', compact('profile'));
  }

  public function update(ProfileRequest $request, Profile $profile) {
    $formFields = $request->validated();
    $formFields['password'] = Hash::make($request->password);
    // $formFields['image'] = $this->uploadImage($request);
    if ($request->hasFile('image')) {
     $formFields['image'] = $request->file('image')->store('profile', 'public');
    }
    // dd($formFields);
    $profile->fill($formFields)->save();

    return to_route('profiles.edit', $profile->id)->with('success', 'Profile updated successfully');
  }
  
}