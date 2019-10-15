<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //get the secret id
    public function __get_orig_id($secret_id)
    {
        return substr($secret_id, 0, strlen($secret_id) - 32);//always  minus 32 for md5 lenght
    }
}
