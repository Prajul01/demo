@extends('backend.layouts.master')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Projects</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            S.N
                        </th>
                        <th style="width: 20%">
                             Name
                        </th>
                        <th style="width: 30%">
                            Email
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['rows'] as $i=>$row)
                    <tr>
                        <td>
                            {{$i+1}}
                        </td>
                        <td>
                            {{$row->name}}
                        </td>
                        <td>
                            {{$row->email}}
                        </td>

                        <td>
                            <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Admin" data-off="User" {{ $row->is_admin ? 'checked' : '' }}>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
@endsection
@section('jss')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var is_admin = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/backend/changeUserStatus',
                    data: {'is_admin': is_admin, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
@section('csss')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection



