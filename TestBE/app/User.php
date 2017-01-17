<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Utility;
use App\User;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


    protected $table = 'users';

    protected $fillable = [ 'name', 'gender' , 'company' , 'email' , 'phone' , 'address' ];


    public static function create_u( $data ){

        $rule = ['name'    => ['required','max:100'],
                 'gender'  => ['required','max:1'],
                 'company' => ['required','max:100'],
                 'email'   => ['required','email','min:6','max:250','unique:users'],
                 'phone'   => ['required'],
                 'address' => ['required']
                ];
   
        $validator = \Validator::make( $data , $rule );

        if ( $validator->fails( ) ){

            return Utility::create_json( 'Error' ,$validator->errors( ), '' );

        }else{

            try{

                if ( $user = User::create( $data ) ){

                    return Utility::create_json( 'Success' , 'User created sucessfuly', $user );


                }else{

                    return Utility::create_json( 'Failed' ,'User not created', '' );

                } 


            }catch( Exception $e ){

                throw new ModelNotFoundException('It has generated an error');

            }

            
      
 
        }

  
    }

    public static function update_u( $data ){

        if ( $user = User::find( $data['id'] ) ){

            if ( $user->email == $data['email'] || $data['email'] == '' ){

                $user->name = $data['name'];
                $user->gender = $data['gender'];
                $user->company = $data['company'];
                $user->phone = $data['phone'];
                $user->address = $data['address'];

                if ( $user->save() ){

                    return Utility::create_json( 'Success' ,'User updated successfuly' , $user );

                }


            }else{

                if ( $user->update( $data ) ){

                    return Utility::create_json( 'Success' ,'User updated successfuly' , $user );

                }else{

                    return Utility::json_failed( 'User not updated' );
                    
                }
            } 
        }
    }



}
