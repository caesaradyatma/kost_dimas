{{-- ATTENDANCE RECORD --}}
@extends('layouts.app')
@include('includes.navbar')
@section('content')
    <h1>{{$room_location}} Attendance on  {{$atd_date}}</h1> 
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Room Number</th>
                <th>ID</th>
                <th>Clock In Time</th>
                <th style="display:none;">Entry Date</th>
                <th>Stay Duration</th>
                <th style="display:none;">Exit Date</th>
            </tr>
            @if(count($attendances) < 1)
                <a href="/attendance">No Attendance are made yet</a>
            @else
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{$attendance->guest->name}}</td>
                    <td>{{$attendance->location->name}}</td>
                    <td>{{$attendance->guest->room_number}}</td>
                    <td><img src="../../../<?php echo $attendance->guest->id_path; ?>" style="height:200px;width:300px;"></td>
                    <td>{{$attendance->updated_at}}</td>
                    <td style="display:none;">{{$attendance->guest->entry_date}}</td>
                    <td>
                        <?php
                            //logic 1
                            if($attendance->guest->entry_date == NULL){
                                echo "Entry Date is Not Set";
                            }
                            else if($attendance->guest->exit_date == NULL){
                                $date2 = date_create($atd_date);
                                $date1 = date_create($attendance->guest->entry_date); 
                                $days_left = $date2->diff($date1);
                                $int = $days_left->days;
                                echo $int." days";    
                            }
                            else{
                                $date2 = date_create($attendance->guest->exit_date);
                                $date1 = date_create($attendance->guest->entry_date); 
                                $days_left = $date2->diff($date1);
                                $int = $days_left->days;
                                echo $int." days";
                            }
                            
                        ?>
                    </td>
                    <td style="display:none;">{{$attendance->guest->exit_date}}</td>
                </tr>
                @endforeach
            @endif
        </table>
@endsection