<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Request;
use Response;
use App\User;
use App\UserDetails;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function register(){
        if ( Session::token() !== Request::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to register'
            ) );
        }

        $rules = array('username' => 'required', 'email' => 'required|email|unique:users', 
            'password' => 'required|confirmed', 'password_confirmation' => 'required',
            'date_of_registration' => 'required|date_format:d-m-Y', 'first_name'=>'required',
            'last_name' => 'required', 'date_of_birth' => 'required|date_format:Y-m-d',
            'age' => 'required|numeric', 'weigth' => 'required|numeric',
            'donation_status_details' => 'required_if:donation_status,No'
            );
        $validator = Validator::make(Request::all(), $rules);
        /*$validator->sometimes('donation_status_details','required', function($input){
            return $input->donation_status = 'N';
        });*/ 

        if($validator->fails()){
             return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }else{
            $username = Request::get('username');
            $email = Request::get('email');
            $password = Request::get('password');
            $user_status = 0;
            $user_type = 0;
            $user = User::add($username, $email, $password, $user_status, $user_type);

            $response = array(
                'status' => 'success',
                'msg' => 'registration successful!',
            );
        }
        //$first_name = Request::get('first_name');
        //$user_details = UserDetails::add($user, $first_name);

        return Response::json( $response );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
