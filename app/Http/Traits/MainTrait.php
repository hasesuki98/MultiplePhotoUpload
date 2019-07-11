<?php
namespace App\Http\Traits;
use Session,Auth,View,Carbon\Carbon,File;

trait MainTrait{

public function one_file_upload(array $array,$request,$data){
		if ($request->hasFile( $array['file'] )) {
			if($array['update']=="yes"){
				File::delete(public_path($array['path'].$array['old_file']));
			}
			$request->file($array['file'])->move(public_path($array['path']),$array['name'] . '.' .$request->file($array['file'])->getClientOriginalExtension());  
			$data[$array['file']]=$array['name']. '.' .$request->file($array['file'])->getClientOriginalExtension();
		}
		if(!$request->hasFile( $array['file']) && $array['old_file']!==null ){
			$data[$array['file']]=$array['old_file'];
		}

	}
}