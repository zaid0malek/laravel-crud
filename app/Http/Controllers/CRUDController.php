<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CRUDController extends Controller
{
    /**
     * Display a listing all users
     *
     * @return void
     */
    public function index()
    {
        try {
            $users = Data::all();
            $data = compact('users');
            return view('show')->with($data);
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function create(): View
    {
        try {
            $url = url('/crud');
            $method = 'post';
            $data = compact('url', 'method');
            return view('home')->with($data);
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }
    }

    /**
     * Store a newly created user.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            $input = $request->except('_token', '_method');
            $input['password'] = md5($input['password']);
            Data::create($input);
            return redirect('crud');
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified user
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function edit(int $id): RedirectResponse|View
    {
        try {
            $user = Data::find($id);
            if (!empty($user)) {
                $url = url('/crud') . "/" . $id;
                $method = 'put';
                $data = compact('user', 'url', 'method');
                return view('home')->with($data);
            }
            return redirect('crud');
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }
    }

    /**
     * 'Update the specified resource in storage'
     *
     * @param StoreUserRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(StoreUserRequest $request, int $id): RedirectResponse
    {
        try {
            $user = Data::find($id);
            if (!empty($user)) {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->save();
            }
            return redirect('crud');
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }

    }

    /**
     * Remove the specified user
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $user = Data::find($id);
            if (!empty($user)) {
                $user->delete();
            }
            return redirect('crud');
        } catch (\Throwable $th) {
            return redirect('crud')->with($th->getMessage());
        }
    }
}
