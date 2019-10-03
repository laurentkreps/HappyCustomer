@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mt-5"></div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ratings</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <button class="btn btn-success" data-toggle="modal" data-target="#createRatingModal"><i class="fas fa-plus-square"></i> New Rating</button>
                    <div class="mt-2"></div>     
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Description</th>
                          <th scope="col">Details</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($ratings as $rating)
                    <tr>
                      <td>{{ $rating->description }}</td>
                       <td>
                        @foreach($rating->ratingdetails as $detail)
                            {!! $detail->content !!} {!! $detail->value !!}
                        @endforeach
                       </td>
                      <td></td>
                       <td> <button class="btn btn-primary" data-toggle="modal" data-target="#editRatingModal" data-id="{{ $rating->id }}"><i class="fas fa-edit"></i></button> 
                          <a class="btn btn-danger" href="{{ asset('/admin/delete/rating') }}/{{ $rating->id }}"> <i class="fas fa-times"></i></a></td>
                      </tr>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Modal New -->
<div class="modal fade" id="createRatingModal" tabindex="-1" role="dialog" aria-labelledby="createCampaignModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCampaignModalLabel"><i class="fas fa-plus"></i> Add a new Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  {!! Form::open(['url' => 'admin/new/rating']) !!}
  @csrf
  <div class="modal-body">
 {{ Form::inputText(['name' => 'description', 'value' => '', 'label' => 'Description', 'icon' => 'fas fa-file-signature',], $errors) }}
{{ Form::inputText(['name' => 'icon1', 'value' => '', 'label' => 'Icon 1 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'icon1_value_' . $lang->code, 'value' => '', 'label' => 'Icon 1 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'icon2', 'value' => '', 'label' => 'Icon 2 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'icon2_value_' . $lang->code, 'value' => '', 'label' => 'Icon 2 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'icon3', 'value' => '', 'label' => 'Icon 3 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'icon3_value_' . $lang->code, 'value' => '', 'label' => 'Icon 3 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'icon4', 'value' => '', 'label' => 'Icon 4 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'icon4_value_' . $lang->code, 'value' => '', 'label' => 'Icon 4 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
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
<div class="modal fade" id="editRatingModal" tabindex="-1" role="dialog" aria-labelledby="editCampaignModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCampaignModalLabel"><i class="fas fa-edit"></i> Edit a Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  {!! Form::open(['url' => 'admin/edit/rating']) !!}
  @csrf
  <input type="hidden" id="rating_id" name="rating_id">
  <div class="modal-body">
 {{ Form::inputText(['name' => 'edit_description', 'value' => '', 'label' => 'Description', 'icon' => 'fas fa-file-signature',], $errors) }}
{{ Form::inputText(['name' => 'edit_icon1', 'value' => '', 'label' => 'Icon 1 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_icon1_value_' . $lang->code, 'value' => '', 'label' => 'Icon 1 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'edit_icon2', 'value' => '', 'label' => 'Icon 2 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_icon2_value_' . $lang->code, 'value' => '', 'label' => 'Icon 2 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'edit_icon3', 'value' => '', 'label' => 'Icon 3 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_icon3_value_' . $lang->code, 'value' => '', 'label' => 'Icon 3 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>
 {{ Form::inputText(['name' => 'edit_icon4', 'value' => '', 'label' => 'Icon 4 HTML', 'icon' => 'fas fa-icons',], $errors) }}
 @foreach($langs as $lang)
 {{ Form::inputText(['name' => 'edit_icon4_value_' . $lang->code, 'value' => '', 'label' => 'Icon 4 Caption (' . $lang->name . ')', 'icon' => 'flag-icon flag-icon-' . $lang->flag,], $errors) }}
 @endforeach
 <hr>



 
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
    $('#editRatingModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#rating_id').val(recipient);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
     type:'POST',
     url:'{{ asset('/get/rating/details') }}',
     data:{rating_id:recipient},
     dataType: "json",
     success:function(data){
      var number;
      var variab;
      $.each(data.ratingdetails, function(index, detail) {
            //console.log('detail: ' + detail.content + 'index: ' + index);
            number = index + 1;
            $('#edit_icon' + number).val(detail.content);
            @foreach($langs as $lang)
                //console.log(detail.value.fr);
                variab = '#edit_icon'+ number +'_value_{{ $lang->code }}';
                $('#edit_icon'+ number +'_value_{{ $lang->code }}').val(detail.value.{{ $lang->code }});
            @endforeach
            

      });

    //   $.each(data, function(index,rating) {
    //     console.log(rating);

    //  $.each(rating.ratingdetails, function(key,detail) {
    //       //str+='<li>'+val.project_name+'</li>';
    //      // console.log('detail: ' + detail.content);
    //  });
   
    // });
      //console.log(data.ratingdetails[0].id);
      $('#edit_description').val(data.description);
      /*
      @foreach($langs as $lang)
      $('#edit_name_{{ $lang->code }}').val(data.name.{{ $lang->code }});
        $('#edit_question_{{ $lang->code }}').val(data.question.{{ $lang->code }});
        $('#edit_cbquestion_{{ $lang->code }}').val(data.comingback.{{ $lang->code }});
      @endforeach*/

  },
  error: function(xhr, status, thrown)
      {

         alert( status );

      }
});

})

</script>
@endsection
