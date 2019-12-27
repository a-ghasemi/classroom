@extends('layouts.frame')

@section('BlockTitle','Students | Show Student Details')

@section('content')
    <a href="{{ route('panel.student.index') }}">[<]&nbsp;Back</a>
    <hr/>

    <b>Full Name: </b>{{ $item->fullname }}<br>
@endsection

