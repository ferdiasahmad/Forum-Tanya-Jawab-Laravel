@extends('layouts.base')

@section('content')
<div>
    <a href="{{route('kategori.create')}}" class="btn btn-primary">Buat Baru</a>
</div>
<div class="tt-list-header">
    <div class="tt-col-topic">Nama</div>
    <div class="tt-col-value">Aksi</div>
</div>
@foreach ($kategori as $k)
<div class="tt-item">
    <div class="tt-col-avatar">
        <svg class="tt-icon">
            <use xlink:href="#icon-ava-c"></use>
        </svg>
    </div>
    <div class="tt-col-description">
        <h6 class="tt-title">
            <a href="page-single-topic.html">
                {{$k->nama}}
            </a>
        </h6>
    </div>
    <div class="tt-col">
        <form action="{{route('kategori.destroy',$k)}}" method="post">
            <a href="{{ route('kategori.edit',$k)}}" class="btn btn-secondary">Edit</a>

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Hapus</button>
        </form>
    </div>
</div>
@endforeach
@endsection
