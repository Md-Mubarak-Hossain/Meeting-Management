@extends('admin.master')

@section('pagetitle')
Admin: category Edit

@endsection

@section('content-heading')
 Category Edit

@endsection

@section('maincontent')
<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    	{!!Form::open(['url'=>'/category/edit','method'=>'post','name'=>'editForm','role'=>'form'])!!}
                                        <div class="form-group">
                                            <label>Meeting Name</label>
                                            <input class="form-control" name="name" value="{{$category->categoryName}}">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Meeting Description</label>
                                            <textarea class="form-control" name="shortDescription" placeholder="Enter Short Description">{{$category->shortDescription}}

                                           </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Publication Status</label>
                                            <select name= "publicationStatus"class="form-control">
                                            	<option value='1'>published</option>
                                            	<option value='0'>unpublished</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="categoryId" value='{{$category->id}}'>
                                        <div class="form-group">
                                            <input type="submit" name="Submit" class="btn btn-block btn-primary">
                                        </div>

                                        {!!Form::close()!!}
                                    </div>
                                    <script type="text/javascript">
                                    	document.forms['editForm'].elements['publicationStatus'].value="{{$category->publicationStatus}}"
                                    </script>
                                </div>
                            </div>

@endsection