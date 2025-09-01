<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecaptchaController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=>captcha_img('default', ['alt' => 'Captcha'])]);
    }
}
