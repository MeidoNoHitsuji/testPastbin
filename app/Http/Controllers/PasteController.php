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

class PasteController extends Controller
{

    public function dataParser($date){ //Да, да, датапарсер
        if($date->y > 0) return $date->y . "г. назад";
        if($date->m > 0) return $date->m . " мес. назад";
        if($date->d > 0) return $date->d . " дн. назад";
        if($date->h > 0) return $date->h . " ч. назад";
        if($date->i > 0) return $date->i . " мин. назад";
        if($date->s > 0) return $date->s . " сек. назад";
        return "0 сек. назад";
    }

    public function GetLastPastes(){
        $pastes = Paste::orderBy('id', 'desc')
                    ->take(10)
                    ->get();
        $now = Carbon::now();

        foreach ($pastes as $key => $paste) {
            $interval = $now->diff($paste->created_at);
            switch ($paste->expiration) {
                case ExpirationType::Min10:
                    if($interval->i >= 10)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Hour1:
                    if($interval->h >= 1)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Day1:
                    if($interval->d >= 1)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Week1:
                    if($interval->d >= 7)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Week2:
                    if($interval->d >= 14)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Month1:
                    if($interval->m >= 1)
                        unset($pastes[$key]);
                    break;
                case ExpirationType::Year1:
                    if($interval->y >= 1)
                        unset($pastes[$key]);
                    break;
            }
            if($paste->exposure != ExposureType::Pub) unset($pastes[$key]);
            $paste->syntax = SyntaxType::getInstance($paste->syntax)->description;
            $paste->interval = $this->dataParser($interval);
        }

        return $pastes;
    }

    public function get(){
        $pastes = $this->GetLastPastes();
        return view('main', compact("pastes"));
    }

    public function getpaste($link){
        $paste = Paste::where("link", $link)->first();
        if($paste != ""){
            $paste->syntax = SyntaxType::getInstance($paste->syntax)->description;
            $pastes = $this->GetLastPastes();
            $data = array(
                "paste" => $paste,
                "pastes" => $pastes
            );
            return view('paste', compact("data")); //Да, можно было накинуть хедр, боттом и всё прогонять через 1 шаблон.. Но тут решил сделать так)
        }else{
            return redirect('/');
        }
    }

    public function post(Request $request){
        $paste = new Paste;
        $title = $request->title;
        if($title == null){
            $title = "Неизвестно";
        }
        $paste->title = $title;
        $code = $request->code;
        if($code == null){
            $code = "";
        }
        $paste->code = $code;
        $paste->syntax = $request->syntax;
        $paste->exposure = $request->exposure;
        $paste->expiration = $request->expiration;
        $paste->link = str_replace("/", "", substr(Hash::make($title), 7, 10));
        $paste->save();
        return $paste;
    }
}
