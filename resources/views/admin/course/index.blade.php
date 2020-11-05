@extends('index')
@section('title', 'View')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Danh Sách Khóa Học</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <a class="btn btn-success"href="{{ route ('course.add' ) }}"
                    >Tạo Khóa Học</a>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message') }}
                      </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên Khóa học</th>
                                    <th>Số Buổi Học</th>
                                    <th>Mô Tả</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $item)
                                <tr>
                                    <td>{{$item->name_cource}}</td>
                                    <td>{{$item->number_cource}}</td>
                                    <td id="description-{{ $key }}">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center mr-2">
                                                <a href="{{ route ('showcourse.edit', ['id' => $item->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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


    <!-- Footer -->
    {{-- @include('layouts/footer') --}}
    <!-- End of Footer -->

</div>
</section>
@endsection
@section('script')
  <script>
      function PrintDescription(key ,html){
            console.log(html);
            let element = '#description-'+key;
            $(element).html(html)
        }
      var routeDeletePlace = "{{route('course.delete')}}"
      function confirmDelete(id){
          Swal.fire({
            title: 'Xác nhận xóa khóa học?',
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
                'Khóa học của bạn đã bị xóa.',
                'success'
                )
            }
            })
      }
</script>  
@endsection