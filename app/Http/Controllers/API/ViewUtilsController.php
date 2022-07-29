<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;

class ViewUtilsController extends BaseController
{
    public function renderTable(Request $request)
    {
        $table = $request->table;

        try {
            //code...
           $x = view("partial._table", ["headers" => $table["headers"], "data" => $table["data"]])->render();
        } catch (\Throwable $th) {
            error_log($th);
        }
        return response()->json($x);
    }
}
