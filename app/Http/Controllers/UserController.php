<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserProfile;


class UserController extends Controller
{
    public $model;
    public $modelClass = User::class;
    public $createView = 'user.forms.create';



    /**/
    public function __construct(User $user)
    {
        $this->model = $user;
    }


    protected function validator (array $data)
    {
        return Validator::make($data,
            [
                'name' => 'required|max:15',
                'email' => 'required|email',
                'password' => 'required|min:4',
                'profile.surname' => 'required|min:4',
                'profile.job_title' => 'required|min:4',
                'profile.location' => 'required',
                'profile.bio' => 'required|min:4',
                'profile.phone' => 'required|min:10|numeric',
                'profile.gender' => 'required|min:4',
            ]);

    }

    public function formData()
    {
        return [
            'roles' => Role::get()->pluck('name', 'id'),
        ];
    }


    public function index()
    {
        $collection = $this->model->with('profile')->get();
        return view('user.index', compact('collection'));
    }


    public function form()
    {
        $data = Role::get()->pluck('name', 'id');
        return view('user.form.create', compact('data'));
    }


    public function viewUser($id)
    {
        $data = [];
        $data['item'] = $this->model->where('id',$id)->with('profile')->first();
        $data['roles'] = Role::select('name', 'id')->get()->pluck('name', 'id');
        return view('user.form.edit', compact('data'));

    }


    public function userUpdate(Request $request, $id)
    {

        $user = $this->model->where('id',$id)->first();
        $params = $request->except(['profile','roles']);
        if (!$user) {
            return response('User not found', 404);
        }

        if ($request->has('password')) {
            $params['password'] = bcrypt($request->get('password'));
        }

        $user->update($params);

        $this->afterUpdate($user, $request);

        $user->profile()->update($request->profile);


        return redirect('/users')
            ->with('flash_message_success', 'User was updated successfully');
    }


    public function userCreate(Request $request)
    {

        $model = User::create([
            'first_name'        => $request->get('first_name'),
            'last_name'         => $request->get('last_name'),
            'email'             => $request->get('email'),
            'password'          => bcrypt($request->get('password')),
            'remember_token'    => str_random(20),
            'isActive'          => 1
        ]);


        DB::table('users_profile')->insert([
            'user_id'    => $model->id,
            'job_title'  => $request->get('job_title'),
            'location'   => $request->get('location'),
            'bio'        => $request->get('bio'),
            'phone'      => $request->get('phone'),
            'gender'     => $request->get('gender'),
        ]);

        $this->afterCreate($model, $request);
        return redirect('users')
            ->with('flash_message_success', 'User was created successfully');
    }


    public function afterCreate(Model $model, Request $request)
    {
        if ($request->has('roles')) {
            $model->roles()->sync($request->get('roles'));
        }
    }


    public function afterUpdate(Model $model, Request $request)
    {
        if ($request->has('roles')) {
            $model->roles()->sync($request->get('roles'));
        }
    }


}
