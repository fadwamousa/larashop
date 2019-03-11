<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Article;
use Validator;
class ShopController extends Controller
{

	private function apiResponse($status,$messsage,$data=null){

		$responses = ['status'=>$status,
		              'messsage'=>$messsage,
		              'data'=>$data];

		return response()->json($responses);              

	}

    public function showPro(){


    	$products = Product::all();
    	
    	return $this->apiResponse(1,'good',$products);


    }

    public function showProid($id){
    	$product = Product::find($id);
    	return $this->apiResponse(1,'good',$product);
    }

    public function showArticle(){

        $articles = Article::paginate(4);
        //$articles = Article::all();
        return $this->apiResponse(1,'good',$articles);
    }

    public function showArticleid($id){

        $article = Article::find($id);
        return $this->apiResponse(1,'good',$article);
    }

    public function storeArticle(Request $request){

        //validate the data
        $val = validator()->make($request->all(),
            ['title'=>'required','body'=>'required']
        );

        if($val->fails()){
            return $this->apiResponse(0,'bad',$val->errors());
        }

        $artc = Article::create([
            'title'=>$request->title,
            'body'=>$request->body]);

        if($artc){
            return $this->apiResponse(1,'good',$artc);
        }



    }

    public function update(Request $request,$id){

       $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;


    }
     public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
