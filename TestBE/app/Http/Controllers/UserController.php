<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utility;
use App\User;
class UserController extends Controller
{

    public function index( ){

        return \View::make('user.index');


    }


    public function edit( ){

        return \View::make('user.edit');


    }
   
    public function create(  ){

        $user = User::create_u( \Input::all(  ) );
        return json_encode( $user );

    }

    public function show(  ){

        try{

            $user = User:: all(  );

            if ( count( $user ) >0 ){

                return json_encode( Utility::create_json( 'Success' ,'User list' , $user ) ); 

            }else{

                return json_encode( Utility::create_json( 'Success' ,'Users not created' ) ) ;

            }

        }catch( Exception $e ){

            throw new ModelNotFoundException('It has generated an error');
        }






    }

    public function update(  ){
        
        $user = User::update_u( \Input::all(  ) );
        return json_encode( $user );



    }



    public function destroy( $id ){
        
        if ( $user = User::find( $id ) ){

            if ( $user->delete() ){

            return json_encode( Utility::create_json( 'Success' ,'User delete successfuly' , $user ) );

            }else{

                return json_encode( Utility::create_json('Failed' ,'Error consulting data', '' ) );

            }

        }else{

            return json_encode( Utility::create_json( 'Success' ,'User not found' , '' ) );
        } 
        
    }

}
