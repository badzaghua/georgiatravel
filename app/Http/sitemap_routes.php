<?php
Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 60);



         
    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
        
        $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         
        $locales = array("en_US","ru_RU","ka_GE");
        foreach($locales as $locale)
        {
         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(URL::to(urltrans('/georgia',$locale)), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to(urltrans('/experiences',$locale)), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to(urltrans('/regions',$locale)), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to(urltrans('/events',$locale)), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to(urltrans('/articles',$locale)), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
        }
        
        




         // get all posts from db
         $experiences = \App\Models\Experience::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($experiences as $experience)
         {
            $translations =  \App\Models\Experience::where('lang','<>','1')->where('translation',$experience->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to(urltrans(Prefixedurl($translation,"experience"),$locale)));
            }
         $sitemap->add(URL::to(Urltrans(Prefixedurl($experience,"experience"),'en_US')), $experience->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
         
         
         
      
         
         
         
         
          // get all posts from db
         $regions = \App\Models\Region::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($regions as $region)
         {
            $translations =  \App\Models\region::where('lang','<>','1')->where('translation',$region->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to($translation->slug));
            }
         $sitemap->add(URL::to($region->slug), $region->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
         
         
         
          // get all posts from db
         $towns = \App\Models\Town::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($towns as $town)
         {
            $translations =  \App\Models\Town::where('lang','<>','1')->where('translation',$town->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to(Prefixedurl($translation,"town")));
            }
         $sitemap->add(URL::to(Prefixedurl($town,"town")), $town->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
         
         

              
          // get all posts from db
         $sights = \App\Models\Sightseeing::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($sights as $sight)
         {
            $translations =  \App\Models\Sightseeing::where('lang','<>','1')->where('translation',$sight->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to(Prefixedurl($translation,"sight")));
            }
         $sitemap->add(URL::to(Prefixedurl($sight,"sight")), $sight->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
                              
  
  
         // get all posts from db
         $events = \App\Models\Event::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($events as $event)
         {
            $translations =  \App\Models\Event::where('lang','<>','1')->where('translation',$event->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to(urltrans(Prefixedurl($translation,"event"),$locale)));
            }
         $sitemap->add(URL::to(Urltrans(Prefixedurl($event,"event"),'en_US')), $event->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
         
         
                
            
         
         // get all posts from db
         $articles = \App\Models\Article::where('lang',1)->get();

         // add every object to the sitemap
         foreach ($articles as $article)
         {
            $translations =  \App\Models\Article::where('lang','<>','1')->where('translation',$article->id)->get();
            $translationLinks=array();
            foreach($translations as $translation) {
                $locale = LanguageLocale($translation->lang);
                $shortLocale = LanguageShortLocale($translation->lang);
                $translationLinks[] = array('language'=>$shortLocale,'url'=>URL::to(urltrans(Prefixedurl($translation,"article"),$locale)));
            }
         $sitemap->add(URL::to(Urltrans(Prefixedurl($article,"article"),'en_US')), $article->updated_at, '0.9', 'monthly', [], null, $translationLinks); 
         }
         
         
         
         
         
         
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');

});