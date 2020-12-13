@extends('teacher')
@section('title', 'Danh sách góp ý')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-primary">Danh Sách Góp ý</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ý Kiến</th>
                                    <th>Ý kiến Cá Nhân</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                <tr>
                                    <td>{{$class->name_class}}</td>
                                </tr>

                                @php
                                $key=0;
                                @endphp
                                @foreach($fb as $feedback )
                                @if($class->id==$feedback->class_id)
                                @php
                                $key=$key+1;
                                @endphp
                                <tr>
                                    <td>{{ $key}}</td>
                                    <td>
                                        <ul>
                                            @foreach($feedback->results as $result)
                                            {{$result->question->question}}:{{$result->answer->answer}}</br>
                                            @endforeach
                                        </ul>

                                    </td>
                                    <td>{{$feedback->content}}</td>
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