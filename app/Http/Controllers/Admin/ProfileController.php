<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest as AdminProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $user = auth()->user();
        return view('setting.profile', compact('user'));
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

    public function update(AdminProfileUpdateRequest $request)
    {

        $user = $request->user();
        $validated = $request->validated();

        if ($request->password != null) {
            $validated['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {

            // First removing the old image
            $this->removeImage($user->image);

            // Save the uploaded image and get the image path
            $imagePath = $this->uploadImage($request, 'image');

            // Check if image path is not empty (i.e., image uploaded and saved successfully)
            if ($imagePath) {
                // Update the user's image attribute with the new image path
                $user->image = $imagePath;
            }
        }

        if ($user->isDirty('email')) {
            $validated['email_verified_at'] = null;
        }
        $user->fill($validated);
        $user->save();

        return redirect()->back()->withSuccess('User Profile updated !!!');
    }
}
