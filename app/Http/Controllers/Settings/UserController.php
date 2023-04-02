<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.settings.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.settings.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $req = $request->validated();

            if ($request->password !== $request->confirm_password) return back()->withInput()->with('error', 'Password not match');

            $req['password'] = bcrypt($request->password);

            User::create($req);

            return redirect()->route('accounts.index')->with('success', 'Account added successfully');
        } catch (\Exception $err) {
            return back()->withInput()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $account)
    {
        return view('pages.settings.user.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $account)
    {
        try {
            if ($request->password !== $request->confirm_password) return back()->with('error', 'Password not match');

            if ($request->password === null) {
                $account->update($request->except(['password', 'confirm_password']));
            } else {
                $request['password'] = bcrypt($request->password);

                $account->update($request->except(['confirm_password']));
            }

            return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
        } catch (\Exception $err) {
            return back()->with('error', 'Failed to update')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $account)
    {
        try {
            $account->delete();

            return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
        } catch (\Exception $err) {
            return back()->with('error', 'Failed to delete')->withInput();
        }
    }

    public function userLists()
    {
        $users = User::query()->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('role', function ($data) {
                return 'Fix this !';
            })
            ->make(true);
    }
}
