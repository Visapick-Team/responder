<?php

namespace Pickmap\Responder;

class Res
{
    public static function success(string|object|array|null $data = null,$statusCode = 200) : object
    {
        return self::response( "success" , null , $data , $statusCode);
    }
    
    public static function fail(string|object|array|null $data = null,$statusCode = 200) : object
    {
        return self::response( "fail" , null , $data , $statusCode);
    }

    public static function error(string $message ,string|object|array|null $data = null,$statusCode = 500): object
    {
        return self::response( "error" , $message , $data , $statusCode);
    }

    public static function response($status,$message,$data,$code)
    {
        $result = [
            "status"        => $status,
            "message"       => $message,
            "data"          => $data
        ];

        return Response()->json(array_merge($result,$data),$code);
    }
}
