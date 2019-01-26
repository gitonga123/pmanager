<?php

namespace pmanager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use pmanager\Role;

class LearnController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function learn()
    {
    	$user = [
    		"isPaid" => false
    	];
    	$roles = Role::all();
    	$title = "Mrs.";
    	return view('learn.learn', compact(['roles', 'user', 'title']));
    } 
}
