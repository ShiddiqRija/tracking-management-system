<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDO;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($data, $message)
    {
        $res = [
            'success'   => true,
            'message'   => $message,
            'data'      => $data
        ];

        return response()->json($res, 200);
    }

    public function sendError($error, $errMsg = [], $code = 404)
    {
        $res = [
            'success'   => false,
            'message'   => $error
        ];

        if (!empty($errMsg)) {
            $res['data'] = $errMsg;
        }

        return response()->json($res, $code);
    }
}
