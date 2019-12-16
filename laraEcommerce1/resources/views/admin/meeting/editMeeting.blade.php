@extends('admin.master')

@section('pagetitle')
Meeting Edit

@endsection

@section('content-heading')

Edit The Meeting
@endsection

@section('maincontent')
<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    	{!! Form::open(['url'=>'/meeting/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'meetingEditForm'])!!}
                                        <div class="form-group">
                                            <label>Meeting Name</label>
                                            <input type="text" class="form-control" value="{{$meeting->meetingName}}" name="name">
                                            
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
                                            <textarea class="form-control" name="shortDescription" placeholder="Enter Short Description">{{$meeting->shortDescription}}</textarea>
                                        </div>

                                         <div class="form-group">
                                            <label>Meeting Long Description</label>
                                            <textarea class="form-control" name="longDescription" placeholder="Enter Long Description">{{$meeting->longDescription}}</textarea>
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

                                            <input type="hidden" name="meeting_id" value="{{$meeting->id}}">


                                        <div class="form-group">
                                            <input type="submit" name="Submit" class="btn btn-block btn-primary">
                                        </div>

                                        {!! Form::close()!!}
                                    </div>

                                    <script type="text/javascript">
                                    	document.forms['meetingEditForm'].elements['categoryId'].value="{{$meeting->categoryId}}";


                                    	document.forms['meetingEditForm'].elements['publicationStatus'].value="{{$meeting->publicationStatus}}";
                                    </script>
                                </div>
                            </div>

@endsection