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


    <div class="form-group  ">
      {!! Form::label('title',trans('admin.title')) !!}
      {!! Form::text('title',$product->title,['class'=>'form-control ','placeholder'=>trans('admin.title')]) !!}
    </div> <!-- /title" -->  
       
    <div class="form-group  ">
      {!! Form::label('content',trans('admin.content')) !!}
      {!! Form::text('content',$product->content,['class'=>'form-control ','placeholder'=>trans('admin.content')]) !!}
    </div> <!-- /content" -->  
       

    <div class="form-group  ">
      {!! Form::label('price',trans('admin.price')) !!}
      {!! Form::text('price',$product->price,['class'=>'form-control ','placeholder'=>trans('admin.price')]) !!}
    </div> <!-- /price" -->  
       
    <div class="form-group  ">
       {!! Form::label('stock',trans('admin.stock')) !!}
      {!! Form::text('stock',$product->stock,['class'=>'form-control  ','placeholder'=>trans('admin.stock')]) !!}
    </div> <!-- /stock" -->  
       
 	<div class="form-group  ">
      {!! Form::label('start_at',trans('admin.start_at')) !!}
      {!! Form::text('start_at',$product->start_at,['class'=>'form-control datepicker','placeholder'=>trans('admin.start_at')]) !!}
	</div> <!-- /start_at" -->        
 
        
	<div class="form-group  ">
	      {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
	      {!! Form::text('start_offer_at',$product->start_offer_at,['class'=>'form-control datepicker','placeholder'=>trans('admin.start_offer_at')]) !!}
	</div> <!-- /start_offer_at" -->  
          
	<div class="form-group  ">
      {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
      {!! Form::text('end_offer_at',$product->end_offer_at,['class'=>'form-control datepicker','placeholder'=>trans('admin.end_offer_at')]) !!}
	</div> <!-- /end_offer_at" -->

                <div class="clearfix"></div>
 
    <div class="form-group reason   {{ $product->status != 'refused'?'hidden':''}}">
      {!! Form::label('reason',trans('admin.refused_reason')) !!}
{!! Form::textarea('reason',$product->reason,['class'=>'form-control ','placeholder'=>trans('admin.refused_reason')]) !!}
    </div> <!-- /reason" --> 
    </div>  <!-- /#product_setting" -->      
          
 