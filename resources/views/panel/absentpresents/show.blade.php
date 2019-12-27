@extends('layouts.frame')

@section('BlockTitle','Absent/Present | Show Details')

@section('content')
    <a href="{{ route('panel.absentpresent.index') }}">[<]&nbsp;Back</a>
    <hr/>

    <b>Student Full Name: </b>{{ $item->student->fullname }}<br>
    <b>Check Date: </b>{{ $item->checkdate->format('Y-m-d') }}<br>
    <b>Absent or Present: </b>{{ $item->present? "Present" : "Absent" }}<br>

@endsection

