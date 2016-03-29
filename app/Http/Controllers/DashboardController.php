<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\ProjectRepository;

class DashboardController extends Controller
{
    public function __construct(UserRepository $users, CompanyRepository $companies, ProjectRepository $projects){
    	$this->users = $users;
    	$this->companies = $companies;
    	$this->projects = $projects;
    	$this->middleware('auth');
    }

    public function index(Request $request){
    	$data = array();
    	if($request->user()->isAdmin()){
    		return view('home', ['users' => $this->users->countAll(), 'companies' => $this->companies->countAll(), 'projects' => $this->projects->countAll()]);
    	}else{
    		return view('home');
    	}
    }
}
