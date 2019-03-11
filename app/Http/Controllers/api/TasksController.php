<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Validtor;
class TasksController extends Controller
{

    public function show(){

        $tasks = Task::all();
    	return response()->json($tasks);
    }

    public function showid(Task $task){

        //$tasks = Task::all();
    	return response()->json($task);
    }
    public function store(Request $request){

    	$val = validtor()->make($request->all(),['title'=>'required','description'=>'required']);
    	if($val->fails()){
    		return response()->json($val->errors());
    	}
    	$tasks = Task::create($request->all());
    	if($tasks){
    		
    		return response()->json($tasks);
    	}

    }


}
