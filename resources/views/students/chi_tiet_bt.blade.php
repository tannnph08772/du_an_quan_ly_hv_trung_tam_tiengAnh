@extends('student')
@section('title', 'Bài tập')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <img width=40 height=40 class="rounded-circle bg-success"
                            src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{$homework->teacher->user->name}}"
                            alt="">
                    </div>
                    <div class="col-11">
                        <div class="text-dark">{{$homework->teacher->user->name}}</div>
                        <p style="font-size: 12px;">{{($homework->created_at)->format('d-m-Y')}}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <p style="font-size: 12px;"> Tên bài tập : {{$homework->title}}</p>
                    <p style="font-size: 12px;">{{$homework->note}}</p>
                    <p style="font-size: 12px;">
                        <a class="text-dark" href="{{ route('download',$homework->file) }}"><i class="far fa-file-word"></i> {{$homework->file}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="border py-4 px-4 bg-white">
            <h3 class="text-">Nộp bài tập</h3>
            <form method="POST" class="py-2" action="{{ route('nopBai',[ 'id'=>$homework->id])}}" enctype="multipart/form-data">
                @csrf
                @error('file')
                <small style="color: red">{{ $message }}</small>
                @enderror
                <input type="file" name="file" multiple class="choose mb-2">
               
                <button class="btn btn-dark text-white">Nộp bài tập</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
@if( session('success'))
<script>
swal.fire(
    'Bạn đã nộp file thành công!',
    'success'
)
</script>
@endif
@if(session('error'))
<script>
swal.fire(
    'Bạn chưa nộp file thành công!',
    'errors'
)
</script>
@endif
@endsection
@section('style')
.choose::-webkit-file-upload-button {
color: white;
display: inline-block;
background: #1CB6E0;
border: none;
padding: 7px 15px;
font-weight: 700;
border-radius: 3px;
white-space: nowrap;
cursor: pointer;
font-size: 10pt;
}
@endsection