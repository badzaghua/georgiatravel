<?


$events = DB::table('event')->select('*')->where('place_record_id',$place_record_id)->get();

echo $venue.'<br>';

foreach($events as $event) {
	echo "<a target='_parent' href='/event/$event->name'>$event->title</a><br>";
}


?>