@extends('layouts.base')

@section('content')
<div class="tt-wrapper-inner">
    <h1 class="tt-title-border">Ubah Pertanyaan</h1>
    <form class="form-default form-create-topic" action="{{route('pertanyaan.update', $pertanyaan)}}"
    method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputTopicTitle">Judul Pertanyaan</label>
            <div class="tt-value-wrapper">
                <input type="text" name="judul" class="form-control" id="inputTopicTitle"
                    placeholder="Isi dengan judul pertanyaan" value="{{$pertanyaan->judul}}">
            </div>
        </div>
        <div class="pt-editor">
            <h6 class="pt-title">Pertanyaan</h6>
            <div class="form-group">
                <textarea name="isi" class="form-control" rows="5"
                    placeholder="Lets get started">{{$pertanyaan->isi}}</textarea>
            </div>
            <div class="row">
                <div class="col-auto ml-md-auto">
                    <button type="submit" class="btn btn-secondary btn-width-lg">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
