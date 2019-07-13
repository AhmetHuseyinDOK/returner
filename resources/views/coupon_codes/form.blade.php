
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
    <label for="customer_id" class="col-md-2 control-label">Customer</label>
    <div class="col-md-10">
        <select class="form-control" id="customer_id" name="customer_id">
        	    <option value="" style="display: none;" {{ old('customer_id', optional($couponCode)->customer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select customer</option>
        	@foreach ($customers as $key => $customer)
			    <option value="{{ $key }}" {{ old('customer_id', optional($couponCode)->customer_id) == $key ? 'selected' : '' }}>
			    	{{ $customer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">Code</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($couponCode)->code) }}" minlength="1" placeholder="Enter code here...">
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expires') ? 'has-error' : '' }}">
    <label for="expires" class="col-md-2 control-label">Expires</label>
    <div class="col-md-10">
        <input class="form-control" name="expires" type="text" id="expires" value="{{ old('expires', optional($couponCode)->expires) }}" minlength="1" placeholder="Enter expires here...">
        {!! $errors->first('expires', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($couponCode)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($couponCode)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('direct') ? 'has-error' : '' }}">
    <label for="direct" class="col-md-2 control-label">Direct</label>
    <div class="col-md-10">
        <input class="form-control" name="direct" type="text" id="direct" value="{{ old('direct', optional($couponCode)->direct) }}" minlength="1" placeholder="Enter direct here...">
        {!! $errors->first('direct', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percent') ? 'has-error' : '' }}">
    <label for="percent" class="col-md-2 control-label">Percent</label>
    <div class="col-md-10">
        <input class="form-control" name="percent" type="text" id="percent" value="{{ old('percent', optional($couponCode)->percent) }}" minlength="1" placeholder="Enter percent here...">
        {!! $errors->first('percent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

