<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Campaign;
use App\Rating;
use App\Vote;
use App\Language;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function campaign($id = '', $language = '')
    {
        if($id == '')
    	{
    		$campaign = Campaign::latest()->first();
    		$id = $campaign->id;
    	}
        if($language == '')
        {
            $language = 'fr';
        }
        $lang = Language::all();
        app()->setLocale($language);

        $selectedLanguage = Language::where('code', $language)->first();
        

    	$campaign = Campaign::find($id);
    	$ratings = Rating::find($campaign->rating_id)->ratingdetails;

    	return view('campaign', compact('campaign', 'ratings', 'id', 'lang', 'selectedLanguage'));
    } 
    public function vote($campaign_id, $id)
    {
    	$vote = new Vote;
    	$vote->campaign_id = $campaign_id;
    	$vote->rate = $id;
    	$vote->save();
    	$vote_id = $vote->id;
    	$campaign = Campaign::find($campaign_id);
    	return view('comingback', compact('campaign', 'vote_id'));
    }
    public function comingBack($vote_id, $way)
    {
    	$vote = Vote::find($vote_id);
    	$vote->comingback = $way;
    	$vote->save();
    	return view('thankyou', compact('vote_id'));
    }
    public function createCampaign()
    {
        $campaign = new Campaign;

        $campaign->setTranslation('name', 'fr', 'Toilettes');
        $campaign->setTranslation('name', 'en', 'WC');
        $campaign->setTranslation('name', 'nl', 'Toiletten');

        $campaign->setTranslation('question', 'fr', 'Est-vous satisfait(e) de la propreté des toilettes ?');
        $campaign->setTranslation('question', 'en', 'Are you satisfied with the cleanliness of the toilets ?');
        $campaign->setTranslation('question', 'nl', 'Bent u tevreden met de netheid van de toiletten ?');

        $campaign->setTranslation('comingback', 'fr', 'Pensez-vous revenir à Stardust Park ?');
        $campaign->setTranslation('comingback', 'en', 'Do you think you\'re coming back to Stardust Park ?');
        $campaign->setTranslation('comingback', 'nl', 'Denk je dat je terugkomt naar Stardust Park ?');

        $campaign->rating_id = 1;

        $campaign->save();
          
    }
    public function chooseCampaign()
    {
        $campaigns = Campaign::all();
        return  view('choose', compact('campaigns'));
    }
}
