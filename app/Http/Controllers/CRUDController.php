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
        $users = Data::all();
        $data = compact('users');
        return view('show')->with($data);
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function create(): View
    {
        $url = url('/crud');
        $method = 'post';
        $data = compact('url','method');
        return view('home')->with($data);
    }

    /**
     * Store a newly created user.
     *
     * @param StoreUser $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->except('_token','_method');
        $user = Data::create($input);

        return redirect('crud');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function edit(int $id): RedirectResponse |View
    {
        $user = Data::find($id);
        if (empty($user)) {
            return redirect('crud');
        } else {
            $url = url('/crud')."/".$id;
            $method = 'put';
            $data = compact('user','url','method');
            return view('home')->with($data);
        }
    }

    /**
     * Update the specified resource in storage
     *
     * @param Request $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $user = Data::find($id);
            if (empty($user)) {
                return redirect('crud');
            } else {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->save();
                return redirect('crud');
            }
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
        $user = Data::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect('crud');
    }
}
