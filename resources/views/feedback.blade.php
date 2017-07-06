<?php
$translationJson = translationJson('georgia');   
?>
@extends('layouts.default')

@section('title',trans('lang.contact'))
@section('content')


<div class="container page-wrap">
<h1 style="padding:10px 0 30px 0;">{{ trans('lang.feedback') }}</h1>
        <!-- Products Row -->
<!-- content -->





<div class="row">



@if(isset($submit))
<div class="alert alert-success">
  <strong>{{ trans('lang.sent') }}</strong>{{ trans('lang.sent_extended') }}
</div>

@endif







<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="{{ Baseurl("feedback/send") }}" method="post">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name"   required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Your Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email"   required="required"/></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Department</label>
                            <select name="department" id="subject" name="subject" class="form-control" >
                                <option value="sitefeedback">Site Feedback</option>
                                <option value="reportproblem">Report a Problem</option>
                                <option value="requestmap">Request map</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" 
                                placeholder="Message" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Georgian National Tourism Administration.</strong><br>
                <p>4 Sanapiro Street. 0105, Tbilisi</p>
                <p><strong>Hotline 24/7</strong></p>
                <p>0 800 800 909</p>
                <abbr title="Phone">
                    P:</abbr>
                +995 32 243 69 99<br>
                <abbr title="Fax">
                    F:</abbr>
                +995 32 243 69 87<br>
                <abbr title="Viber">
                    V:</abbr>
                +995 591 96 50 02
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">feedback@georgia.travel</a>
            </address>
            </form>
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