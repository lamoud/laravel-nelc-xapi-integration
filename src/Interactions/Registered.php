<?php

namespace Lamoud\LaravelNelcXapiIntegration\Interactions;

use Illuminate\Support\Facades\App;

class Registered
{

    protected $platform_in_arabic;
    protected $platform_in_english;
    protected $platform;
    protected $lang;

    public function __construct()
    {
        $this->platform_in_arabic = config('platform_in_arabic');
        $this->platform_in_english = config('platform_in_english');
        $this->platform = App::getLocale() === 'ar' ? $this->platform_in_arabic : $this->platform_in_english;
        $this->lang = App::getLocale() === 'ar' ? 'ar-SA' : 'en-US';

    }

    public function Send( $actor, $actorEmail, $courseId, $courseTitle, $courseDesc, $instructor, $instructorEmail ){

        $data = array(
            'actor' => array(
                        'name' => $actor,
                        'mbox'  => 'mailto:'.$actorEmail,
                        'objectType' => 'Agent',
                    ),
            'verb' => array(
                        'id' => 'http://adlnet.gov/expapi/verbs/registered',
                        'display' => array('en-US' => 'registered') 
                    ),
            'object' => array(
                            'id'=> $courseId,
                            'definition' => array(
                                'name' => array($this->lang => $courseTitle),
                                'description' => array($this->lang => $courseDesc),
                                'type' => 'https://w3id.org/xapi/cmi5/activitytype/course'
                            ),
                            'objectType' => 'Activity',
                        ),
            'context' => array(
                            'instructor' => array(
                                'name' => $instructor,
                                'mbox' => 'mailto:'.$instructorEmail,
                            ),
                            'platform' => $this->platform,
                            'language' => $this->lang,
                            "extensions" => array(
                                "https://nelc.gov.sa/extensions/platform" => array(
                                    "name" => array(
                                        "ar-SA" => $this->platform_in_arabic,
                                        "en-US" => $this->platform_in_english
                                    )
                                )
                            )
                        ),
            'timestamp' => date('Y-m-d\TH:i:s'.substr((string)microtime(), 1, 4).'\Z')
        );

        return $data;
    }
    
}