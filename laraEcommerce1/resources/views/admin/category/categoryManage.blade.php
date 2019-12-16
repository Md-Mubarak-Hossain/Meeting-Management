@extends('admin.master')

@section('pagetitle')
Admin: Category manage
@endsection

@section('content-heading')
Category control Area
<br>
{{Session::get('message')}}
<hr>
Total Item In This Page:{{$category->count()}}<br>
Total Item:{{$category->total()}}<br>
Page No:{{$category->currentPage()}}<br>


@endsection

@section('maincontent')

                       <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$i=0;

                                	?>
                                	@foreach($category as $singleCategory)
                                    <tr class="odd gradeX">
                                        <td>{{ ++$i}}</td>
                                        <td>{{$singleCategory->categoryName}}</td>
                                        <td>{{$singleCategory->shortDescription}}</td>
                                        <td class="center">{{($singleCategory->publicationStatus==1)?'published':'Unpublished'}}</td>
                                        <td class="center"> <a href="{{url('/category/edit/'.$singleCategory->id)}}">Edit</a> | <a href="{{url('/category/delete/'.$singleCategory->id)}}">
                                        Delete</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $category->links()}}
                            </div>

@endsection