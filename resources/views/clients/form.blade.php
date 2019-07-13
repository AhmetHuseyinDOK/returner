
<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
    <label for="company_name" class="col-md-2 control-label">Company Name</label>
    <div class="col-md-10">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($client)->company_name) }}" minlength="1" placeholder="Enter company name here...">
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('api_customer_url') ? 'has-error' : '' }}">
    <label for="api_customer_url" class="col-md-2 control-label">Api Customer Url</label>
    <div class="col-md-10">
        <input class="form-control" name="api_customer_url" type="text" id="api_customer_url" value="{{ old('api_customer_url', optional($client)->api_customer_url) }}" minlength="1" placeholder="Enter api customer url here...">
        {!! $errors->first('api_customer_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('api_coupon_url') ? 'has-error' : '' }}">
    <label for="api_coupon_url" class="col-md-2 control-label">Api Coupon Url</label>
    <div class="col-md-10">
        <input class="form-control" name="api_coupon_url" type="text" id="api_coupon_url" value="{{ old('api_coupon_url', optional($client)->api_coupon_url) }}" minlength="1" placeholder="Enter api coupon url here...">
        {!! $errors->first('api_coupon_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($client)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($client)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('host') ? 'has-error' : '' }}">
    <label for="host" class="col-md-2 control-label">Host</label>
    <div class="col-md-10">
        <input class="form-control" name="host" type="text" id="host" value="{{ old('host', optional($client)->host) }}" minlength="1" placeholder="Enter host here...">
        {!! $errors->first('host', '<p class="help-block">:message</p>') !!}
    </div>
</div>

