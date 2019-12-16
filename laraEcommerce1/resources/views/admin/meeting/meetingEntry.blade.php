@extends('admin.master')
@section('pagetitle')
Admin Meeting Entry
@endsection


@section('content-heading')
 Meeting Entry
 <hr>
 <h4 style="color:green;">{{Session::get('message')}}</h4>

@endsection

@section('maincontent')

<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    	{!! Form::open(['url'=>'/meeting/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                        <div class="form-group">
                                            <label>Meeting Name</label>
                                            <input type="text" class="form-control" name="name">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name= "categoryId"class="form-control">
                                            	@foreach($categories as $category)
                                            	<option value='{{$category->id}}'>{{$category->categoryName}}
                                            	</option>
                                           @endforeach
                                            </select>
                                        </div>

                                      

                                        <div class="form-group">
                                            <label>Meeting Short Description</label>
                                            <textarea class="form-control" name="shortDescription" placeholder="Enter Short Description"></textarea>
                                        </div>

                                         <div class="form-group">
                                            <label>Meeting Long Description</label>
                                            <textarea class="form-control" name="longDescription" placeholder="Enter Long Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Pictures</label>
                                            <input type="file"  name="pic">
                                            
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

                                        {!! Form::close()!!}
                                    </div>
                                </div>
                            </div>
@endsection