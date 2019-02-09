<div id="product_other_data" class="tab-pane fade">
    <h3>Tanks4</h3>
      <p>{{ trans('admin.product_other_data') }}</p>  


              <div class="form-group">
 <div class="form-group">
            {!! Form::label('other_data',trans('admin.other_data')) !!}
            {!! Form::textarea('other_data',old('other_data'),['class'=>'form-control testarea']) !!}
        </div>
    </div>
    <style type="text/css">
    	
    	.testarea{
    		min-width: 500px;
    		min-height: 500px;
    		//*display: block;*/
    	}

    </style>