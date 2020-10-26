@extends('index')
@section('title', 'View')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('layouts/header')
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Danh Sách Ca Học</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <a class="btn btn-success"href="{{ route ('schedule.add' ) }}"
                    >Tạo Ca Học</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên Ca Học</th>
                                    <th>Giờ Bắt Đầu</th>
                                    <th>Giờ Kết Thúc</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                <td>{{$item->name_schedule}}</td>
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center mr-2">
                                                <a href="{{ route ('schedule.edit', ['id' => $item->id ]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            </div>

                                            <div class="text-center">
                                                <form action="{{ route ('schedule.delete' , [ 'id' => $item->id ]) }}"  method="POST">
                                                @csrf
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
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
    @include('layouts/footer')
    <!-- End of Footer -->

</div>
</section>
@endsection