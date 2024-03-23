<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $totalUsers = DB::table('users')->count();
        $adminCount = DB::table('users')->where('role', 'admin')->count();
        $doctorCount = DB::table('users')->where('role', 'doctor')->count();
        $userCount = DB::table('users')->where('role', 'user')->count();

        $adminPercentage = round(($adminCount / $totalUsers) * 100);
        $doctorPercentage = round(($doctorCount / $totalUsers) * 100);
        $userPercentage = round(($userCount / $totalUsers) * 100);

        return view('pages.users.index', compact('users', 'adminCount', 'doctorCount', 'userCount', 'adminPercentage', 'doctorPercentage', 'userPercentage'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        if($request->hasFile('photo')){
            $filename = $request->photo->getClientOriginalName();
            $user->photo = $request->photo->storeAs('photos', $filename, 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User successfully created');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('pages.users.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', compact('user'));
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'sometimes|nullable|min:6',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;

        // Check if a photo is present in the request
        if ($request->hasFile('file')) {
            // Handle photo upload
            $filename = $request->file->getClientOriginalName();
            $user->file = $request->file->storeAs('photos', $filename, 'public');
        }

        // Handle password update
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }



        $user->save();

        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }



    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }
}
