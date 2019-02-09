@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('admin'), 'files' => true ])  !!}
     <div class="form-group">
        {!! Form::label('name',trans('admin.name')) !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password',trans('admin.password')) !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>

 
     <div class="form-group">
        {!! Form::label('icon',trans('admin.admin')) !!}
        {!! Form::file('icon',['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
       <img name="icon" class="image" src="{{ asset( 'No_Image/img-member-defult.png
')}} "   > 
     </div>
   
     {!! Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
 
@endsection