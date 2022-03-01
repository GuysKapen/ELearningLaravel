<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\AuthorDetail;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'about' => 'required'
        ]);

        $profile = Auth::user()->authorDetail;

        if (!isset($profile)) {
            $profile = new AuthorDetail();
        }

        $profile->user_id = Auth::user()->id;
        $profile->title = $request->title;
        $profile->about = $request->about;

        $cover = $request->file("cover");
        if (isset($cover)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = Auth::user()->username . '-' . $currentDate . '-' . uniqid() . '.' . $cover->getClientOriginalExtension();

            // Image for cover
            if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }

            // Delete old image
            if (!Storage::disk("public")->exists("profile/" . $profile->cover)) {
                Storage::disk("public")->delete("profile/" . $profile->cover);
            }

            Storage::disk('public')->put('profile/' . $imageName, file_get_contents($cover));
        } else {
            $imageName = 'default.png';
        }

        $profile->cover = $imageName;

        if ($profile->save()) {
            Toastr::success('Save profile successfully', 'Succeed');
            return redirect()->back();
        }

        Toastr::warning('Failed to save course', 'Failed');
        return redirect()->back();
    }

    public function profile() {
        return view('author.profile');
    }
}
