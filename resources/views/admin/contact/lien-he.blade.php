@extends('staff')
@section('title', 'Danh sách liên hệ')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-primary">Danh Sách Liên Hệ</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học viên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Nơi ở</th>
                                    <th>Công việc</th>
                                    <th>Ghi chú</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0
                                @endphp
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->name_student}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->work}}</td>
                                    <td>{{$item->content}}</td>
                                    <td>
                                        <div class="text-center mr-2">
                                            <button onclick="confirmDelete({{$item->id}})"
                                                class="btn btn-success"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
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
var routeDeleteContact = "{{route('contact.delete')}}"

function confirmDelete(id) {
    Swal.fire({
        title: 'Xác nhận xóa liên hệ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(routeDeleteContact, {
                id: id
            }).then((result) => {
                window.location.reload()
            }).catch((err) => {
                console.log(err);
            });
            Swal.fire(
                'Xóa thành công !',
                'Liên hệ đã bị xóa.',
                'success'
            )
        }
    })
}
</script>
@endsection