@extends('admin.master')

@section('pagetitle')
Category Entry
@endsection

@section('content-heading')
Category Entry
<br>
{{Session::get('message')}}
@endsection

@section('maincontent')
<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    	{!!Form::open(['url'=>'/category/save','method'=>'post','role'=>'form'])!!}
                                        <div class="form-group">
                                            <label>Meeting Name</label>
                                            <input class="form-control" name="name">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Meeting Description</label>
                                            <textarea class="form-control" name="shortDescription" placeholder="Enter Short Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Publication Status</label>
                                            <select name= "publicationStatus"class="form-control">
                                            	<option value='1'>published</option>
                                            	<option value='0'>unpublished</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="Submit" class="btn btn-block btn-primary">
                                        </div>

                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>
                            @endsection
