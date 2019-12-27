@extends('layouts.frame')

@section('content')
    <b>Students : </b> {{\App\Student::count()}}<br>
@endsection

