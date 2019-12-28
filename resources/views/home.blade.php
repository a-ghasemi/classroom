@extends('layouts.frame')

@section('content')
    <b>Administration API Token : </b> {{\App\User::find(1)->api_token}}<br>
    <b>Students : </b> {{\App\Student::count()}}<br>
@endsection

