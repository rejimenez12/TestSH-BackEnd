<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Utility extends Model
{



	/**
    *   Funcion: json_success.
    *   Explicacion: Esta funcion se encarga de convertir la data de salida en un objeto y manejarlo
    *	como json si todo esta correctamente funcionando.
    **/

    public static function create_json( $status , $message , $data ){

    	$response = new \stdClass();
    	$response->status  = $status;
        $response->message = $message;
        $response->data    = $data;

    	return $response;

    }

}
