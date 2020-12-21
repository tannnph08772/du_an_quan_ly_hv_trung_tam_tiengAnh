@extends('index')
@section('title', 'Danh sách góp ý')
@section('content')
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
                        <th>Tên Sinh Viên</th>
                        <th>Lớp Học</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedback as $index=>$item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{$item->student->user->name}}</td>
                        <td>{{$item->class->name_class}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->student->id }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-view-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z" />
                                        </svg>
                                    </button>
                                </div>
                                @include('admin.feedback.detail',[
                                'id'=> $item->id,
                                'list'=> $list,
                                'content'=>$item->content,
                                ])
                                <div class="text-center">
                                    <button class="btn btn-danger ml-3" onclick="confirmDelete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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