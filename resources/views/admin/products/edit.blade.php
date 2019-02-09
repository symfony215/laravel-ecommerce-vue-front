
       @extends('admin.index')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@push('js')

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>

 </script>


<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep($product->department_id) !!},
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
    $('.department_id_id').val(r.join(', '));
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
      <li><a data-toggle="tab" href="#product_setting">    {{ trans('admin.product_setting') }}  <i class="fa fa-cog fa-spin"></i></a></li>

  <li><a data-toggle="tab" href="#product_media">       {{ trans('admin.product_media') }}  <i class="fa fa-photo"></i></a></li>
  
   <!-- <li><a data-toggle="tab" href="#product_other_data">  {{ trans('admin.product_other_data') }} <i class="fa fa-database"></i></a></li>-->
 </ul>

<div class="tab-content">
 <div id="product_info" class="tab-pane fade in active">
    <h3>Planes1</h3>
    <p>{{ trans('admin.product_info') }}</p>
  </div>

 @include('admin.products.tabs.product_setting')
    @include('admin.products.tabs.product_media')

</div>
<hr>
 

 
     {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
        
     </div>
    <!-- /.box-body -->
</div>
 

@endsection