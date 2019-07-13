
<div class="form-group {{ $errors->has('client_customer_id') ? 'has-error' : '' }}">
    <label for="client_customer_id" class="col-md-2 control-label">Client Customer</label>
    <div class="col-md-10">
        <select class="form-control" id="client_customer_id" name="client_customer_id">
        	    <option value="" style="display: none;" {{ old('client_customer_id', optional($customer)->client_customer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select client customer</option>
        	@foreach ($clientCustomers as $key => $clientCustomer)
			    <option value="{{ $key }}" {{ old('client_customer_id', optional($customer)->client_customer_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCustomer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($customer)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($customer)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($customer)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">Client</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($customer)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select client</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('client_id', optional($customer)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

