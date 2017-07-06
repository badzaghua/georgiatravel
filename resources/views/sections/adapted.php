<?

if(null!=Input::get('fontcolor')) session(['fontcolor' => Input::get('fontcolor')]);
if(null!=Input::get('backgroundcolor')) session(['backgroundcolor' => Input::get('backgroundcolor')]);
// if(null!=Input::get('fontsize')) session(['fontsize' => Input::get('fontsize')]);


if(null!=session('fontcolor')) echo "* { color: ".session('fontcolor')." !important }";
if(null!=session('backgroundcolor')) echo "div, footer { background-color: ".session('backgroundcolor')." !important }";
// if(null!=session('fontsize')) echo "* { font-size: ".session('fontsize')." !important }";