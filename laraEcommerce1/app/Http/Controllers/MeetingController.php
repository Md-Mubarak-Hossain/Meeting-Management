<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Meeting;
use App\User;
use DB;

class MeetingController extends Controller
{
    public function index(){

    	$categories=Category::where('publicationStatus',1)->get();;
       
        $users=User::all();
    	return view('admin.meeting.meetingEntry',['categories'=>$categories,'users'=>$users]);
    }

    public function yes(Request $request){
       

   $meeting=new Meeting();

    $meeting->meetingName=$request->name;
    $meeting->categoryId=$request->categoryId;
    $meeting->userId=auth()->user()->id;
    $meeting->shortDescription=$request->shortDescription;
    $meeting->longDescription=$request->longDescription;
    $meeting->pic='Picture';
    $meeting->publicationStatus=$request->publicationStatus;

    $meeting->save();
    $lastId=$meeting->id;
    $pictureInfo=$request->file('pic');

    $picName= $lastId.$pictureInfo->getClientOriginalName();
    $folder="meetingImage/";
    $pictureInfo->move($folder,$picName);

    $picUrl=$folder.$picName;
    $meetingPic=Meeting::find($lastId);
    $meetingPic->pic=$picUrl;
    $meetingPic->save();

    return redirect('/meeting/entry')->with('message','Meeting Insert Successfully.');

}

public function manage(){

$meetings=DB::table('meetings')
->join('categories','categories.id','=','categoryId')
->join('users','users.id','=','userId')
->select('meetings.*','categories.categoryName')
->select('meetings.*','users.name')->OrderBy('meetings.id','asc')->paginate(7);

//->OrderBy('meetings.id','asc')


// $meetings=DB::table('meetings')
//  ->join('users','users.id','=','userId')
//  ->select('meetings.*','users.name as userName')
// ->OrderBy('meetings.id','asc')->paginate(7);


    return view('admin.meeting.meetingManage',['meetings'=>$meetings]);
    

}
 public function singleMeeting($id){

    $meetingById=DB::table('meetings')
                ->join('categories','categories.id','=','categoryId')
                ->select('meetings.*','categories.categoryName as catName')
                ->where('meetings.id',$id)
                ->first();

                return view('admin.meeting.singleMeeting',['meeting'=>$meetingById]);

 }

 public function editMeeting($id){

      $meeting=Meeting::where('id',$id)->first();
      $category=Category::where('publicationStatus',1)->get();
    return view('admin.meeting.editMeeting',['meeting'=>$meeting,'categories'=>$category]);

 }

 public function updateMeeting(Request $request){
    //dd($request->all());
   
    $meetingPic=Meeting::where('id',$request->meeting_id)->first();
    if($picInfo=$request->file('pic')){

    if(file_exists($meetingPic->pic)){
        unlink($meetingPic->pic);
    }
   

    $picName=$request->meeting_id.$picInfo->getClientOriginalName();
    $path="meetingImage/";
    $picUrl=$path.$picName;
    $picInfo->move($path,$picName);
 }
 else{
    $picUrl=$meetingPic->pic;
 }
 $meeting=Meeting::find($request->meeting_id);


 $meeting->meetingName=$request->name;
 $meeting->categoryId=$request->categoryId;
  $meeting->shortDescription=$request->shortDescription;
   $meeting->longDescription=$request->longDescription;
  $meeting->publicationStatus=$request->publicationStatus;
 $meeting->pic=$picUrl;
$meeting->save();
return redirect('/meeeting/manage')->with('message','Meeting Update Succesfully');

}

public function deleteMeeting($id){

    $meetingPic=Meeting::where('id',$id)->first();
    if(file_exists($meetingPic->pic)){
        unlink($meetingPic->pic);
    }


    $meetingDelete=Meeting::find($id);
    $meetingDelete->delete();

    return redirect('/meeeting/manage')->with('message','Meeting Delete Succesfully');


}



}
