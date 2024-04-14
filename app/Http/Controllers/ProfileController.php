<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /* +++++++++++++++++++++++ update +++++++++++++++++++++++ */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        // ====== username ======
        if( $request->has('username') )
        {
            $user->name = $request->username;
        }
        // +++++++++++++++ user_profile_image : update one image +++++++++++++
        // "old image"
        $old_image = $user->image;
        if( $request->has('image') )
        {
            // =================== Delete 'image' from Disk ===================
                // ======== Delete "old logo" from Disk ========
                $user->deleteFile($old_image,'uploads/profile/');
                // ================ Upload "new image" on Disk ================
                $file_path = $user->uploadFile($request,'image','uploads/profile/');
                $user->image = $file_path ;
        }
        $user->save();
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // +++++++++++++++++++++++ Logout +++++++++++++++++++++++
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
