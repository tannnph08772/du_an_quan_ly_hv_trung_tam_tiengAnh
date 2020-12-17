@extends('teacher')
@section('title', 'Danh sách học viên nộp bài')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">Danh sách học viên nộp bài {{ $hw->title }} - {{$hw->class->name_class}}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>File</th>
                        <th>Ngày nộp bài</th>
                        <th>Trạng thái</th>
                        <th>Điểm</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($submit as $item)
                    <tr class="info">
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->student->user->name }}</td>
                        <td>
                            @foreach($item->submitDetail as $it)
                            <a href="{{ route('download',$it->file) }}">{{$it->file}}</a><br>
                            @endforeach
                        </td>
                        <td>{{date_format($it->created_at,"d/m/Y H:i:s")}}</td>
                        <td>
                            @if(date_format($item->created_at,"Y-m-d") <= $hw->end_day)
                                <span class="text-success font-weight-bold">Đúng hạn</span>
                            @else
                                <span class="text-danger font-weight-bold">Muộn</span>
                            @endif
                        </td>
                        <td width="10%">
                            <input type="hidden" class="id" value="{{ $item->id }}">
                            <input type="text" class="form-control pointInput" value="{{ $item->point == '' ? '' : $item->point }}">
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-center"><button onclick="submitData()" class="btn btn-primary">Cập nhật điểm</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    const submitData = () => {
        var info = document.querySelectorAll(".info");
        var data = [];
        var regex = /^\d+(?:\.\d{1})?$/;
        info.forEach(element => {
            if($(element).find('.pointInput').val().match(regex)) { 
                var point = {
                    'id': $(element).find('.id').val(),
                    'point': $(element).find('.pointInput').val()
                }
                data.push(point);
            }else {
                Swal.fire(
                    'Sai định dạng',
                    '',
                    'error'
                )
                element.preventDefault();
            }
        });
        $.post('{{ route("homework.storePoint") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(e) {
                Swal.fire(
                    'Cập nhật thành công',
                    '',
                    'success'
                )
			}
        )
    }
</script>
@endsection