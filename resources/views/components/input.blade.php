<div class="form-group row {{ $errors->has(Arr::get($params, 'name')) ? 'has-error' : '' }}"> 
<label for="{{ Arr::get($params, 'name') }}" class="col-4 col-form-label">{{ Arr::get($params, 'label') }}</label>
<div class="col-8">
	<div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="{{ Arr::get($params, 'icon') }}"></i>
          </div>
        </div> 
<input
	type="{{ Arr::get($params, 'type', 'text') }}"
	id="{{ Arr::get($params, 'name') }}"
	name=" {{ Arr::get($params, 'name') }}"
	class="form-control"
	value="{{ Arr::get($params, 'value') }}"
	placeholder="{{ Arr::get($params, 'label') }}"
	{{ Arr::get($params, 'required', false) ? 'required' : '' }}>

<small class="text-danger">{{ $errors->first(Arr::get($params, 'name')) }}</small>
</div>
</div>
</div> 