
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
    <label for="customer_id" class="col-md-2 control-label">Customer</label>
    <div class="col-md-10">
        <select class="form-control" id="customer_id" name="customer_id">
        	    <option value="" style="display: none;" {{ old('customer_id', optional($basket)->customer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select customer</option>
        	@foreach ($customers as $key => $customer)
			    <option value="{{ $key }}" {{ old('customer_id', optional($basket)->customer_id) == $key ? 'selected' : '' }}>
			    	{{ $customer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

