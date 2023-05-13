@extends('layouts.base')
@section('content')
<div class="tt-single-topic-list">
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        <i class="tt-icon">
                        </i>
                    </div>
                    <div class="tt-avatar-title">
                    </div>
                    <a href="#" class="tt-info-time">
                        <i class="tt-icon">
                        </i>{{$pertanyaan->created_at}}
                    </a>
                </div>
                <h3 class="tt-item-title">
                    {{$pertanyaan->judul}}
                </h3>
            </div>
            <div class="tt-item-description">
                <p>{{$pertanyaan->isi}}</p>
            </div>
        </div>
    </div>
</div>

    @if (count($jawaban) > 0)
    <div class="tt-item">
        <h2>Jawaban</h2>
    </div>
    @foreach ($jawaban as $jawaban)
    <div class="tt-item">
        <div class="tt-single-topic" style="width: 100%">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        <i class="tt-icon"><svg>
                            <use xlink:href="#icon-ava-t"></use>
                        </svg></i>
                    </div>
                    <div class="tt-avatar-title">
                        <b>{{ $jawaban->user->name }}</b>
                    </div>
                    <a href="#" class="tt-info-time">
                        {{$jawaban->created_at}}
                    </a>
                </div>
            </div>
            <div class="tt-item-description">
                {{ $jawaban->isi }}
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <div class="tt-wrapper-inner">
        <div class="pt-editor form-default">
            <form action="{{ route('jawaban.store') }}" method="post">
                @csrf
                <h6 class="pt-title">Unggah Jawaban</h6>
                <div class="form-group">
                    <textarea name="isi" class="form-control" rows="5" placeholder="Jawaban">
                    </textarea>
                </div>
                <input type="hidden" name="pertanyaan_id" value="{{ $pertanyaan->id }}">
                <div class="pt-row">
                    <div class="col-auto">

                    </div>
                    <div class="col-auto">
                        <button class="btn btn-secondary btn-width-lg" type="submit">Jawab</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

