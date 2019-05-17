<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ProcessVideoInterface;

class ApiController extends Controller
{

    protected $videoProcessor;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProcessVideoInterface $videoProcessor)
    {
        $this->videoProcessor=$videoProcessor;
    }
    public function testApi(Request $request)
    {
        $id3 = new \getID3;
        return $request->all();
        // dd($request->all());
    }
    public function testPostApi(Request $request)
    {
         $test=$this->videoProcessor->getVideoDetails($request);
         return $test;
         //response()->json(['data'=>$test]);
   //      $id3 = new \getID3;
   //      if ($request->hasFile('File')) {
   //          $video = $request->file('File');
   //          $name = time().'.'.$video->getClientOriginalExtension();
   //          $destinationPath = storage_path('/app/videos');
   //          $video->move($destinationPath, $name);

   //          // return $destinationPath;
   //     return response()->json(['data'=>"video is uploaded"]);
   // }
    }

    
    //
}
