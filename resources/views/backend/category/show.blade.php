@extends('backend.layouts.master')
@section('content')
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0">Dashboard </h1>--}}
{{--                    <a href="{{ URL::previous() }}" class="btn btn-dark">Go Back</a>--}}

{{--                </div><!-- /.col -->--}}
{{--      --}}
{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
    <div class="col-xs-7 col-sm-6 col-lg-10">
        <table class="table table-bordered">
            <a href="{{ URL::previous() }}" class="btn btn-dark">Go Back</a>
            <tr>
                <th>Name</th>
                <td>{{$data['row']->name}}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{$data['row']->slug}}</td>
            </tr>
            <tr>
                <th>Created By</th>
                <td>{{$data['row']->User->name}}</td>
            </tr>
            <tr>
                @if($data['row']->updated_by== Null)


                @else
                    <th>Updated By</th>
                    <td>{{$data['row']->UpdateUser->name}}</td>
                @endif
            </tr>
            <tr>
                <th>Status</th>
                <td>@if($data['row']->status==1)
                        <a class="text-green">Active</a>
                    @else
                        <a class="text-red">Deactive</a>
                    @endif
                </td>
            </tr>
        </table>
    </div>

@endsection
