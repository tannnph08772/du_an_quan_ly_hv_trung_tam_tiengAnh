@extends('teacher')
@section('title', 'Danh sách góp ý')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-primary">Danh sách Feedback về bạn</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nội dung feedback</th>
                                    <th>Ý kiến góp ý</th>
                                    <th>Lớp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                 $key=1;
                                @endphp
                                @foreach($classes as $class)
                                @foreach($fb as $feedback )
                                @if($class->id==$feedback->class_id)
                                <tr>
                                    
                                    <td>{{ $key++}}</td>
                                    <td>
                                        <p class="text-left">
                                            @foreach($feedback->results as $result)
                                            {{$result->question->question}} : {{$result->answer->answer}}</br>
                                            @endforeach
                                        </p>

                                    </td>
                                    <td>{{$feedback->content}}</td>
                                    <td>{{$class->name_class}}</td>
                                </tr>

                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
<script>
var routeDeletePlace = "{{route('feedback.delete')}}"

function confirmDelete(id) {

    Swal.fire({
        title: 'Xác nhận xóa góp ý?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(routeDeletePlace, {
                id: id
            }).then((result) => {
                window.location.reload()
            }).catch((err) => {
                console.log(err);
            });
            Swal.fire(
                'Xóa thành công !',
                'Góp ý của bạn đã bị xóa.',
                'success'
            )
        }
    })
}
</script>
@endsection