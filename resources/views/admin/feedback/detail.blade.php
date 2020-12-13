
<div class="modal fade" id="exampleModal{{$item->student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
      <h3>Nội dung: </h3>
      <p>{{ $content }}</p>
      </div>
      <div>
      <h3>Góp Ý:</h3>
              @foreach($list as $value )
              @if ($value->id_feedback == $item->id)
              <p>
                  {{$value->question }} 
                  <br>
                  {{$value->answer}}
              </p>
              @endif
              @endforeach
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
