<?



echo '[';
$i=0;


$events = DB::table('event')->select('*')->where('status','public')->where('lang',\App::getLocale())->where('place_record_id','>','0')->get();
//$qr = mysqli_query($sql,"SELECT id,name,lng,lat,lookups_id,layers_id  FROM object_records $sql_where_final") or die(mysqli_error($sql));
//echo mysqli_affected_rows($sql)/2; die;
foreach($events as $event) {
//icon
	$object = file_get_contents('http://places.georgia.travel/api/?record_id='.$event->place_record_id);
	//die($object);
    $res = json_decode($object,true);

echo "[$res[record_id],'$res[name]',$res[lng], $res[lat], $i],\n";



}

echo ']';
  