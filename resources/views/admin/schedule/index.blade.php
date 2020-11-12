@extends('index')
@section('title', 'Danh sách ca học')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-primary">Danh Sách Ca Học</h4>
                    <a class="btn btn-success"href="{{ route ('schedule.add' ) }}"
                    >Tạo Ca Học</a>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message') }}
                      </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center"  id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Ca Học</th>
                                    <th>Giờ Bắt Đầu</th>
                                    <th>Giờ Kết Thúc</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0
                                @endphp
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->name_schedule}}</td>
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center mr-2">
                                                <a href="{{ route ('schedule.edit', ['id' => $item->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            </div>

                                            <div class="text-center">
                                                <div class="text-center">
                                                    <button class="btn btn-danger" onclick="confirmDelete({{$item->id}})"><i class="fas fa-trash"></i></button>
                                                </div>
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

        </div>
    </div>
</div>
</section>
@endsection
@section('script')
  <script>
      var routeDeletePlace = "{{route('schedule.delete')}}"
      function confirmDelete(id){
          Swal.fire({
            title: 'Xác nhận xóa ca học?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
            })
            .then((result) => {
            if (result.isConfirmed) {
                axios.post(routeDeletePlace, {id: id}).then((result) => {
                    window.location.reload()
                })
                .catch((err) => {
                    console.log(err);
                });
                Swal.fire(
                'Xóa thành công !',
                'Ca học của bạn đã bị xóa.',
                'success'
                )
            }
            })
      }
      
</script>  
@endsection
