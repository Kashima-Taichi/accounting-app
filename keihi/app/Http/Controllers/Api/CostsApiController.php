<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cost;
use Log;

class CostsApiController extends Controller
{
    public function returnCosts() {
        $costs = Cost::orderby('id', 'desc')->get();
        return $costs;
    }
}
