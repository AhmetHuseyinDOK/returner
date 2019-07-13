
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">Client</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($product)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select client</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('client_id', optional($product)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
    <label for="url" class="col-md-2 control-label">Url</label>
    <div class="col-md-10">
        <input class="form-control" name="url" type="text" id="url" value="{{ old('url', optional($product)->url) }}" minlength="1" placeholder="Enter url here...">
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($product)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($product)->price) }}" minlength="1" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

