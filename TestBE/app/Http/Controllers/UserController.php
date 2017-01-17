<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utility;
use App\User;
class UserController extends Controller
{

    /**
    *   Funcion: index.
    *   Explicacion: Esta función se encarga de suministrar una ruta hacia un formulario de prueba.
    *   para poder verificar el api de crear usuarios.
    *   Nota: Esta función es solo de prueba.
    **/

    public function index( ){

        return \View::make('user.index');


    }

    /**
    *   Funcion: index.
    *   Explicacion: Esta función se encarga de suministrar una ruta hacia un formulario de prueba.
    *   para poder verificar el api de modificar usuarios.
    *   Nota: Esta función es solo de prueba.
    **/

    public function edit( ){

        return \View::make('user.edit');


    }

    /**
    *   Funcion: Create.
    *   Explicacion: Esta función se encarga de la creación de usuarios.
    **/
   
    public function create(  ){

        $user = User::create_u( \Input::all(  ) );
        return json_encode( $user );

    }

    /**
    *   Funcion: Create.
    *   Explicacion: Esta función se encarga de listar los usuarios.
    **/

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

    /**
    *   Funcion: Create.
    *   Explicacion: Esta función se encarga de modificar usuarios.
    **/

    public function update(  ){
        
        $user = User::update_u( \Input::all(  ) );
        return json_encode( $user );



    }

    /**
    *   Funcion: Create.
    *   Explicacion: Esta función se encarga de eliminar usuarios.
    *   Parametro: id - (Id del usuario a ser modificado).
    **/


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
