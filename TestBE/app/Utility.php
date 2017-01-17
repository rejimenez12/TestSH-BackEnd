<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Utility extends Model
{



	/**
    *   Funcion: create_json.
    *   Explicacion: Esta funcion se encarga de convertir la data de salida en un objeto y manejarlo
    *	como json.
    *   Parametros: Status - (Success, Failed, Error) , Mensaje - (Mensaje respuesta con respecto a la petición) ,
    *   $data - (Los datos solicitados por el cliente).
    **/

    public static function create_json( $status , $message , $data ){

    	$response = new \stdClass();
    	$response->status  = $status;
        $response->message = $message;
        $response->data    = $data;

    	return $response;

    }

}
