@extends('backend.layouts.master')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Category-Edit Form
                <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::model($data['row'], ['route' => [$route.'update', $data['row']->id ]]) !!}
        {!! Form::hidden('_method', 'PUT') !!}
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('name', 'Name',['class' => 'col-sm-2 col-form-label']); !!}

                <div class="col-sm-10">
                    {!! Form::text('name',null, ['oninput'=>'makeSlug()', 'class'=>'form-control', 'placeholder'=>'Enter name']); !!}
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class="form-group row">
                {!! Form::label('slug', 'Slug',['class' => 'col-sm-2 col-form-label']); !!}

                <div class="col-sm-10">
                    {!! Form::text('slug',null, [ 'class'=>'form-control','readonly'] ); !!}
                    {{--                    <input type="text"  name="slug" id="slug" class="form-control" readonly>--}}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('created_by', 'Created_by',['class' => 'col-sm-2 col-form-label']); !!}

                <div class="col-sm-10">
                    {!! Form::text('created_by',$data['row']->User->name, [ 'class'=>'form-control','readonly'] ); !!}
                    {!! Form::hidden('created_by',null, [ 'class'=>'form-control','readonly'] ); !!}

                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('status', 'Status',['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                        {!! Form::radio('status', '1'); !!}Active
                        {!! Form::radio('status','0'); !!}De-Active

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
