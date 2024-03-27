<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\ProfileUpdateRequest;
use App\Traits\UploadImage;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $user = auth()->user();
        return view('setting.profile',compact('user'));
    }


    // public function update(Request $request)
    // {
    //     $user = auth()->user();

    //     $validated = $request->validate([
    //         'name'=>'required',
    //         'email' => 'required|email|unique:users,email,'.$user->id.',id',
    //     ]);



    //     if($request->password != null){
    //         $request->validate([
    //             'password' => 'required|confirmed'
    //         ]);
    //         $validated['password'] = bcrypt($request->password);
    //     }

    //     if($request->hasFile('profile')){
    //         if($name = $this->saveImage($request->profile)){
    //             $validated['profile'] = $name;
    //         }
    //     }

    //     // $user->update($validated);

    //     return redirect()->back()->withSuccess('User updated !!!');
    // }

    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $validated = $request->validated();

        if($request->password != null){
            $validated['password'] = bcrypt($request->password);
        }

        if($request->hasFile('profile')){
            if($name = $this->saveImage($request->profile)){
                $validated['profile'] = $name;
            }
        }

        if($user->isDirty('email')){
            $validated['email_verified_at'] = null;
        }

        $user->fill($validated);
        $user->save();

        return redirect()->back()->withSuccess('User updated !!!');
    }
}
