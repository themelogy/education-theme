@extends('layouts.master')

@section('content')
    @component('partials.components.page-title', ['breadcrumb'=>'employee.index'])
        Yönetim Kurulu
    @endcomponent

    <section class="section-padding p-top-bot-50">
        <div class="container">

            <div class="row">
                @if(count($employees)>0)
                @foreach($employees as $employee)
                <div class="col-md-4 col-sm-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img src="{{ $employee->present()->firstImage(370,300,'fit',80) }}" class="img-responsive" alt="{{ $employee->fullname }}"></a>
                        </div>

                        <div class="team-title">
                            <h3><a href="#">{{ $employee->fullname }}</a></h3>
                            <span>{{ $employee->position }}</span>
                        </div>

                        <ul class="team-social-links list-inline text-center">
                            @if($employee->facebook)
                            <li><a target="_blank" href="{{ $employee->facebook }}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($employee->twitter)
                            <li><a target="_blank" href="{{ $employee->twitter }}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($employee->linkedin)
                            <li><a target="_blank" href="{{ $employee->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($employee->email)
                            <li><a target="_blank" href="{{ Html::email($employee->email) }}"><i class="fa fa-envelope-o"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-12 p-top-bot-50">
                    <div class="alert warning-dark" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-warning"></i> {!! trans('themes::employee.messages.employees not found') !!}
                    </div>
                </div>
                @endif
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection