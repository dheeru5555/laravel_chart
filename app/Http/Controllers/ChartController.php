<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controller as BaseController;

class ChartController extends BaseController
{
   public function viewChart()
   {   
       $post = DB::table('chart_data')->paginate(5);

       return view("chart", ["post"=>$post]);
   
       //return view("blog", compact("posts"));
   }
   public function createStudentData(Request $request)
   {
        return view('addChart');
   }

   public function storeStudentData(Request $request)
   {
        $data = array(
          'student_name'=> $request->post('name'),
          'student_subject' =>$request->post('subject'),
          'student_marks'=> $request->post('marks')
        );

        $post = DB::table('chart_data')->insert($data);
        return redirect('chart')->with('success', 'The Data Inserted');
   }

   public function deleteStudentData(Request $request)
   {
        $deleteID = $request->post('deleteID');
        $post = DB::table('chart_data')->where('id', '=', $deleteID)->delete();
        if($post)
        {
            return redirect('chart')->with('success', 'The Data Delete');
        }
        else
        {
            return redirect('chart')->with('error', 'Cant not Delete');
        }
   }

   public function showStatics()
   {
      $post = DB::table('chart_data')->get('*')->toArray();
      foreach($post as $row)
       {
          $data[] = array
           (
            'label'=>$row->student_name,
            'y'=>$row->student_marks
           ); 
       }
      return view('statics',['data' => $data]);
   }
}
