 
@extends('layouts.default')

@section('content')

<?
$user = Auth::user();
?>
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
         
{{ Form::open(array('url' => Baseurl('/user/editUser'),'class'=>'form-horizontal')) }}
<fieldset>











<!-- Form Name -->
<legend>Edit Profile</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Full Name</label>  
  <div class="col-md-4">
  <input id="Name" name="name" type="text" placeholder="Name" class="form-control input-md" value="{{$user->name }}">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Age">Age</label>  
  <div class="col-md-4">
  <input id="Age" name="age" type="text" placeholder="Age" class="form-control input-md" value="{{ $user->age }}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>  
  <div class="col-md-4">


  {{ Form::select('gender',['','male','female'],$user->gender,['id'=>'gender','class'=>'form-control']) }}
  </div>
  
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Interests">Interests</label>  
  <div class="col-md-4">
  <input id="Interests" name="interests" type="text" placeholder="Interests" class="form-control input-md" value="{{ $user->interests }}">
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="country">Country</label>
  <div class="col-md-4">


    {{ Form::select('country',Countries(),$user->country,['id'=>'country','class'=>'form-control']) }}



    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>
  <div class="col-md-4">
    <input id="city" name="city" placeholder="" class="form-control input-md" value="{{ $user->city }}"> 
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-success">Update</button>
  </div>
</div>

</fieldset>
{{ Form::close() }}




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