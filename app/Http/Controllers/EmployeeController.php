<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class EmployeeController extends Controller
{
    //
    public function query() {
        $testquery = Employee::all();
        print_r($testquery);
    }

    public function add_emp() {

        $lastname = "Gilay";
        $firstname = "Romeo Bryce";
        $middlename = "O.";
        $presaddress = "Camella Springville";
        $provaddress = "La Union";
        $phonenumber = "8991234";
        $telnumber = "8991234";
        $email = "bryce@emial.com";
        $dateofbirth = "1996-4-21";
        $placeofbirth = "fromvagina";
        $gender = "Bading";
        $civilstatus = "widowed";

        $addEmployee = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'present_add' => $presaddress,
            'province_add' => $provaddress,
            'phonenumber' => $phonenumber,
            'telnumber' => $telnumber,
            'email' => $email,
            'dateofbirth' => $dateofbirth,
            'placeofbirth' => $placeofbirth,
            'gender' => $gender,
            'civilstatus' => $civilstatus
        ];

        $this->save_db($addEmployee);
        $test = $this->delete_emp(1);
        return response()->json($test);
        
        return response()->json("Ok");
    }

    public function save_db($data_save) {
        $employeeAdd = new Employee;
        $employeeAdd->last_name = $data_save['lastname'];
        $employeeAdd->first_name = $data_save['firstname'];
        $employeeAdd->middle_name = $data_save['middlename'];
        $employeeAdd->present_address = $data_save['present_add'];
        $employeeAdd->provincial_address = $data_save['province_add'];
        $employeeAdd->phone_number = $data_save['phonenumber'];
        $employeeAdd->telephone_number = $data_save['telnumber'];
        $employeeAdd->email = $data_save['email'];
        $employeeAdd->date_of_birth = $data_save['dateofbirth'];
        $employeeAdd->place_of_birth = $data_save['placeofbirth'];
        $employeeAdd->gender = $data_save['gender'];
        $employeeAdd->civil_status = $data_save['civilstatus'];
        $employeeAdd->save();

    }

    public function edit_emp() {

    }

    public function delete_emp($id) {
        $employeeToBeDel = Employee::where('id', $id)->get();

        foreach($employeeToBeDel as $val) {
            $lastname = $val['last_name'];
            $firstname = $val['first_name'];
            $middlename = $val['middle_name'];
        }

        $employeeDel = Employee::where('id', $id)->delete();
        if ($employeeDel > 0) {
            return response()->json("Employee Deleted: ".$lastname.", ".$firstname." ".$middlename);
        }
        else {
            return response()->json("No data to be deleted");
        }
        
    }
}
