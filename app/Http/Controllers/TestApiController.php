<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    /**
     * Display a listing of all employeees
     *
     * @return string|array
     */
    public function index(): string|array
    {
        try {
            return Employee::all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created employee
     *
     * @param Request $request
     * @return string|array
     */
    public function store(Request $request): string|array
    {
        try {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->department = $request->department;
            $result = $employee->save();
            return $result ? ["result" => "Data Saved"] : ["result" => "Failed"];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified Employee
     *
     * @param integer $id
     * @return string|array
     */
    public function show(int $id): string|array
    {
        try {
            $employee = Employee::find($id);
            return empty($employee) ? "User Not Found" : Employee::find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Update the specified Employee
     *
     * @param Request $request
     * @param integer $id
     * @return string|array
     */
    public function update(Request $request, int $id): string|array
    {
        try {
            $employee = Employee::find($id);
            if (!empty($employee)) {
                $employee->name = $request->name;
                $employee->department = $request->department;
                $result = $employee->save();
                return $result ? ["result" => "Data Updated"] : ["result" => "Updation Failed"];
            }
            return ["result" => "User not found"];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified Employee
     *
     * @param integer $id
     * @return string|array
     */
    public function destroy(int $id): string|array
    {
        try {
            $employee = Employee::find($id);
            if (!empty($employee)) {
                $result = $employee->delete();
                return $result ? ["result" => "Employee Deleted Successfully"] : ["result" => "Failed"];
            }
            return ["result" => "User not found"];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
