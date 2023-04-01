<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Country;
use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Traits\HasCountry;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HasCountry;

    public function profile()
    {
        // return 123;
        // $user = auth()->user();
        // $role = $user->role;
        // $data['user'] = $user;

        // if ($role == 'owner') {
        //     $data['countries'] = Country::all(['id', 'name']);
        // }elseif($role == 'employee') {
        //     $data['user'] = $user->load('employee');
        // }

        return inertia('Profile');
    }

    public function passwordUpdate(ProfileUpdateRequest $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        $this->flashSuccess('Password changed successfully!');
        return back();
    }




































    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search') ?? '';

        $admins = User::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%');
            })
            ->where('role', 'admin')
            ->where('id', '!=', auth()->id())
            ->latest()
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $search ? preg_replace('/('.$search.')/i', "<b class='bg-warning'>$1</b>", $user->name) : $user->name,
                'email' => $search ? preg_replace('/('.$search.')/i', "<b class='bg-warning'>$1</b>", $user->email) : $user->email,
                'avatar' => $user->avatar,
                'avatar_url' => $user->avatar_url,
            ]);

        return inertia('Admin/User/Index', [
            'admins' => $admins,
            'filters' => request()->only('search'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->only(['name', 'email', 'password', 'avatar']);
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'admin';

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg,svg'],
            ]);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['avatar'] = $url;
        }

        User::create($data);

        session()->flash('success', 'User created successfully!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return inertia('Admin/User/Show', [
            'user' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $user = $admin;

        return inertia('Admin/User/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $admin)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg'],
            ]);

            deleteImage($admin->avatar);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['avatar'] = $url;
        }

        $admin->update($data);

        session()->flash('success', 'Admin updated successfully!');

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        deleteImage($admin->avatar);
        $admin->delete();

        session()->flash('success', 'User deleted successfully!');

        return back();
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $role = $user->role;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:users,email, $user->id",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg'],
            ]);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['avatar'] = $url;
        }

        $user->update($data);

        if($role == 'employee' && $request->phone) {
            $user->employee->update(['phone' => $request->phone]);
        }

        session()->flash('success', 'Profile updated successfully!');

        return back();
    }



    public function accountDelete()
    {
        User::find(auth()->id())->delete();

        session()->flash('success', 'Account deleted successfully!');

        return redirect()->route('login');
    }
}
