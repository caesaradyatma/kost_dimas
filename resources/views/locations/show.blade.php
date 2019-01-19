@extends('layouts.app')
@include('includes.navbar')

@section('content')
    <a href="/locations" class="btn btn-primary">Back to List of Locations</a>
    <h1>{{$location->name}} Guests</h1>
        <table style="margin-bottom:20px;">
            <tr>
                <td>
                    <input type="text" name="searchGuest" class="form-control">
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Search</button>
                </td>
            </tr>
        </table>
        <table class="table table-striped" id="guest-table">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>ID Card</th>
                <th>Entry Date</th>
                <th>Room Number</th>
                
            </tr>
            <?php 
                $counter = ($guests->currentpage()-1)* $guests->perpage() + 1;
            ?>
            @foreach($guests as $guest)
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$guest->name}}</td>
                    <td><img src="../../../<?php echo $guest->id_path; ?>" style="height:200px;width:300px;"></td>
                    <td>{{$guest->entry_date}}</td>
                    <td>{{$guest->room_number}}</td>
                </tr>
                <?php 
                    $counter++;
                ?>
            @endforeach
        </table>
        <center>
        {{$guests->links()}};
        </center>
    
    {{--  <div class="col-sm-6">
        
        <a href="{{ route('guests.edit', $guest) }}" class="btn btn-warning">Edit</a>
    
    </div>
    <div class="col-sm-6">
            {!!Form::open(['action'=>['GuestsController@destroy',$guest->id],'method'=>'DELETE','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete Data',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
    </div>  --}}
@endsection