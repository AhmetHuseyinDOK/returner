
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
    <label for="customer_id" class="col-md-2 control-label">Customer</label>
    <div class="col-md-10">
        <select class="form-control" id="customer_id" name="customer_id">
        	    <option value="" style="display: none;" {{ old('customer_id', optional($view)->customer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select customer</option>
        	@foreach ($customers as $key => $customer)
			    <option value="{{ $key }}" {{ old('customer_id', optional($view)->customer_id) == $key ? 'selected' : '' }}>
			    	{{ $customer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($view)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($view)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

