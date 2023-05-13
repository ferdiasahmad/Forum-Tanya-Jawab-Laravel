@extends('layouts.base')

@section('content')
<div class="tt-wrapper-inner">
    <h1 class="tt-title-border">Ubah Kategori </h1>
    <form class="form-default  form-create-topic" action="{{route('kategori.update',$kategori)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputTopicTitle">Nama Kategori</label>
            <div class="tt-value-wrapper">
                <input type="text" name="nama" class="form-control" id="inputTopicTitle"
                    Placeholder="Isi dengan nama kategori" value="{{$kategori->nama}}" />
</div>
</div>
 		<div class=" pt-editor">
                <div class="row">
                    <div class="col-auto ml-md-auto">
                        <button type="submit" class="btn btn-secondary btn-width-lg">Kirim</button>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
