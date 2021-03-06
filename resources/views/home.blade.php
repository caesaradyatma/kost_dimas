@extends('layouts.app')
@include('includes.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Guests</div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <a href="/guests" class="btn btn-primary">List of Guests</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/guests/get_room" class="btn btn-primary">Add Guest</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Create Reports</div>

                <div class="panel-body">
                    <ul>
                        <li style="margin-top:2%;"><a href="/invoice" class="btn btn-primary">Create Invoice</a></li>
                        <li style="margin-top:2%;"><a href="/attendance/report" class="btn btn-primary">Create Laporan Bulanan</a></li>
                        <li style="margin-top:2%;"><a href="/receipt" class="btn btn-primary">Create Receipt</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Locations</div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <a href="/locations" class="btn btn-primary">List of Locations</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/locations/create" class="btn btn-primary">Add new Location</a>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                        View Guests 
                        <ul>
                            @foreach($locations as $location)
                                <li><a href="/locations/{{$location->id}}" >{{$location->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Attendance</div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <a href="/attendance" class="btn btn-primary">Todays Attendance</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/attendance/record" class="btn btn-primary">Attendance Records</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
