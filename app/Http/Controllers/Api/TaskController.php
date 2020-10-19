<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    function index(){
        return Task::select('id','title','description','status')->get();
    }

    function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=>'required|string',
            'description'=>'required|string',
            'tags'=>'required'
        ]);
        if( $validator->fails() ){
            return response([
                'status'=>'error',
                'message'=>$validator->errors()
            ],200);
        }

        $task = Task::create($request->only(['title','description']));
        if(!$task){
            return response([
                'status'=>'error',
                'message'=>'The Task was not created !'
            ],200);
        }

        $task->tags()->sync($request->tags);

        return response([
            'status'=>'success',
            'message'=>'The task has been created !'
        ],200);
    }
}
