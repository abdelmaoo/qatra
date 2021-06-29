<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

use Image;

class UserController extends Controller
{

    //    public function __construct()
    //    {
    //        $this->middleware('auth:user');
    //    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //    public function index()
    //    {
    //
    //        return view('home');
    //    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',
                    '<=',
                    $request->end
                )
                ->get(['id', 'title', 'start', 'end', 'count']);
            return response()->json($data);
        }
        return view('dashboard.user.full-calender');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'update') {
                $event = Event::find($request->id)->update([
                    'count'=>$request->count
                ]);

                return response()->json($event);
            }
        }
    }

    function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users',
            'prenom' => 'required',
            'region' => 'required',
            'groupe_sanguin' => 'required',
            'numero_de_telephone' => 'required',
            'password' => 'required|min:5|max:30',
            'password-confirm' => 'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->prenom = $request->prenom;
        $user->region = $request->region;
        $user->groupe_sanguin = $request->groupe_sanguin;
        $user->numero_de_telephone = $request->numero_de_telephone;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if ($save && Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.home');
        } else {
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30',

        ], [
            'email.exists' => 'This email does not exist on users table'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('web')->user()->IsBan == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('user.login')->with('fail', ' Oops, You been banned');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('user.login')->with('fail', ' Oops, wrong password ');
        }
    }





    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }


<<<<<<< HEAD
    // public function update(UpdateProfileRequest $request)
    // {

    //     $user = Auth::guard('web')->user();

    //     $data = request()->validate([
    //         'name' => 'required',
    //         'prenom' => 'required',
    //         'region' => 'required',
    //         'numero_de_telephone' => 'required',
    //         'adresse' => 'required',
    //         'allergies' => 'required',
    //         'birthdate' => 'required',
    //     ]);

        // if (request('image')) {
        //     $imagePath = request('image')->store('profilePictures', 'public');
        //     $image = Image::make(public_path("storage/{$imagePath}"))->fit(480, 480);
        //     $image->save();
        // }
        // dd($data);
        // DB::table('users')->where('username', Auth::user()->username)->update(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));

    //     return redirect()->back()->with('message', 'You have changed your profile successfully ');
    // }

=======
    
>>>>>>> commit
    function notifications()
    {
        $data = array(DB::table('notifications')
            ->where('groupe_sanguin', (Auth::guard('web')->user()->groupe_sanguin))
            // ->where('region', (Auth::guard('web')->user()->region))
            ->get());

        return view('dashboard.user.notifications', compact('data'));
    }

    function edit(User $user)
    {
        return view('dashboard.user.edit');
    }

    public function reserve(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'count']);
            return response()->json($data);
        }
        return view('dashboard.user.calendar');
    }

    function updateInfos()
<<<<<<< HEAD
    {
        $data = request()->validate([
            'name' => 'required',
            'prenom' => 'required',
            'region' => 'required',
            'numero_de_telephone' => 'required',
            'adresse' => 'required',
            'allergies' => 'required',
            'birthdate' => 'required',
        ]);

        DB::table('users')->where('username', Auth::user()->username)->update($data);
=======
     {
         $data = request()->validate([
             'name' => 'required',
             'prenom' => 'required',
             'region' => 'required',
             'numero_de_telephone' => 'required',
             'groupe_sanguin' => 'required',
             'adresse' => 'required',
            ]);
          
            Auth::user()->update($data);
         DB::table('users')->where('username', Auth::user()->username)->update($data);

         return redirect('user/home');
     }

   
   
>>>>>>> commit

}
