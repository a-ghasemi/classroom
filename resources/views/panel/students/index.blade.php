@extends('layouts.frame')

@section('BlockTitle','Students | List')

@section('content')
    <a href="{{ route('panel.student.create') }}">[+]&nbsp;Create New Student</a>
    <hr/>

    @if($items->count())
        <table class="table">
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->fullname }}
                    </td>
                    <td>
                        <a href="{{route('panel.student.show',[ $item->id ])}}">Show</a>
                        &nbsp;|&nbsp;
                        <a href="{{route('panel.student.edit',[ $item->id ])}}">Edit</a>
                        &nbsp;|&nbsp;
                        <form action="{{route('panel.student.destroy',[$item->id])}}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                            <a href="javascript:;" onclick="if(confirm('Are you sure to delete student \'{{$item->fullname}}\' ?')) $(this).closest('form').submit()">Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $items->links() }}
    @else
        <i>Nothing to show</i>
    @endif

@endsection

