<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Withdrow;
use App\Models\User;
use App\Models\Article;
use App\Models\Setting;
use Session;
use Auth;
class UserProfileController extends Controller
{

// public function show(){ 
//     $data =Auth::user()->first();
//     return view('writer.profile.show', compact('data'));
// }


    public function edit(){
        $data =Auth::user()->first();
        $setting = Setting::get()->first();
        $earn = Article::where('userid', $data->id)->sum('articleprice');
        $withdrow = Withdrow::where('userid', $data->id)->sum('withdrow');
       $UserTotalBalance = $earn - $withdrow;
      
        return view('writer.profile',compact('data','UserTotalBalance','setting'));
        if($UserTotalBalance = ''){
            echo $UserTotalBalance = 0;
            }

    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $data =Auth::user()->first();
        // $data= new User();
        $data->fname =  $request->fname;
        $data->lname =  $request->lname;
        $data->username =  $request->username;
        $data->email =  $request->email;
        $data->phone =  $request->phone;
        $data->email_verified_at =  $request->email_verified_at;
        $data->password =  $request->password;
        $data->nid =  $request->nid;

        if($request->hasfile('image'))
        {
            $destination1 = 'assets/img/'.$data->image;
            if(File::exists($destination1))
            {
                File::delete($destination1);
            }
            $file1 = $request->file('image');
            $extention1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$extention1;
            $file1->move('assets/img/', $filename1);
            $data->image = $filename1;
        }
       
        $data->update();
        return redirect()->back()
                        ->with('success','Profile updated successfully');
    }
   
}
