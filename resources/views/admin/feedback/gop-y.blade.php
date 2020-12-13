@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 pt-3 ">
            <div class="row">
                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                        <h3 class="pt-3">Đánh giá chất lượng mức độ hài lòng về Giảng viên</h3>
                        <p class="text-danger">*Bắt buộc</p>
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <h5 class="pt-3">Xin chào <span class="text-danger">{{Auth::user()->name}}</span></h5>
                    </div>
                    @foreach ($question as $index=>$item)
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded pt-2 pb-4">
                    <input type="hidden" name="question[{{$index}}]" value="{{$item->id}}">
                        <h5 class="pt-3">{{$item->question}}<span class="text-danger">*</span></h5>
                        @foreach ($answer as $data)
                        @if ($item->id == $data->question_id)
                        <div class="form-check pt-2">
                            <input class="form-check-input " type="radio" name="answer[{{$data->question_id}}]"
                                id="exampleRadios1" value="{{$data->id}}">
                            <label class="form-check-label">
                                {{$data->answer}}
                            </label>
                        </div>
                        @endif
                        @endforeach
                            @error('answer')
								<small style="color: red">{{ $message }}</small>
							@enderror
                    </div>
                    @endforeach
                    <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                        <h5 class="pt-3">Ý kiến cá nhân <span class="text-danger">*</span></h5>
                        <textarea name="content" id="" cols="91" rows="5"></textarea>
                            @error('content')
								<small style="color: red">{{ $message }}</small>
							@enderror   
                    </div>
                    <button class="btn btn-danger mr-2 mb-3">Hủy</button>
                    <button class="btn btn-primary mb-3" type="submit">Gửi</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection