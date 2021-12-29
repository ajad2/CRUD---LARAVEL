<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{
    public function createUserDetails(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'name' => 'required',
                'number' => 'required|string|min:10|max:12|regex:/[0-9]{9}/',
                'email' => 'required',
                'age' => 'required',

            ],
            [
                // 'number.max' => 'Please enter five digit number.',
                // 'skillId.required_if' => 'The skill id field is required.',
                // 'uploadedFor.required_if' => 'The uploadedFor field is required.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Upload failed',
                'error' => $validator->errors(),
                'statusCode' => 400,
                'status' => 'Failed',
                'errorMessages' =>  $validator->errors()->all()
            ], 400);
        }
        dd($request->name);
        $data = [];
        $data['name'] = $request->name;
        $data['number'] = $request->number;
        $data['email'] = $request->email;
        $data['age'] = $request->age;


        // $data =
        //     [
        //         'name' => 'ajad',
        //         'number' => '995564666',
        //         'email' => 'ajad@gmail.com',
        //         'age' => 22
        //     ];
        //dd($data);
        $userDetails = UserDetails::create($data);
        dd($userDetails);

        //   $flight = new UserDetails;

        //   $flight->name = 'jio';

        //   $flight->number = 982335555;

        //   $flight->save();

        //   dd($flight);

        // $userDetails->fill(['age' => 'Amsterdam to Frankfurt']);
        //return response()->json(['data' => $userDetails]);
        // dd($userDetails->toArray());
    }

    public function updateUserDetails()
    {

        // $affected = UserDetails::where('id', 6) ->update(['name' => 'shinoj']);
        // $response = UserDetails::where('name', 'sulfi')->first ();
        // dd($response->toArray());
        // Flight::find(1)
        // tap($response)->update(
        //     ['number' => '5632254998']);
        // dd($response->toArray());
        // OBJECT
        $ops = UserDetails::find(6);
        $ops->number = 4848484848;
        $ops->save();
        dd($ops);
    }

    public function selectUserDetails()
    {

        // $ops = UserDetails::select('name', 'email')->where('Deleted',0)->get();
        // dd($ops->toArray());
        $ops = UserDetails::all();
        dd($ops->toArray());
    }

    public function deleteUserDetails()
    {

        // $ops = UserDetails::find(6);
        // $ops->delete();
        // dd($ops);

        $data = UserDetails::findOrFail(1);
        $response = tap($data)->delete();
        dd($response);
        // $affected = UserDetails::where('id', 3) ->update(['Deleted' => 1]);
    }
}
