<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use File;
class PhotoController extends Controller
{
    //
    public function index(){
    	$photos=Photo::all();
    	return view('index',compact('photos'));
    }
   public function imageRemove($data){
   File::delete(public_path('photo/' .$data));
   Photo::where('photo',$data)->delete();
   echo "delete";
   }
   public function imageAllRemove(){
    $photos=Photo::all();
    foreach ($photos as $key => $value) {
      # code...
      File::delete(public_path('photo/' .$value->photo ));
   Photo::where('photo',$value->photo )->delete();
   echo "data delete";

    }

   }
   public function imageDelete(Request $request){
    try{
    File::delete(public_path('photo/'. $request->data) );
    Photo::where('photo',$request->data )->delete();
  echo json_encode("delete");
}catch(\Exception $e){
  echo json_encode("error");

}

   }
    public function imageUpload(Request $request){
    	$imageName =  $request->file('file')->getClientOriginalName();
    Photo::create([ 'photo' => $imageName ]);
        request()->file->move(public_path('photo'), $imageName);

        return response()->json(['uploaded' => '/photo/'.$imageName]);

    }
}
