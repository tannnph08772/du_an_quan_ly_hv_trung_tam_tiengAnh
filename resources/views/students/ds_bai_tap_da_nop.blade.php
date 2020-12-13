@extends('student')
@section('title', 'Bài tập')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách bài tập đã nộp</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài tập</th>
                        <th>File đã nộp</th>
                        <th>Ngày nộp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($submits as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->homework->title}}</td>
                        <td>@foreach($item->submitDetail as $it)
                           <a href="{{ route('download',$it->file) }}">{{$it->file}}</a> <br>
                         @endforeach</td>
                        <td>@foreach($item->submitDetail as $it)
                          {{date_format($it->created_at,"d/m/Y H:i:s")}} <br>
                         @endforeach</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
