<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use Image;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \Auth::user();
        //$data = User::with('profile')->findOrFail( \Auth::user() );
        return view('home', compact('data'));
    }

    public  function updateProfile(Request $request) {

        //dd($request);
        $User   = Auth::user();

        if ($request->hasFile('avatar')) {
            //dd("TRUE");
            $avatar = $request->file('avatar');
            //dd($avatar);

            $filename = strtolower($User->first_name) . '-' . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)
                ->backup()
                ->resize(160, 160)
                ->save( public_path('/uploads/avatars/' . $filename) )
                ->reset()
                ->resize(128, 128)
                ->save(public_path('/uploads/avatars/' . '128'. $filename ) );

            $User->avatar = $filename;
            $User->save();
        }


        try {
            DB::table('users')
                ->where('id', $User->id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'isActive' => '1'
                ]);

            DB::table('users_profile')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'bio'       => $request->bio,
                    'location'  => $request->location,
                    'phone'     => $request->phone,
                    'cell'     => $request->cell,
                ]);
        } catch(ModelNotFoundException $ex) {
            //return response($ex->getMessage(), 400);
            return redirect()->action('ProfileController@index')->with([
                'flash_message_danger' => 'Something went wrong !'
            ]);
        }

        $data   = User::with('profile')->findOrFail( Auth::user()->id );

        return redirect()->action('ProfileController@index')->with([
            'user'  => Auth::user(),
            'flash_message_success', 'Profile was updated successfully',
            'data' => $data
        ]);
    }

    public function updatePassword (Request $request)   {
        $User   = Auth::user();

        if($request->ajax()) {
            try {
                DB::table('users')
                    ->where('id', $User->id)
                    ->update([
                        'password' => bcrypt($request->password),
                    ]);
            } catch(ModelNotFoundException $ex) {
                return redirect()->action('ProfileController@profile')->with([
                    'flash_message_danger' => 'Something went wrong !'
                ]);
            }

        }
        return response()->json(['flash_message_success' => 'User was updated Successfully', 'response' => 200]);
    }
}
