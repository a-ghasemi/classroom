@extends('layouts.frame')

@section('BlockTitle','Absent/Present | List')

@section('content')
    <a href="{{ route('panel.absentpresent.create') }}">[+]&nbsp;Create New Data</a>
    <hr/>

    @if($items->count())
        <table class="table">
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Date</th>
                <th>Present</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        {{ $item->student->fullname }} ( {{$item->student->id}} )
                    </td>
                    <td>
                        {{ $item->checkdate->format('Y-m-d') }}
                    </td>
                    <td>
                        {{ $item->present ? "Present" : "Absent" }}
                    </td>
                    <td>
                        <a href="{{route('panel.absentpresent.show',[ $item ])}}">Show</a>
                        &nbsp;|&nbsp;
                        <a href="{{route('panel.absentpresent.edit',[ $item ])}}">Edit</a>
                        &nbsp;|&nbsp;
                        <form action="{{route('panel.absentpresent.destroy',[ $item ])}}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                            <a href="javascript:;" onclick="if(confirm('Are you sure to delete data \'{{$item->student->fullname}}\'@\'{{$item->checkdate->format('Y-m-d')}}\' ?')) $(this).closest('form').submit()">Delete</a>
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

