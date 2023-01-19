<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.sections.user.index', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->has('removeImage')) {
            $validatedData['picture'] = null;

            if (auth()->user()->picture) {
                Storage::delete(auth()->user()->picture);
            }
        } else {
            if ($request->file('picture')) {
                $validatedData['picture'] = $request->file('picture')->store('user-profiles');
            }
        }

        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    public function donations()
    {
        $donations = Donation::where('user_id', auth()->user()->id)->with('campaign');

        return view('user.sections.user.donations', [
            'donations' => $donations->paginate()
        ]);
    }
}
