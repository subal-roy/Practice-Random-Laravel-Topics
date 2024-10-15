<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;

class EmailController extends Controller
{
    public function sendEmail() 
    {
        dispatch(new CustomerJob());
        dd("Email has been sent successfully!");
    }
}
