<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

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
     * @return boolean
     */
    public function create(): bool
    {
        $url = url('/crud');
        $method='post';
        $data = compact('url','method');
        return view('home')->with($data);
    }

    /**
     * Store a newly created user.
     *
     * @param StoreUser $request
     * @return boolean
     */
    public function store(StoreUser $request): bool
    {
        $input = $request->except('_token','_method');
        $user = Data::create($input);

        return redirect('crud');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user
     *
     * @param integer $id
     * @return boolean
     */
    public function edit(int $id): bool
    {
        $user = Data::find($id);
        if (!empty($user)) {
            // $user->delete();
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
     * @return boolean
     */
    public function update(Request $request, int $id): bool
    {
        try {
            $user = Data::find($id);
            if (empty($user)) {
                // $user->delete();
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
     * @return boolean
     */
    public function destroy(int $id): bool
    {
        $user = Data::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect('crud');
    }
}
