 @push('js')
 <script type="text/javascript">
 
 $(document).on('change','.status', function(){
  	var status = $('.status option:selected').val();
 	if(status == 'refused')
 	{
 		$('.reason').removeClass('hidden');

 	}else{
 		 $('.reason').addClass('hidden');

 	}

 });

 $('.datepicker').datepicker({

 	rtl:'{{ session('lang')=='ar'?true:false}}',
 	language:'{{ session('lang')}}',
	format:'yyyy-mm-dd',
	autoclose:false,
	todayBtn:true,
	clearBtn:true 
 });
 
</script>
 @endpush
    
    <div id="product_setting" class="tab-pane fade">
    <h3>Tanks2</h3>
      <p>{{ trans('admin.product_setting') }} </p>


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
        
          
 