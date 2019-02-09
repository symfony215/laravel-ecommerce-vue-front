@extends('admin.index')
@section('content')
@push('js')

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js">
    
</script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
          
           $('#dropzonefileupload').dropzone({
            url:"{{ aurl('upload/image/'.$product->id) }}",
            paramName:'file',
            uploadMultiple:false,
            maxFiles:15,
            maxFilessaze:2,
            acceptedFiles:'image/*',
            dictDefaultMessage:' اضغط هنا لرفع الملفات او قم بسحب الملفات وادرجه هنا ',
            dictRemoveFile:"{{ trans('admin.delete') }} ",
            params:{
                _token:'{{csrf_token() }}'


            },
                addRemoveLinks:true,
                removedfile:function(file)
                {
                    //alert(file.fid);
                    $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'{{ aurl('delete/image') }}',
                    data:{_token:'{{csrf_token() }}',id:file.fid}
 
                    });
                    var fmok;
    return (fmok = file.previewElement) !=null ? fmok .parentNode.removeChild(file.previewElement):void 0;
                },

            init:function(){
                @foreach($product->files()->get() as  $file)
                var mock={name:'{{ $file->file_type}}',fid:'{{ $file->id}}',size:'{{ $file->size}}',type:'{{ $file->mime_type}}'};
            this.emit('addedfile',mock);
            this.options.thumbnail.call(this,mock,'{{ url('storage/'.$file->full_file) }}') ;
                        @endforeach

  this.on('sending',function(file,xhr,formData){

    formData.append('fid','');
    file.fid = '';
  });
  this.on('success',function(file,response){
    file.fid = response.id;
                });
            }
         });


//-----------------------------------------------------------
           $('#mainphoto').dropzone({
            url:"{{ aurl('update/image/'.$product->id) }}",
            paramName:'file',
            uploadMultiple:false,
            maxFiles:1,
            maxFilessaze:3, //M B
            acceptedFiles:'image/*',
            dictDefaultMessage:' {{trans('admin.mainphoto')}}',
            dictRemoveFile:"{{ trans('admin.delete') }} ",
            params:{
                _token:'{{csrf_token() }}'


            },
                addRemoveLinks:true,
                removedfile:function(file)
                {
                    //alert(file.fid);
                    $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'{{ aurl('delete/product/image/'.$product->id) }}',
                    data:{_token:'{{csrf_token() }}'}
 
                    });
                    var fmok;
    return (fmok = file.previewElement) !=null ? fmok .parentNode.removeChild(file.previewElement):void 0;
                },

            init:function(){
                @if(!empty($product->photo))
                var mock={name:'{{ $product->title}}',size:'',type:''};
            this.emit('addedfile',mock);
            this.options.thumbnail.call(this,mock,'{{ url('storage/'.$product->photo) }}') ;
           $('.dz-progress').remove();
           @endif
  this.on('sending',function(file,xhr,formData){

    formData.append('fid','');
    file.fid = '';
  });
  this.on('success',function(file,response){
    file.fid = response.id;
                });
            }
         });

    });
  

 </script>


<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep(old('department_id')) !!},
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
    <!-- /. 
    'product_name_ar',
      'product_name_en',
      'desc_ar',
      'desc_en',
      'photo',
       'price',
       'department_id', -->
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

         <div class="form-group">
            {!! Form::label('desc_ar',trans('admin.desc_ar')) !!}
            {!! Form::text('desc_ar',old('desc_ar'),['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('desc_en',trans('admin.desc_en')) !!}
            {!! Form::text('desc_en',old('desc_en'),['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('price',trans('admin.price')) !!}
            {!! Form::text('price',old('price'),['class'=>'form-control']) !!}
        </div>


        <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="department_id" class="department_id_id" value="{{ old('department_id') }}">
        <div class="clearfix"></div>
        
        
      
        {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection