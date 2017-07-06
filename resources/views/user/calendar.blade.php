 
@extends('layouts.default')

@section('content')

<?
$user = Auth::user();
?>

<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
@include('user.sections.sidebar')
      </div>
    </div>




    <div class="col-md-9">
            <div class="profile-content">
         






{!! $calendar->calendar() !!}
{!! $calendar->script() !!}




            </div>
    </div>





  </div>
</div>



@endsection