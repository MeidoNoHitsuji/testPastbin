<?php

namespace App\Http\Controllers;

use App\Paste;
use App\Enums\ExpirationType;
use App\Enums\ExposureType;
use App\Enums\SyntaxType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function Signup(){
        $data = array(
            "pastes" => PasteController::GetLastPastes()
        );
        return view('signup', compact("data"));
    }

    public function Login(){
        $data = array(
            "pastes" => PasteController::GetLastPastes()
        );
        return view('login', compact("data"));
    }
}