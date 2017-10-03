@php
    $title = '500 Sistem Hatası';
    seo_helper()->setTitle($title);
@endphp

@extends('layouts.master')

@section('content')
    <section class="error-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <i class="fa fa-dropbox"></i>
                </div>

                <div class="col-sm-7">
                    <div class="error-info">
                        <h1 class="mb-30">500</h1>
                        <span class="error-sub">{{ trans('global.error') }}! Sistemde hata oluştu.</span>

                        <p>Hatayla ilgili site yöneticisine bilgi verebilirsiniz</p>
                        <a class="btn btn-lg waves-effect waves-light" href="{{ route('homepage') }}">{{ trans('page::messages.return homepage') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection