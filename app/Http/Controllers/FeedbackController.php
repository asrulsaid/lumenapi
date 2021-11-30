<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function getFeedbackAll(){
        $data = Feedback::orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function sortFeedback(Request $request){
        $sort = $request->input('sort');
        $data = Feedback::orderBy('created_at', $sort)->get();
        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function getFeedbackbyId($id){
        $data = Feedback::find($id);
        if (!$data){
            return response()->json(['status' => 'Failed', 'data' => 'Data not found']);
        }

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function deleteFeedback($id){
        $data = Feedback::find($id);

        if (!$data){
            return response()->json(['status' => 'Failed', 'data' => 'Data not found']);
        }

        $data -> delete();

        return response()->json(['status' => 'Success', 'data' => 'Data deleted successfully']);
    }

    public function searchUser($id_user){
        $data = Feedback::where('id_user', $id_user)->get();
        if (!$data){
            return response()->json(['status' => 'Failed', 'data' => 'Data not found']);
        }

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function searchDate($date){
        $data = Feedback::whereDate('created_at', $date)->get();

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function search(Request $request){
        $user = $request->input('user_id');
        $date = $request->input('date');

        $data = Feedback::whereDate('created_at', $date)->orWhere('id_user', $user)->get();

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

}