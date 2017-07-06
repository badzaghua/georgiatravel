 
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






{{ Form::open(array('url' => Baseurl('/user/editSettings'),'class'=>'form-horizontal')) }}

<fieldset>

<!-- Form Name -->
<legend>{{ trans('lang.accountsettings') }}</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="E-mail" class="form-control input-md" value="{{ $user->email }}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">{{ trans('lang.password') }}</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="{{ trans('lang.password') }}" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">{{ trans('lang.reenter_password') }}</label>  
  <div class="col-md-4">
  <input id="password2" name="password2" type="password" placeholder="{{ trans('lang.reenter_password') }}" class="form-control input-md">
  <br>
    <span class="passwordhint" style="display:none">Passwords do not match</span>
  </div>

</div>

<!-- Button (Double) -->
<div class="form-group">
  <div class="col-md-4">
    <button id="submitSettings" name="button1id" class="btn btn-success">{{ trans('lang.update') }}</button>
    <a href="{{ Baseurl('/user/deleteAccount') }}">{{ trans('lang.deleteaccount') }}</a>
  </div>
</div>

</fieldset>
{{ Form::close() }}




<script>
$("#submitSettings").click(function(e){
  e.preventDefault();
  var password = $("#password").val(); 
  var password2 = $("#password2").val();
if(password!=password2) $('.passwordhint').show();
else {
  $('#submitSettings').unbind('click');
  $(this).trigger('click');
}
});
</script>



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