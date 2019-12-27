@extends('layouts.frame')

@section('BlockTitle','Absent/Present | Edit Exist Data')

@section('content')
    <a href="{{ route('panel.absentpresent.index') }}">[X]&nbsp;Cancel</a>
    <hr/>
    <form action="{{route('panel.absentpresent.update',[$item->id])}}" method="post">
        @csrf
        @method('PUT')

        <b>Student Full Name: </b><br>
        <select name="student_id">
            @foreach($students as $opt)
                <option value="{{$opt->id}}" @if($opt->id == $item->student->id) selected="selected" @endif >{{ $opt->fullname }}</option>
            @endforeach
        </select>
        <br/>
        <span>Date</span>&nbsp;<input type="date" name="checkdate" value="{{old('checkdate',$item->checkdate->format('Y-m-d'))}}" /><br>
        <span>Present</span>&nbsp;<input type="checkbox" name="present" @if($item->present) checked @endif value="1"/><br>

        <input type="submit" value="Update Data"/>
    </form>
@endsection

