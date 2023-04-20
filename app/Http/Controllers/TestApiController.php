<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    /**
     * Display a listing of all employeees
     *
     * @return string
     * or
     * @return array
     */
    public function index(): string | array
    {
        try {
            return Employee::all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created employee
     *
     * @param Request $request
     * @return string
     * or
     * @return array
     */

    public function store(Request $request): string | array
    {
        try {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->department = $request->department;
            $result = $employee->save();

            if($result) {
                return ["result" => "Data Saved"];
            }
            else {
                return ["result" => "Failed"];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified Employee
     *
     * @param integer $id
     * @return string
     * or
     * @return array
     */
    public function show(int $id): string | array
    {
        try {
            return Employee::find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified Employee
     *
     * @param Request $request
     * @param integer $id
     * @return string
     * or
     * @return array
     */
    public function update(Request $request, int $id): string | array
    {
        try {
            $employee = Employee::find($id);
            if (empty($employee)) {
                return ["result"=>"User not found"];
            }
            else {
                $employee->name = $request->name;
                $employee->department = $request->department;
                $result = $employee->save();

                if ($result) {
                    return ["result"=>"Data Updated"];
                }
                else {
                    return ["result"=>"Updation Failed"];

                }
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified Employee
     *
     * @param integer $id
     * @return string
     * or
     * @return array
     */
    public function destroy(int $id): string | array
    {
        try {
            $employee = Employee::find($id);
            if (!empty($employee)) {
                $result = $employee->delete();
                if ($result) {
                    return ["result"=>"Employee Deleted Successfully"];
                }
                else {
                    return ["result"=>"Failed"];
                }
            }
            else {
                return ["result"=>"User not found"];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
