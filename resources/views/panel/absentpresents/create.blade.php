@extends('layouts.frame')

@section('BlockTitle','Absent/Present | Create New Data')

@section('content')
    <a href="{{ route('panel.absentpresent.index') }}">[X]&nbsp;Cancel</a>
    <hr/>
    <form action="{{route('panel.absentpresent.store')}}" method="post">
        @csrf

        <b>Student Full Name: </b><br>
        <select name="student_id">
            @foreach($students as $opt)
                <option value="{{$opt->id}}">{{ $opt->fullname }}</option>
            @endforeach
        </select>
        <br/>
        <span>Date</span>&nbsp;<input type="date" name="checkdate"/><br>
        <span>Present</span>&nbsp;<input type="checkbox" name="present" value="1"/><br>

        <input type="submit" value="Create Data"/>
    </form>

@endsection

