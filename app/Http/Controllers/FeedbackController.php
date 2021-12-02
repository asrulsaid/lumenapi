<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
<<<<<<< HEAD
    public function getFeedbackAll(Request $request){
        if ($request->has('sort')) {
            $sortOrder = $request->input('sort');
            $data = Feedback::orderBy('created_at', $sortOrder)->get();
            return response()->json(['status' => 'Success', 'data' => $data]);
        }
     
        $data = Feedback::all();
        return response()->json(['status' => 'success', 'data' => $data]);
=======
    public function getFeedbackAll(){
        $data = Feedback::orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function sortFeedback(Request $request){
        $sort = $request->input('sort');
        $data = Feedback::orderBy('created_at', $sort)->get();
        return response()->json(['status' => 'Success', 'data' => $data]);
>>>>>>> cb83cabc1f812d429b09db7d7a874c38556ee4a3
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
<<<<<<< HEAD
    
    public function search(Request $request){
        $user = $request->input('user');
=======

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
>>>>>>> cb83cabc1f812d429b09db7d7a874c38556ee4a3
        $date = $request->input('date');

        $data = Feedback::whereDate('created_at', $date)->orWhere('id_user', $user)->get();

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

<<<<<<< HEAD
}
=======
}
>>>>>>> cb83cabc1f812d429b09db7d7a874c38556ee4a3
