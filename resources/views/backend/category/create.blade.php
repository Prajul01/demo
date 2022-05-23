@extends('backend.layouts.master')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Category-Create Form
            <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::open(['route' => $route .'store' , 'method' => 'post' , 'class' => 'form-horizontal']) !!}
        <div class="card-body">
        <div class="form-group row">
                 {!! Form::label('name', 'Name',['class' => 'col-sm-2 col-form-label']); !!}

            <div class="col-sm-10">
                {!! Form::text('name', '', ['oninput'=>'makeSlug()', 'class'=>'form-control', 'placeholder'=>'Enter name']); !!}
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

        </div>
            <div class="form-group row">
                {!! Form::label('slug', 'Slug',['class' => 'col-sm-2 col-form-label']); !!}

                <div class="col-sm-10">
                    {!! Form::text('slug','', [ 'class'=>'form-control','readonly'] ); !!}
{{--                    <input type="text"  name="slug" id="slug" class="form-control" readonly>--}}
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit('Submit', ['class'=>'btn btn-info']); !!}
            {!! Form::reset('Cancel', ['class'=>'btn btn-default float-right']); !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
@section('csss')
    <style>
        .card-header {
            background-color:#007bff;
        }
        .btn btn-info {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: none;
        }


    </style>


@endsection
@section('jss')
    <script>

        function makeSlug() {
            var name = document.getElementById('name').value;
            var slug = document.getElementById('slug');
            slug.value = string_to_slug(name);
        }
        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/\?/g, '-')
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        };

    </script>
@endsection
