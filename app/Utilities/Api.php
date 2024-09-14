<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Api{

    public static function call($url){

        try {
            $reponse = Http::withHeaders([
                'Accept' => 'application/vnd.github+json',
                'Authorization' => 'Bearer '.auth()->user()->github_token,
                'X-GitHub-Api-Version' => '2022-11-28',
            ])->get($url);
        
            // response status cehck
            if($reponse->status() == 200){
                // if successful response
                $reponse = json_decode($reponse, true);
                return $reponse;
            }elseif($reponse->status() == 401){
                // if unauthenticated
                Auth::logout();
                return redirect()->route('login');
            }else{
                // if another response code
                return redirect()->route('error', [$reponse->status()]);
            }
            // data conveted to readable array
            

        } catch (\Throwable $e) {
            $e->getMessage();
        }
        
    }
}