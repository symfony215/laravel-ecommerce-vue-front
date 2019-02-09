@extends('admin.index')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>
@endpush 


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('products'),'files'=>true]) !!}
 
<hr>

 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#product_info"> {{ trans('admin.product_info') }}  <i class="fa fa-info"></i></a></li>
  <li><a data-toggle="tab" href="#department">          {{ trans('admin.department') }}    <i class="fa fa-list"></i>    </a></li>
    <li><a data-toggle="tab" href="#product_setting">    {{ trans('admin.product_setting') }}  <i class="fa fa-cog fa-spin"></i></a></li>

  <li><a data-toggle="tab" href="#product_media">       {{ trans('admin.product_media') }}  <i class="fa fa-photo"></i></a></li>
  <li><a data-toggle="tab" href="#product_size_weight"> {{ trans('admin.product_size_weight') }} <i class="fa fa-info-circle "></i></a></li>
  <li><a data-toggle="tab" href="#product_other_data">  {{ trans('admin.product_other_data') }} <i class="fa fa-database"></i></a></li>
 </ul>

<div class="tab-content">
 <div id="product_info" class="tab-pane fade in active">
    <h3>Planes1</h3>
    <p>{{ trans('admin.product_info') }}</p>
  </div>
 @include('admin.products.tabs.product_info')
@include('admin.products.tabs.product_setting')
@include('admin.products.tabs.department')
@include('admin.products.tabs.product_media')
@include('admin.products.tabs.product_size_weight')
@include('admin.products.tabs.product_other_data')
  
</div>
<hr>
 
         {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}

 
 
     {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
