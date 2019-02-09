@extends('admin.index')
@section('content')
@push('js')
<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep($product->parent,$product->id) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : false
    },
    "plugins" : [ "wholerow" ]
  });

});

 $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.parent_id').val(r.join(', '));
});

</script>
@endpush

    <div id="product_setting" class="tab-pane fade">     

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {!! Form::open(['url'=>aurl('products'),'files'=>true]) !!}




        
        <div class="form-group">
            {!! Form::label('product_name_ar',trans('admin.product_name_ar')) !!}
            {!! Form::text('product_name_ar',old('product_name_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('product_name_en',trans('admin.product_name_en')) !!}
            {!! Form::text('product_name_en',old('product_name_en'),['class'=>'form-control']) !!}
        </div>

  <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
        <div class="clearfix"></div>
        <div class="form-group">
 <div class="form-group">
            {!! Form::label('desc_ar',trans('admin.desc_ar')) !!}
            {!! Form::textarea('desc_ar',old('desc_ar'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('desc_en',trans('admin.desc_en')) !!}
            {!! Form::textarea('desc_en',old('desc_en'),['class'=>'form-control']) !!}
        </div>


 <div class="form-group">
            {!! Form::label('price',trans('admin.price')) !!}
            {!! Form::text('price',old('price'),['class'=>'form-control']) !!}
        </div>
 
  
        {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
   </div>  <!-- /#product_setting" -->  
@endsection