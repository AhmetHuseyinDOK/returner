
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : '' }}">
    <label for="order_id" class="col-md-2 control-label">Order</label>
    <div class="col-md-10">
        <select class="form-control" id="order_id" name="order_id">
        	    <option value="" style="display: none;" {{ old('order_id', optional($orderItem)->order_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select order</option>
        	@foreach ($orders as $key => $order)
			    <option value="{{ $key }}" {{ old('order_id', optional($orderItem)->order_id) == $key ? 'selected' : '' }}>
			    	{{ $order }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($orderItem)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($orderItem)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="text" id="quantity" value="{{ old('quantity', optional($orderItem)->quantity) }}" minlength="1" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('coupon_id') ? 'has-error' : '' }}">
    <label for="coupon_id" class="col-md-2 control-label">Coupon</label>
    <div class="col-md-10">
        <select class="form-control" id="coupon_id" name="coupon_id">
        	    <option value="" style="display: none;" {{ old('coupon_id', optional($orderItem)->coupon_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select coupon</option>
        	@foreach ($coupons as $key => $coupon)
			    <option value="{{ $key }}" {{ old('coupon_id', optional($orderItem)->coupon_id) == $key ? 'selected' : '' }}>
			    	{{ $coupon }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('coupon_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

