@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mt-5"></div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Languages</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <button class="btn btn-success" data-toggle="modal" data-target="#createLanguageModal"><i class="fas fa-plus-square"></i> New Language</button>
                    <div class="mt-2"></div>     
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Code</th>
                          <th scope="col">Flag</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($languages as $language)
                    <tr>
                       <td> {{ $language->name }} </td>
                       <td> {{ $language->code }} </td>
                       <td> {{ $language->flag }} </td>
                       <td> 
                          <a class="btn btn-danger" href="{{ asset('/admin/delete/language') }}/{{ $language->id }}"> <i class="fas fa-times"></i></a></td>
                      </tr>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal New -->
<div class="modal fade" id="createLanguageModal" tabindex="-1" role="dialog" aria-labelledby="createLanguageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCampaignModalLabel"><i class="fas fa-plus"></i> Add a new Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  {!! Form::open(['url' => 'admin/new/language']) !!}
  @csrf
  <div class="modal-body">
   
    {{ Form::inputText(['name' => 'name', 'value' => '', 'label' => 'Language name', 'icon' => 'fas fa-flag',], $errors) }}
 {{ Form::inputText(['name' => 'code', 'value' => '', 'label' => 'Language code', 'icon' => 'fas fa-flag',], $errors) }}
  {{ Form::inputText(['name' => 'flag', 'value' => '', 'label' => 'Language flag', 'icon' => 'fas fa-flag',], $errors) }}
   
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save changes</button>
</div>
{!! Form::close() !!}
</div>
</div>
</div>

@endsection
@section('extrajs')

@endsection
