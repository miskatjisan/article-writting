<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Withdrow;
use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;

class WithdrowController extends Controller
{
    public function MakeWriterWithdrow(){
        $data =Auth::user();
        $setting = Setting::get()->first();
        $withdrows = Withdrow::all()->where('userid', $data->id);
       return view('writer.withdrow',compact('data','withdrows','setting'));
    }

    public function SaveWithdrow(Request $request){
        $request->validate([
            'userid' => 'required',
            'username' => 'required',
            'email' => 'required',
            'withdrow' => 'required',
            'currency' => 'required',
        ]);

        $data =Auth::user()->first();
        $earn = Article::where('userid', $data->id)->sum('articleprice');
        $withdrow = Withdrow::where('userid', $data->id)->sum('withdrow');
       $UserTotalBalance = $earn - $withdrow;

        if($UserTotalBalance < $request->withdrow){
            return redirect()->route('withdrow')->with('error','You must be enter less amount number from your total earning.');
        }else{
        $input = $request->all();
        Withdrow::create($input);

        return redirect()->route('withdrow')->with('success','Your Withdrow Request Send successfully.');

    }

    }

    public function index()
        {
            $withdrows = Withdrow::latest()->paginate(5);
        
            return view('admin.withdrows.index',compact('withdrows'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function destroy(Withdrow $withdrow)
        {
            $withdrow->delete();
         
            return redirect()->route('withdrows.index')->with('success','Withdrow deleted successfully');
        }



}
