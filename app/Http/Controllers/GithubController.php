<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Utilities\Api;
use Illuminate\Support\Facades\Cache;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /***
     * for dashboard
     * showing for user and limited repos 
    ***/
    public function dashboard(Request $request){

        // receive active page value from the url
        $active_page = 1;
        $per_page = 8;
        $public_repos = 0;

        if($request->get('page') != null){
            $active_page = $request->get('page');
        }

        // fetch github user data
        $user_url = 'https://api.github.com/user';

        // Cache expiry check
        if(Cache::has('gitUser')){
            // get cache data
            $githubUser = Cache::get('gitUser');
        }else{
            // cache expired and set user to cache
            $githubUser = Api::call($user_url);
            Cache::put('gitUser', $githubUser, 3600);
        }
        

        // fetch repos based on query exist or null
        if($request->get('query') == null){

            // no query data
            // fetch limited repos from github
            $url = 'https://api.github.com/user/repos?sort=update&direction=desc&per_page='.$per_page.'&page='.$active_page;
            $repos = Api::call($url);

            // redefile repos
            $public_repos = $githubUser['public_repos'];

        }else{

            // when search query exist
            // fetch matched repos from github
            $url = 'https://api.github.com/search/repositories?q='.$request->get('query').' in:name user:'.$githubUser['login'].'&per_page='.$per_page.'&page='.$active_page;
            $repos = Api::call($url);

            // redefile repos
            $public_repos = $repos['total_count'];
            
            // get item from search results
            $repos = $repos['items'];
        }

        // total page count calculation
        
        $page_count = ceil($public_repos / $per_page);

        return view('dashboard', ['user' => $githubUser, 'repos' => $repos, 'active_page' => $active_page, 'page_count' => $page_count, 'total_repos' => $public_repos, 'per_page' => $per_page, 'query' => $request->get('query')]);
    }


    /***
     * for error showing
    ***/
    public function error($status){
        return view('error', ['status' => $status]);
    }
    
}
