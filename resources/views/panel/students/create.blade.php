@extends('layouts.frame')

@section('BlockTitle','Students | Create New Student')

@section('content')
    <a href="{{ route('panel.student.index') }}">[X]&nbsp;Cancel</a>
    <hr/>
    <form action="{{route('panel.student.store')}}" method="post">
        @csrf

        <b>Full Name: </b><br>
        <input type="text" name="fullname"/><br>
        <input type="submit" value="Create Student"/>
    </form>
@endsection

