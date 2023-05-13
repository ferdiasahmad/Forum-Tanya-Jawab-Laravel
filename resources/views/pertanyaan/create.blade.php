@extends('layouts.base')

@section('content')
<div class="tt-wrapper-inner">
    <h1 class="tt-title-border">Create New Topic</h1>
    <form class="form-default form-create-topic" action="{{route('pertanyaan.store')}}"
    method="POST">
        @csrf
        <div class="form-group">
            <label for="inputTopicTitle">Judul Pertanyaan</label>
            <div class="tt-value-wrapper">
                <input type="text" name="judul" class="form-control" id="inputTopicTitle"
                placeholder="Isi dengan judul pertanyaan" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputTopicTitle">Kategori Pertanyaan</label>
            <div class="tt-value-wrapper">
                <select name="id_kategori" class="form-control">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="pt-editor">
            <h6 class="pt-title">Pertanyaan</h6>
            <div class="form-group">
                <textarea name="isi" class="form-control" rows="5" placeholder="Lets get started"></textarea>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-auto ml-md-auto">
                        <button type="submit" class="btn btn-secondary btn-width-lg">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
