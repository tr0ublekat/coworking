<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;
use App\Models\ReserveModel;
use App\Models\TestModel;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function test()
    {
        $temp = \App\Models\TestModel::all();
        return view('test', ['tests' => $temp]);
    }

    public function review()
    {
        $reviews = new ReviewModel();
        return view('review', ['reviews' => $reviews->all()]);
    }

    public function review_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:10|max:500',
        ]);

        $review = new ReviewModel();
        $review->email = $request->input(key: 'email');
        $review->subject = $request->input(key: 'subject');
        $review->message = $request->input(key: 'message');

        $review->save();

        return redirect()->route('review');
    }

    public function reserve()
    {
        $reserves = ReserveModel::all();
        return view('reserve', ['reserves' => $reserves]);
    }

    public function reserve_check(Request $request)
    {
        $valid = $request->validate([
            'userdate' => 'required',
            'usertime' => 'required',
            'userplace' => 'required',
        ]);

        $reserve = new ReserveModel();
        $reserve->data = $request->input('userdate');
        $reserve->reserve_time = $request->input('usertime');
        $reserve->slot_id = $request->input('userplace');
        $reserve->UIDs = $request->input('userids');

        $reserve->save();

        return redirect()->route('reserve');
    }

    public function reserve_check_2(Request $request)
    {
        $valid = $request->validate([
            'userdate' => 'required',
            'userids' => 'required',
            'userplace' => 'required',
        ]);

        $userdate = $request->input('userdate');
        $userids = $request->input('userids');
        $userplace = $request->input('userplace');

        $usertimes = $request->input('usertime');

        if ($usertimes == 0) {
            return redirect()->route('reserve');
        }

        foreach ($usertimes as $usertime) {
            $reserve = new ReserveModel();
            $reserve->data = $userdate;
            $reserve->reserve_time = $usertime;
            $reserve->slot_id = $userplace;
            $reserve->UIDs = $userids;

            $reserve->save();
        }

        return redirect()->route('reserve');
    }

    public function save(Request $request)
    {
        $userdate = $request->input('selected_date');
        $userplace = $request->input('selected_place');
        return view('reserve', ['userdate' => $userdate, 'userplace' => $userplace, 'reserves' => ReserveModel::all()]);
    }
}
