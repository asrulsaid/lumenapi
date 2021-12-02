<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function getFeedbackAll(Request $request){
        if ($request->has('sort')) {
            $sortOrder = $request->input('sort');
            $data = Feedback::orderBy('created_at', $sortOrder)->get();
            return response()->json(['status' => 'Success', 'data' => $data]);
        }
     
        $data = Feedback::all();
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
    
    public function search(Request $request){
        $user = $request->input('user');
        $date = $request->input('date');

        $data = Feedback::whereDate('created_at', $date)->orWhere('id_user', $user)->get();

        return response()->json(['status' => 'Success', 'data' => $data]);
    }

}
