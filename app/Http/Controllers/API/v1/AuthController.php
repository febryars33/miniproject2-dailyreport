<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * AuthController class
 * 
 * @author Febriansyah Riki Setiadi <febryars33@gmail.com>
 * @license MIT
 * @since 1.0.0
 * 
 */
class AuthController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Login function
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {

                $token = $user->createToken($request->device_name)->plainTextToken;

                return response()->json([
                    'status'    =>  [
                        'code'  =>  200,
                        'description'   =>  'OK',
                        'message'   =>  'Login Berhasil.'
                    ],
                    'results'    =>  [
                        'token' =>  $token
                    ]
                ], 200);
            } else {
                return response()->json([
                    'status'    =>  [
                        'code'  =>  401,
                        'description'   =>  'Unauthorized',
                        'message'   =>  'Email or Password wrong.'
                    ]
                ], 401);
            }
        } else {
            return response()->json([
                'status'    =>  [
                    'code'  =>  401,
                    'description'   =>  'Unauthorized',
                    'message'   =>  'Email or Password wrong.'
                ]
            ], 401);
        }
    }

    /**
     * Send password reset link.
     *
     * @param Request $request
     * @return void
     */
    // public function sendPasswordResetLink(Request $request)
    // {
    //     return $this->sendResetLinkEmail($request);
    // }

    /**
     * Userdata function
     *
     * @return void
     */
    public function userdata(Request $request)
    {
        $user = Auth::user();
        $userdata = $request->user();
        $employee = Employee::where('id', '=', $user['employee_id'])->first();

        // join table position
        $employee_position = DB::table('employee_positions')
            ->join('users', 'users.employee_id', '=', 'employee_positions.employee_id')
            ->join('positions', 'positions.id', '=', 'employee_positions.position_id')
            ->get(['code', 'name', 'description']);
        return response()->json([
            'status'    =>  [
                'code'  =>  200,
                'description'   =>  'OK'
            ],
            'results'   =>  [
                'user'  =>  $userdata,
                'employee'  =>  $employee,
                'positions'    =>  $employee_position,
                'jobdesks'  =>  []
            ],
        ], 200);
    }

    public function userdata_edit_bio(Request $request)
    {
        $bio_new = $request->bio;
        sleep(0.5);
        $user = Auth::user();
        $userdata = $request->user();
        $employee = Employee::where('id', '=', $user['employee_id'])->first();

        $employee->bio = $bio_new;

        $employee->save();

        return response()->json([
            'status'    =>  [
                'code'  =>  200,
                'description'   =>  'OK',
                'message'   =>  'Bio edited successfully.'
            ],
            'results'   =>  [
                'bio'   =>  $bio_new
            ]
        ]);
    }

    /**
     * Logout function
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return response()->json([
            'status'    =>  [
                'code'  =>  200,
                'description'   =>  'OK',
                'message'   =>  'Logout Berhasil.'
            ],
        ], 200);
    }
}
