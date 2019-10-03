<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Rating;
use App\Ratingdetail;
use App\Language;
use App\Vote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getCampaigns()
    {
        $campaigns = Campaign::all();
        $ratings = Rating::all();
        $langs = Language::all();
        return view('campaigns', compact('campaigns', 'ratings', 'langs'));
    }
    public function newCampaign(Request $request)
    {
        $campaign = new Campaign;
        $langs = Language::all();
        foreach($langs as $lang)
        {
            $nameProperty = 'name_' . $lang->code;
            $campaign->setTranslation('name', $lang->code, $request->$nameProperty);

            $questionProperty = 'question_' . $lang->code;
            $campaign->setTranslation('question', $lang->code, $request->$questionProperty);

            $cbQuestionProperty = 'cbquestion_' . $lang->code;
            $campaign->setTranslation('comingback', $lang->code, $request->$cbQuestionProperty);
        }
        $campaign->rating_id = $request->rating_id;
        $campaign->save();
         return redirect()->back()->with('status', 'Your campaign have been successfully added.'); 

    }
    public function getCampaignDetails(Request $request)
    {

        $campaign = Campaign::find($request->campaign_id);
        return $campaign->toJson();
    }
    public function editCampaignDetails(Request $request)
    {
        $campaign = Campaign::find($request->campaign_id);
        $campaign->rating_id = $request->rating_id;
        $langs = Language::all();
        foreach($langs as $lang)
        {
            $nameProperty = 'edit_name_' . $lang->code;
            $campaign->setTranslation('name', $lang->code, $request->$nameProperty);

            $questionProperty = 'edit_question_' . $lang->code;
            $campaign->setTranslation('question', $lang->code, $request->$questionProperty);

            $cbQuestionProperty = 'edit_cbquestion_' . $lang->code;
            $campaign->setTranslation('comingback', $lang->code, $request->$cbQuestionProperty);
        }
        $campaign->save();
        return redirect()->back()->with('status', 'Your campaign have been successfully edited.'); 
    }
    public function deleteCampaignDetails($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();
        return redirect()->back()->with('status', 'Your campaign have been successfully deleted.'); 
    }
    public function getRatings()
    {
        $ratings = Rating::all();
        $langs = Language::all();
        return view('ratings', compact('ratings', 'langs'));
    }
    public function newRating(Request $request)
    {
        $langs = Language::all();
        $rating = new Rating;
        $rating->description = $request->description;
        $rating->save();

        for($i = 1; $i <= 4; $i++) {
            $detail = new Ratingdetail;
            $detail->rating_id = $rating->id;
            $iconName = 'icon' . $i;
            $detail->content = $request->$iconName;
             foreach($langs as $lang)
            {
                $nameProperty = "icon${i}_value_" . $lang->code;
                $detail->setTranslation('value', $lang->code, $request->$nameProperty);
            }
            $detail->save();
        }

        return redirect()->back()->with('status', 'Your rating have been successfully added.'); 

    }
    public function getRatingDetails(Request $request)
    {
        $rating = Rating::with(["ratingdetails"])->find($request->rating_id);
        return $rating->toJson();
    }
    public function editRating(Request $request)
    {
        $rating = Rating::find($request->rating_id);
        $rating->description = $request->edit_description;
        $rating->save();

        $details = Ratingdetail::where('rating_id', $request->rating_id);
        $details->delete();

        $langs = Language::all();
        for($i = 1; $i <= 4; $i++){
             $detail = new Ratingdetail;
            $detail->rating_id = $rating->id;
            $iconName = 'edit_icon' . $i;
            $detail->content = $request->$iconName;
             foreach($langs as $lang)
            {
                $nameProperty = "edit_icon${i}_value_" . $lang->code;
                $detail->setTranslation('value', $lang->code, $request->$nameProperty);
            }
            $detail->save();
        }
        return redirect()->back()->with('status', 'Your rating have been successfully edited.');

    }
    public function deleteRating($id)
    {
        Rating::find($id)->delete();
        Ratingdetail::where('rating_id', $id)->delete();
        return redirect()->back()->with('status', 'Your rating have been successfully deleted.');
    }
    public function statistics($id = '')
    {
        if($id == ''){
            $campaign = Campaign::latest()->first();
            $id = $campaign->id;
        }
        $campaign = Campaign::find($id);
        $campaigns = Campaign::all();

        $mois = array();
        $mois[1] = 'Janvier';
        $mois[2] = 'Février';
        $mois[3] = 'Mars';
        $mois[4] = 'Avril';
        $mois[5] = 'Mai';
        $mois[6] = 'Juin';
        $mois[7] = 'Juillet';
        $mois[8] = 'Août';
        $mois[9] = 'Septembre';
        $mois[10] = 'Octobre';
        $mois[11] = 'Novembre';
        $mois[12] = 'Décembre';

        for ($i = 0; $i <= 12; $i++) {
            $month = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
            $year = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
            $months[] = $month;
            $votes[] = $this->getStatsMonth($month, $year, $id);
            $votesCount[] = $this->getMonthVotesCount($month, $year, $id);
        }
        return view('statistics', compact('campaign', 'campaigns', 'id', 'months', 'mois', 'votes', 'votesCount'));
    }
    public function languages()
    {
        $languages = Language::all();
        return view('languages', compact('languages'));
    }
    public function deleteLanguage($id)
    {
        Language::find($id)->delete();
        return redirect()->back()->with('status', 'Your language have been successfully deleted.');
    }
    public function newLanguage(Request $request)
    {
        $language = new Language;
        $language->name = $request->name;
        $language->code = $request->code;
        $language->flag = $request->flag;
        $language->save();
        return redirect()->back()->with('status', 'Your language have been successfully added.');
    }

    ############## private functions
   private function getStatsMonth($month, $year, $id)
   {
        $votes = Vote::where('campaign_id', $id)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        $count = 0;
        $total = 0;
        foreach($votes as $vote){
            $cote = 100 + 25  - ($vote->rate * 25);
            $total += $cote;
            $count++;
        }
        if($count > 0) {
            return $total / $count;
        }
   }
   private function getMonthVotesCount($month, $year, $id)
   {
        $votes = Vote::where('campaign_id', $id)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        $count = 0;
        $total = 0;
        foreach($votes as $vote){
  
            $count++;
        }
        
            return $count;
        
   }
}
