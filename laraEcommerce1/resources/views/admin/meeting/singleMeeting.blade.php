@extends('admin.master')

@section('pagetitle')
Single Meeting

@endsection

@section('content-heading')
Meeting Details

@endsection

@section('maincontent')
<img src="{{asset($meeting->pic)}}"width="300"><br><hr>
Name:{{$meeting->meetingName}}<br>
Category Name:{{$meeting->catName}}<br>
<p>
	<h4>Short Description</h4>{{$meeting->shortDescription}}</p>

	<p>
	<h4>Long Description</h4>{{$meeting->longDescription}}</p>

	Publication Status:{{($meeting->publicationStatus==1)?'published':'unpublished'}}

@endsection