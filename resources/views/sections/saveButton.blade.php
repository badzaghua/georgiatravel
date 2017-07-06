@if(!Auth::check())
<button data-toggle="modal" data-target="#login-modal" class="btn btn-default btn-sm save"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>{{ trans('lang.save') }}</button>
@elseif(SaveExists($type,$id))
<form action="/user/unsave" method="post" id="unsave-form">
    {{ csrf_field() }}
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="object_id" value="{{ $id }}">
    <button id="unsave" type="submit" class="btn btn-default btn-sm unsave"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>{{ trans('lang.unsave') }}</button>
</form>
@else
<form action="/user/save" method="post" id="save-form">
    {{ csrf_field() }}
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="object_id" value="{{ $id }}">
    <input type="hidden" name="title" value="{{ $title }}">
    <input type="hidden" name="image" value="{{ $image }}">
    <input type="hidden" name="href" value="{{ $href }}">
    <button id="save" type="submit" class="btn btn-default btn-sm save"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>{{ trans('lang.save') }}</button>
</form>
@endif







<script>
$("#save").click(function(e){
    e.preventDefault();
var datastring = $("#save-form").serialize();
$.ajax({
    type: "POST",
    url: "/user/save",
    data: datastring,
    success: function(data) {
       $("#save").html("{{ trans('lang.done') }}");
       $("#save").prop('disabled', true);
    },
    error: function(data) {
        alert('error saving data');
        console.log(data);
    }
});     
});




$("#unsave").click(function(e){
    e.preventDefault();
var datastring = $("#unsave-form").serialize();
$.ajax({
    type: "POST",
    url: "/user/unsave",
    data: datastring,
    success: function(data) {
       $("#unsave").html("{{ trans('lang.done') }}");
       $("#unsave").prop('disabled', true);
    },
    error: function(data) {
        alert('error unsaving data');
        console.log(data);
    }
});     
});


</script>