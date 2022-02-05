<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Settings Class
 * 
 * @author Febriansyah Riki Setiadi <febryars33@gmail.com>
 * @since 1.0.0
 * @version 1.0.0
 */
class SettingsController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        //
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password'  =>  'required',
            'new_password'  =>  'required|min:8',
            'confirm_new_password'  =>  'required|same:new_password'
        ]);
        $user = $request->user();
        $user_data = User::find($user['id']);

        if (Hash::check($request->current_password, $user_data['password'])) {

            $user_data->password = Hash::make($request->new_password);
            $user_data->save();

            return response()->json([
                'status'    =>  [
                    'code'  =>  201,
                    'description'   =>  'Created',
                    'message'   =>  'Password Changed.'
                ],
                'results'   =>  $user_data
            ], 201);
        } else {
            return response()->json([
                'status'    =>  [
                    'code'  =>  401,
                    'description'   =>  'Unauthorized',
                ],
                'results'   =>  [
                    'errors'    =>  [
                        'password'  =>  ['Wrong password']
                    ]
                ]
            ], 401);
        }
        // return response()->json([$user_data], 200);
    }

    public function makeTestPassword(Request $request)
    {
        return Hash::make($request->password);
    }
}
