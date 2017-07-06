<?
$user = Auth::user();
?>
@extends('layouts.default')

@section('content')
@section('title',$user->name)



<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
@include('user.sections.sidebar')
      </div>
    </div>




    <div class="col-md-9">
            <div class="profile-content">
              
              
              

<?
$saves = \App\Models\User_safe::where('user_id',$user->id)->paginate(10);
?>


@foreach($saves as $save)
    <div class="post-panel">
        <div class="col-xs-12 col-sm-6 col-lg-4 col-md-4">
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="col-md-12">
              
                <a href="{{ $save->href }}">
                    <img src="{{ $save->image }}/230x150">
                    </a>
              
              <div class="post-style" align="center">
                <a href="{{ $save->href }}"><h4>{{ str_limit($save->title,50) }}</h4></a>
                
                              <div class="author">
    <i class="fa fa-newspaper-o" title="Category"></i> {{ trans("lang.$save->type") }}</a>

</div>
<form action="/user/unsave" method="get">
    {{ csrf_field() }}
    <input type="hidden" name="type" value="{{  $save->type }}">
    <input type="hidden" name="object_id" value="{{  $save->object_id }}">
    <button type="submit" class="btn btn-default btn-xs unsave"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>{{ trans('lang.unsave') }}</button>
</form>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
@endforeach

<div class="container text-center">
<?php echo $saves->render(); ?>
</div>








            </div>
    </div>





  </div>
</div>




<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
    position: initial;
	}
</style>

@endsection




