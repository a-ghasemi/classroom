@extends('layouts.frame')

@section('BlockTitle','Students | Edit Exist Student')

@section('content')
    <a href="{{ route('panel.student.index') }}">[X]&nbsp;Cancel</a>
    <hr/>
    <form action="{{route('panel.student.update',[$item->id])}}" method="post">
        @csrf
        @method('PUT')

        <b>Username: </b><br>
        <input type="text" name="fullname" value="{{old('fullname',$item->fullname)}}" /><br>

        <input type="submit" value="Update Student Data"/>
    </form>
@endsection

