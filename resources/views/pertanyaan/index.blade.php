@extends('layouts.base')

@section('content')

<div class="tt-list-header">
    <div class="tt-col-topic">Pertanyaan</div>
    <div class="tt-col-value">Aksi</div>
</div>
@foreach ($pertanyaan as $p )
<div class="tt-item">
    <div class="tt-col-avatar">
        <svg class="tt-icon">
          <use xlink:href="#icon-ava-c"></use>
        </svg>
    </div>
    <div class="tt-col-description">
        <h6 class="tt-title">
            <a href="page-single-topic.html">
                {{$p->judul}}

            </a>
        </h6>
    </div>
    <div class="tt-col-category">
        <span class="tt-color04 tt-badge">{{$p->kategori->nama}}</span>
    </div>
    <div class="tt-col-value tt-color-select  hide-mobile">660</div>
    <div class="btn-group">
        <form action="{{route('pertanyaan.destroy',$p)}}" method="post">
            <a href="{{route('pertanyaan.show',$p)}}" class="btn btn-primary">Lihat</a>
            @if (Auth::user()->role_id = 1)
            <a href="{{route('pertanyaan.edit',$p)}}" class="btn btn-secondary">Edit</a>

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Hapus</button>
            @endif
        </form>
    </div>
</div>
@endforeach
<div >
    <a href="{{route('pertanyaan.create')}}" class="btn btn-primary">Tambah Data</a>
</div>


@endsection



