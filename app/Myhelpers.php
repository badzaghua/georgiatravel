<?php

use App\Models\Upload;





function Baseurl($url) {  
    $url = "/".$url;
    $url = str_replace("//","/",$url);
    $url = Urltrans($url);    
    $url = url(\App::getLocale().$url);
    return $url;
}


function Prefixedurl($result,$type=null) {
if(null!=$type) {
if($type=='experience') $prefix = "experience";
if($type=='article') $prefix = "article";
if($type=='event') $prefix = "event";
if($type=='region') $prefix = null;
if($type=='town') $prefix = $result->parent->title;
if($type=='sight') $prefix = $result->parent->parent->title.'/'.$result->parent->title;
} else {
    $prefix = null;
}
$prefixedurl = Baseurl($prefix.'/'.$result->slug);
return $prefixedurl;
}






function Imagepath($image) { 
          $image = Upload::find($image);
          if($image) {
          $image = $image->path();
            return $image;  
    }
    else {
        return env('DEFAULT_IMAGE',"nothing");
    }

}



function Filepath($file) { 
          $file = Upload::find($file);
          if($file) {
          $file = $file->path();
            return $file;  
    }
    else {
        return "No file found";
    }

}

function Language() {
    $locale = \App::getLocale()=='en' ? 'en_US' : \App::getLocale();
    $languages = array('en_US'=>1,'ru_RU'=>2,'ka_GE'=>3);
    $language = $languages[$locale];
    return $language;
}


function LanguageTitle() {
    $languageTitles = array('en_US'=>'English','ru_RU'=>'Русский','ka_GE'=>'ქართული ');
    $languageTitle = $languageTitles[\App::getLocale()];
    return $languageTitle;
}


function LanguageLocale($id) {
    $languageLocales = array(null,'en_US','ru_RU','ka_GE');
    $languageLocale = $languageLocales[$id];
    return $languageLocale;
}


function LanguageShortLocale($id) {
    $languageLocales = array(null,'en','ru','ge');
    $languageLocale = $languageLocales[$id];
    return $languageLocale;
}


function TranslationJson($prefix=null,$model=null,$id=null) {
    if(null!==$model) {
    $translationArray = array('en_US'=>url("/en_US"),'ka_GE'=>url("/ka_GE"),'ru_RU'=>url("/ru_RU"));
    
    $modelfull = "\App\Models\\$model";    
    $currObject =  $modelfull::where('id',$id)->first();
    $translations = $modelfull::where('id',$id)->orWhere('translation',$id)->orWhere('id',$currObject->translation)->get();
    foreach($translations as $translation) {
        $languageLocale = LanguageLocale($translation->lang);
        
        $newprefix=$prefix;
        if($model=='Sightseeing') $newprefix = $translation->parent->parent->slug.'/'.$translation->parent->slug;
        if($model=='Town') $newprefix = $translation->parent->slug;
        if(null!==$newprefix) $newprefix .= '/';
        

        $translationArray[$languageLocale] = url(Urltrans('/'.$languageLocale.'/'.$newprefix.$translation->slug,$languageLocale));
    }} else     {
        $translationArray = array('en_US'=>url(Urltrans("/en_US/$prefix","en_US")),'ka_GE'=>url(Urltrans("/ka_GE/$prefix","ka_GE")),'ru_RU'=>url(Urltrans("/ru_RU/$prefix","ru_RU")));
    }
    $translationJson = json_encode($translationArray);
    return $translationJson;
}





function ArticleFormatting($testos) {

    $testop = str_replace(array('[',']'),array('<','>'),$testos);
    $testoa = explode("\n", $testop);
    //escape each line 
    foreach($testoa as $k=>$testo){
        $testoa[$k] = e($testo);
    }
    //implode each line in an array
    $teston = "<p>".implode("</p>\n<p>", $testoa)."</p>\n";

    return $teston;
}




function Urltrans($url,$tolang=null) {
    
    if(null==$tolang) $tolang = \App::getLocale();
    
    $params['en_US']['georgia'] = 'georgia';
    $params['en_US']['events'] = 'events';
    $params['en_US']['event'] = 'event';
    $params['en_US']['experiences'] = 'experiences';
    $params['en_US']['experience'] = 'experience';
    $params['en_US']['articles'] = 'articles';
    $params['en_US']['article'] = 'article';
    $params['en_US']['regions'] = 'regions';
    $params['en_US']['region'] = 'region';

    
    
    $params['ru_RU']['georgia'] = 'грузия';
    $params['ru_RU']['events'] = 'мероприятия';
    $params['ru_RU']['event'] = 'мероприятия';
    $params['ru_RU']['experiences'] = 'чем-заняться';
    $params['ru_RU']['experience'] = 'чем-заняться';
    $params['ru_RU']['articles'] = 'журнал';
    $params['ru_RU']['article'] = 'журнал';
    $params['ru_RU']['regions'] = 'куда-поехать';
    $params['ru_RU']['region'] = 'куда-поехать';

    
    
    $params['ka_GE']['georgia'] = 'საქართველო';
    $params['ka_GE']['events'] = 'ივენთები';
    $params['ka_GE']['event'] = 'ივენთი';
    $params['ka_GE']['experiences'] = 'აქტივობები';
    $params['ka_GE']['experience'] = 'აქტივობა';
    $params['ka_GE']['articles'] = 'ჟურნალი';
    $params['ka_GE']['article'] = 'სტატია';
    $params['ka_GE']['regions'] = 'მიმართულებები';
    $params['ka_GE']['region'] = 'მიმართულება';

    


    $url = str_replace($params['en_US'],$params[$tolang],$url);

    return $url;
    
}









function Ogimagepath($id=false) {
    $settings = \App\Models\Setting::first();
    if($id) {
        $ogimagepath = Imagepath($id);
    } else {
        $ogimagepath = Imagepath($settings->default_og_image);
    }
    
    return $ogimagepath;
}


function Ogdescription($content=false) {
    $settings = \App\Models\Setting::first();
    if($content) {
        $ogdescription = str_limit(strip_tags($content),300);
    } else {
        $ogdescription = $settings->description;
    }
    return $ogdescription;
}








function SaveExists($type,$object_id) {
    if(!Auth::check()) { 
        return false;
    } else {
            $user = Auth::user();
            $exists = \App\Models\User_safe::where('user_id',$user->id)->where('type',$type)->where('object_id',$object_id)->get();
            if(count($exists)) return true;
            else return false;
}}




function Countries() {
    $countries = array("","Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        $countries = array_combine($countries,$countries);
        return $countries;
}