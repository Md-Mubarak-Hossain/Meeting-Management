@extends('admin.master')

@section('pagetitle')
Meeting Manage

@endsection

@section('content-heading')
Meeting Manage
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>

@endsection

@section('maincontent')
 
<?php

$i=0;
?>
                      <div class="panel-body">

                        Total Item:{{$meetings->total()}}<br>
                        Item Per Page:{{$meetings->perPage()}}<br>
                        Item On This Page:{{$meetings->count()}}<br>
                        Page No:{{$meetings->currentPage()}}<br>
                        Item From:{{$meetings->firstItem()}}To{{$meetings->lastItem()}}

                        <hr>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Name</th>
                                        <!-- <th>User Name</th>-->
                                        <th>Category Name</th>
                                      <!--   <th>pic</th> -->
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($meetings as $key => $meeting)
                                <tr>
                                    <?php echo $meeting ?>
                                	<td>{{ $i ++}}</td>
                                   <td>{{$meeting->categoryName}}</td>
                                   <td>{{$meeting->name}}</td>
                                   <td>{{($meeting->publicationStatus==1)?'published':'unpublished'}}</td>
                                   <td><a href="{{ url('/meeting/view/'.$meeting->id)}}" target="_blank ">view</a> |<a href="{{url('/meeting/edit/'.$meeting->id)}}" target="_blank" > edit</a>|<a href="{{'/meeting/delete/'.$meeting->id}}" onclick="return confirm('Are you want to delete?')"> delete</a>|</td>



                                </tr>
                                 @endforeach
                                    </tbody>
                                    
                                </table>
                                {{$meetings->links()}}
                          
                            </div>
@endsection