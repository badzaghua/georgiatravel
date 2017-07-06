@extends('layouts.default')

@section('title',trans('lang.georgia'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())


@section('content')
@if(count($slider))
@include('sections.slider')
@endif
@if(!count($slider))
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{ Imagepath($georgia->image) }}/w=1800&h=800" alt="Image">
        <div class="carousel-caption">
          <h1>{{ $georgia->title }}</h1>
        </div>      
      </div>
    </div>
</div>
@endif

<div class="page-bg">
<div class="container">
    <div class="row">
        <div class="board">
            <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
            <div class="board-inner">
            <ul class="nav nav-tabs" id="myTab">
@foreach($tabs as $tab)
<?php if(!isset($loop)) $loop=1; else $loop++; ?>
             <li class="{{ $loop==1 ? 'active' : '' }}">
             <a href="#{{ str_slug($tab->title) }}" data-toggle="tab" title="{{ $tab->title }}">
            {{ $tab->title }}
          </a></li>
@endforeach

<?php unset($loop); ?>
             
             </ul></div>
                          <div class="tab-content">
@foreach($tabs as $tab)
<?php if(!isset($loop)) $loop=1; else $loop++; ?>

              <div class="tab-pane fade  {{ $loop==1 ? 'in active' : '' }}" id="{{ str_slug($tab->title) }}">

                <div class="media">
                    <a href="#" class="pull-right">
                        <img src="{{ Imagepath($tab->image) }}/w=280&h=300" class="media-object">
                    </a>
                    <div class="media-body">
                      <h1 class="media-heading">{{ $tab->title }}</h1>
                        <p class="text-left">
                                 {!! nl2br($tab->content) !!}
                              </p>
                    </div>
                </div>


              </div>

@endforeach
<div class="clearfix"></div>
</div>

</div>
</div>
</div>

</div>

<style>
    .carousel {
        height:420px;
    }
</style>

@endsection