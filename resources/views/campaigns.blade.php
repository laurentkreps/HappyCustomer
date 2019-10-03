@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mt-5"></div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Campaigns</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <button class="btn btn-success" data-toggle="modal" data-target="#createCampaignModal"><i class="fas fa-plus-square"></i> New campaign</button>
                    <div class="mt-2"></div>     
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Question</th>
                          <th scope="col">Coming back question</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($campaigns as $campaign)
                    <tr>
                       <td> {{ $campaign->name }} </td>
                       <td> {{ $campaign->question }} </td>
                       <td> {{ $campaign->comingback }} </td>
                       <td> <button class="btn btn-primary" data-toggle="modal" data-target="#editCampaignModal" data-id="{{ $campaign->id }}"><i class="fas fa-edit"></i></button> 
                          <a class="btn btn-danger" href="{{ asset('/admin/delete/campaign') }}/{{ $campaign->id }}"> <i class="fas fa-times"></i></a></td>
                      </tr>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal New -->
<div class="modal fade" id="createCampaignModal" tabindex="-1" role="dialog" aria-labelledby="createCampaignModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCampaignModalLabel"><i class="fas fa-plus"></i> Add a new Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  {!! Form::open(['url' => 'admin/new/campaign']) !!}
  @csrf
  <div class="modal-body">
    @foreach($langs as $lang)
    {{ Form::inputText(['name' => 'name_' . $lang->code, 'value' => '', 'label' => 'Name (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
    @endforeach
    <hr>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Rating</label> 
        <div class="col-8">
         <select class="form-control" id="rating_id" name="rating_id">
             @foreach($ratings as $rating)
             <option value="{{ $rating->id }}">{{ $rating->description }}</option>
             @endforeach
         </select>
     </div>
 </div> 
 <hr>
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'question_' . $lang->code, 'value' => '', 'label' => 'Question (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'cbquestion_' . $lang->code, 'value' => '', 'label' => 'CB Question (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save changes</button>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="editCampaignModal" tabindex="-1" role="dialog" aria-labelledby="editCampaignModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCampaignModalLabel"><i class="fas fa-edit"></i> Edit a Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  {!! Form::open(['url' => 'admin/edit/campaign']) !!}
  <input type="hidden" id="campaign_id" name="campaign_id">
  @csrf
  <div class="modal-body">
    @foreach($langs as $lang)
    {{ Form::inputText(['name' => 'edit_name_' . $lang->code, 'value' => '', 'label' => 'Name (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
    @endforeach
    <hr>
    <div class="form-group row">
        <label for="edit_rating_id" class="col-4 col-form-label">Rating</label> 
        <div class="col-8">
         <select class="form-control" id="edit_rating_id" name="rating_id">
             @foreach($ratings as $rating)
             <option value="{{ $rating->id }}">{{ $rating->description }}</option>
             @endforeach
         </select>
     </div>
 </div> 
 <hr>
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_question_' . $lang->code, 'value' => '', 'label' => 'Question (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_cbquestion_' . $lang->code, 'value' => '', 'label' => 'CB Question (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
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
<script>
    $('#editCampaignModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#campaign_id').val(recipient);

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
     type:'POST',
     url:'{{ asset('/get/campaign/details') }}',
     data:{campaign_id:recipient},
     dataType: "json",
     success:function(data){
      console.log(data.question.fr);
      $('#edit_rating_id').val(data.rating_id);
      @foreach($langs as $lang)
      $('#edit_name_{{ $lang->code }}').val(data.name.{{ $lang->code }});
        $('#edit_question_{{ $lang->code }}').val(data.question.{{ $lang->code }});
        $('#edit_cbquestion_{{ $lang->code }}').val(data.comingback.{{ $lang->code }});
      @endforeach

  },
  error: function(xhr, status, thrown)
      {

         alert( status );

      }
});

})

</script>
@endsection
