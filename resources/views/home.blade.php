@extends('layouts.frame')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <b>Students : </b> {{\App\Student::count()}}<br>
            </div>
        </div>
    </div>
@endsection

