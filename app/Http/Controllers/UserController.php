<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\like;
use App\Models\sectionlists;
use App\Models\section_image;
use App\Models\item_image;
use App\Models\section_text;
use App\Models\boxdata;
use App\Models\biodata;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Datatables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile(Request $req)
    {
        // dd($req->all());

        $model = new profile();
        $model->name = $req->name;
        if ($req->hasfile('img')) {
            $file = $req->file('img');
            $newid = $req->file('id');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $model->image = $filename;
            $req->session()->put('img', asset('uploads/' . $filename));
        }

        $model->save();
        $autoGeneratedId = $model->id;
        $name = $model->name;
        $req->session()->put('name', $name);
        $req->session()->put('id', $autoGeneratedId);
        Profile::where('id', $autoGeneratedId)->update(['status' => 'profile page']);
        return redirect('/profile');
    }

    public function update(Request $request, $id)
    {
        $data = Profile::findOrFail($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');

        if ($request->hasFile('update-img')) {
            $file = $request->file('update-img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
        } else {
            // If the user did not change the image, keep the original image name
            $data->image = $request->input('original-image');
        }
        $data->save();
        $name = $data->name;
        // $id = $data->id;
        $autoGeneratedId = $request->session()->get('id');
        Profile::where('id', $autoGeneratedId)->update(['status' => 'Signup page']);
        $request->session()->put('signin', $id);

        // return redirect('/signup');
    }

    public function updateDraft(Request $request, $id)
    {
        // dd("reached in draft controller");
        $data = Profile::findOrFail($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');

        if ($request->hasFile('update-img')) {
            $file = $request->file('update-img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
        } else {
            // If the user did not change the image, keep the original image name
            $data->image = $request->input('original-image');
        }
        $data->save();
        $name = $data->name;
        $autoGeneratedId = $request->session()->get('id');
        Profile::where('id', $autoGeneratedId)->update(['status' => 'Signup page']);

        $request->session()->put('draft', $id);


        // return redirect('/profile');
    }
    public function SignupEmail(Request $req)
    {
        // dd('clicked on the signup button');
        $autoGeneratedId = $req->session()->get('id');
        Profile::where('id', $autoGeneratedId)->update(['status' => 'Signup with email']);
        return view('signup-email');
    }

    public function InsertMail(Request $req)
    {
        $req->validate([
            'email' => 'required|email|max:255'
        ]);

        $newEmail = $req->input('email');
        $req->session()->put('email', $newEmail);
        $existingRecord = Profile::where('emails', $newEmail)->first();

        if ($existingRecord) {
            return redirect()->back()->withErrors(['email' => 'This email already exist']);
        }

        $autoGeneratedId = $req->session()->get('id');
        $lastInsertedRecord = profile::findOrFail($autoGeneratedId);
        $lastInsertedRecord->emails = $req->email;
        $lastInsertedRecord->save();
        Profile::where('id', $autoGeneratedId)->update(['status' => 'Check inbox']);
        $existingId = $lastInsertedRecord->id;
        $existingname = $lastInsertedRecord->name;

        // Send the email
        $data = ['name' => 'abdullah'];
        Mail::send('emails.welcome', ['data' => $data, 'existingId' => $existingId], function ($mg) use ($newEmail) {
            $mg->from('admin@getdeep.app')->to($newEmail)->subject('Finish creating your Everpage account');
        });
        $req->session()->put('signin', $existingname);

        // dd(session('email'));
        return redirect('check');
    }

    public function DInsertMail(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:profile,emails',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $newEmail = $req->input('email');
        $existingRecord = Profile::where('emails', $newEmail)->first();

        $autoGeneratedId = $req->session()->get('id');
        $lastInsertedRecord = profile::findOrFail($autoGeneratedId);
        $lastInsertedRecord->emails = $req->email;
        $lastInsertedRecord->save();
        $email = $lastInsertedRecord->emails;


        Profile::where('id', $autoGeneratedId)->update(['status' => 'Check inbox']);
        $existingId = $lastInsertedRecord->id;
        // $new_email = $req->session()->get('Email');

        // Send the email
        $data = ['csrfToken' => csrf_token()];
        Mail::send('emails.welcome', $data, function ($mg) use ($newEmail) {
            $mg->from('admin@getdeep.app')->to($newEmail)->subject('Finish creating your Everpage account');
        });
        // $req->session()->put('Email', $email);

        return response()->json(['new_email' => $email, 'success' => true]);

    }
    public function CheckEmail(Request $req)
    {
        $autoGeneratedId = $req->session()->get('id');
        Profile::where('id', $autoGeneratedId)->update(['status' => 'check inbox']);
        $data = Profile::findOrFail($autoGeneratedId);
        return view('check-inbox', ['data' => $data]);
    }

    public function VerifyEmail(Request $req)
    {
        $autoGeneratedId = $req->session()->get('id');
        Profile::where('id', $autoGeneratedId)->update(['status' => 'Waiting for email verf']);
        $data = profile::findOrFail($autoGeneratedId);
        return view('waiting-verf', ['data' => $data]);
    }
    public function CompleteProfile(Request $req)
    {

        if (session()->has('signin')) {
            $email = $req->session()->get('Email');
            Profile::where('emails', $email)->update(['status' => 'complete profile']);
            return view('complete-profile', ['id' => session('signin')]);
        } else {
            $email = $req->session()->get('Email');
            Profile::where('emails', $email)->update(['status' => 'complete profile']);
            return view('complete-profile', ['id' => session('draft')]);
        }

    }

    // public function VerifiedEmail(Request $req, $id)
    // {
    //     $link = $req->input('link');
    //     $existingRecord = Profile::where('link', $link)->first();

    //     if ($existingRecord) {
    //         return response()->json(['success' => false, 'errors' => 'This address is Unavailable']);
    //     } else {
    //         return response()->json(['success' => true, 'link' => 'This address is available']);
    //     }


    //     $req->validate([
    //         'link' => 'required',
    //         'month' => 'required|numeric|min:1|max:12',
    //         'day' => 'required|numeric|min:1|max:31',
    //         'year' => 'required|numeric|min:1900|max:' . date('Y'),
    //     ]);

    //     $lastrecord = profile::findorfail($id);
    //     $data = $req->input();
    //     $link = $req->input('link');
    //     $day = $req->input('day');
    //     $month = $req->input('month');
    //     $year = $req->input('year');

    //     $dateOfBirth = Carbon::createFromFormat('Y-m-d', "$year-$month-$day");
    //     if ($lastrecord) {
    //         $lastrecord->link = $req->link;
    //         $lastrecord->date_of_birth = $dateOfBirth;
    //         $lastrecord->save();

    //         if (session()->has('signin')) {
    //             Profile::where('id', $id)->update(['status' => 'publish|Homepage']);
    //             $status = 'publish|Homepage';
    //             $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
    //             // $req->session()->put('login', $id);
    //             return redirect()->route('home');


    //         } else {
    //             Profile::where('id', $id)->update(['status' => 'draft|Homepage']);
    //             // $req->session()->put('login', $id);
    //             $status = 'draft|Homepage';
    //             $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
    //             return redirect()->route('home');

    //         }
    //     }





    // }

    public function VerifiedEmail(Request $req, $id)
    {

        $link = $req->input('url');
        $existingRecord = Profile::where('link', $link)->first();


        $validator = Validator::make($req->all(), [
            'url' => 'required|unique:profile,link',
            'month' => 'Required',
            'day' => 'required',
            'year' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()]);
        }

        $lastrecord = Profile::findorfail($id);
        $link = $req->input('url');
        $day = $req->input('day');
        $month = $req->input('month');
        $year = $req->input('year');

        $dateOfBirth = Carbon::createFromFormat('Y-m-d', "$year-$month-$day");

        if ($lastrecord) {
            $lastrecord->link = $link;
            $lastrecord->date_of_birth = $dateOfBirth;
            $lastrecord->save();

            if (session()->has('signin')) {
                $status = 'publish|Homepage';
                Profile::where('id', $id)->update(['status' => 'publish|Homepage']);
                $members = Profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
                // return redirect()->route('home');
                return response()->json(['success' => true, 'redirect' => route('home')]);

            } else {
                $status = 'draft|Homepage';
                Profile::where('id', $id)->update(['status' => 'draft|Homepage']);
                $members = Profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
                // return redirect()->route('home');
                return response()->json(['success' => true, 'redirect' => route('home')]);

            }
        }
    }

    public function HomePage(Request $req)
    {
        $autoGeneratedId = $req->session()->get('id');
        $members = profile::where('id', '!=', $autoGeneratedId)->get(['*']);
        $alldata = profile::findorfail($autoGeneratedId);
        return view('homepage', ['members' => $members, 'alldata' => $alldata]);
    }

    public function HomeEmail(Request $req)
    {

        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
            // dd($id);
            $status = 'publish|Homepage';
            $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
            $alldata = profile::findorfail($id);
            session(['abc' => now()]);
            return view('homepage', ['members' => $members, 'alldata' => $alldata]);
        } else {
            $status = 'publish|Homepage';
            $id = $req->session()->get('draft');

            $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
            $alldata = profile::findorfail($id);
            return view('homepage', ['members' => $members, 'alldata' => $alldata]);
        }

    }

    public function login(Request $req)
    {

        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
            // dd($id);
            $status = 'publish|Homepage';
            $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
            $alldata = profile::findorfail($id);
            session(['signin' => now()]);
            return view('homepage', ['members' => $members, 'alldata' => $alldata]);
        } else {
            $status = 'publish|Homepage';
            $id = $req->session()->get('draft');

            $members = profile::where('id', '!=', $id)->Where('status', '=', $status)->get(['*']);
            $alldata = profile::findorfail($id);
            return view('homepage', ['members' => $members, 'alldata' => $alldata]);

        }

    }



    public function fetchRecentRecord(Request $req)
    {

        $autoGeneratedId = $req->session()->get('id');
        $recentRecord = Profile::findOrFail($autoGeneratedId);
        $biorecord = biodata::all(['*']);
        return view('profile', compact('recentRecord', 'biorecord'));
    }
    public function question()
    {
        $questions = boxdata::all(['*']);
        return response()->json($questions);
    }

    public function BioPage(Request $req)
    {
        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
            $record = biodata::first();
            $alldata = sectionlists::all();
            $profilerecord = profile::findorfail($id);
            $sectiondata = section_text::where('profile_id', $id)->get();
            return view('bio', ['record' => $record, 'userRecord' => $profilerecord, 'alldata' => $alldata, 'sectiondata' => $sectiondata]);
        } else {
            $id = $req->session()->get('draft');
            $record = biodata::first();
            $alldata = sectionlists::all();
            $profilerecord = profile::findorfail($id);

            return view('bio', ['record' => $record, 'userRecord' => $profilerecord, 'alldata' => $alldata]);
        }

    }
    public function UserBio(Request $request, $id)
    {
        $autoGeneratedId = $request->session()->get('login');
        // dd($autoGeneratedId);
        $data = profile::findorfail($id);
        $alldata = profile::findorfail($autoGeneratedId);
        return view('verf-publicpage', ['data' => $data, 'alldata' => $alldata]);

    }

    public function SearchBio(Request $request, $link)
    {
        if (session()->has('signin')) {

            $id = $request->session()->get('signin');
            $alldata = Profile::findorfail($id);
            $data = Profile::where('link', $link)->first();
            $username = $data->name;
            $request->session()->put('name', $username);

            session()->forget('sname');

            return view('search-bio', ['data' => $data, 'alldata' => $alldata]);

        } elseif (session()->has('draft')) {
            $id = $request->session()->get('draft');
            $alldata = Profile::where('link', $link)->first();
            $username = $alldata->name;
            $request->session()->put('name', $username);

            session()->forget('sname');


            return view('search-bio', ['alldata' => $alldata]);
        } else {
            $data = Profile::where('link', $link)->first();
            $username = $data->name;
            // dd($username);
            $request->session()->put('sname', $username);
            session()->forget('name');

            return view('search-bio', ['data' => $data]);
        }

    }
    public function VerfPublic(Request $req)
    {
        if (session()->has('signin')) {

            $id = $req->session()->get('signin');
            $data = profile::findorfail($id);
            return view('user-bio', ['data' => $data]);
        } else {
            $id = $req->session()->get('draft');
            $data = profile::findorfail($id);
            return view('user-bio', ['data' => $data]);
        }

    }
    public function PublicPage(Request $request)
    {
        $autoGeneratedId = $request->session()->get('id');
        $results = profile::findorfail($autoGeneratedId);
        $record = biodata::first();
        return view('public-page', ['record' => $record, 'results' => $results]);
    }
    public function EditBio($id)
    {
        $recentRecord = profile::findorfail($id);
        $record = biodata::first();
        return view('bio', ['record' => $record, 'recentRecord' => $recentRecord]);
    }

    public function EditProfile(Request $req)
    {
        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
            $biorecord = biodata::first();
            $recentRecord = profile::findorfail($id);
            return view('edit-bio', ['biorecord' => $biorecord, 'recentRecord' => $recentRecord]);
        } else {
            $id = $req->session()->get('draft');
            $biorecord = biodata::first();
            $recentRecord = profile::findorfail($id);
            return view('edit-bio', ['biorecord' => $biorecord, 'recentRecord' => $recentRecord]);
        }
    }
    public function DEditProfile(Request $req, $id)
    {
        $biorecord = biodata::first();
        $recentRecord = profile::findorfail($id);
        return view('edit-bio', ['biorecord' => $biorecord, 'recentRecord' => $recentRecord]);
    }

    public function uptoDate(Request $request, $id)
    {
        // dd($id);
        $record = biodata::first();
        $data = Profile::findOrFail($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $status = 'publish|Homepage';
        $data->status = $status;
        $existingname = $data->name;


        if ($request->hasFile('update-img')) {
            $file = $request->file('update-img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
            // $request->session()->put('imgage', asset('uploads/' . $filename));
        } else {
            $data->image = $request->input('original-image');
        }
        $data->save();
        // session()->forget('draft');
        session()->forget('edit');
        return redirect()->route('bio');

    }

    public function DuptoDate(Request $request, $id)
    {
        $record = biodata::first();
        $data = Profile::findOrFail($id);
        $data->name = $request->input('name');
        $data->edit = '1';
        $data->description = $request->input('description');

        if ($request->hasFile('update-img')) {
            $file = $request->file('update-img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $data->image = $filename;
            $request->session()->put('image', asset('uploads/' . $filename));
        } else {
            // If the user did not change the image, keep the original image name
            $data->image = $request->input('original-image');
        }

        $data->save();
        $email = $data->emails;
        $edit_id = '1';
        $result = Profile::where('id', $id)->where('edit', $edit_id)->first();
        if ($result) {
            $request->session()->put('edit', true);
            return redirect()->route('bio');
        }

    }

    public function SearchProfile(Request $request)
    {

        $query = $request->input('query');
        $record = biodata::first();
        $results = Profile::where('name', 'like', "%$query%")->get();
        return response()->json($results);
    }

    public function SignIn(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
        $newEmail = $req->input('email');
        $existingRecord = Profile::where('emails', $newEmail)->first();
        if (!$existingRecord) {
            return response()->json(['success' => false, 'message' => 'This email not registered or invalid']);
        }
        $existingId = $existingRecord->id;
        $status = 'publish|Homepage';
        $editValue = $existingRecord->edit;
        $draft_status = 'draft|Homepage';
        $existingname = $existingRecord->name;
        $data = ['csrfToken' => csrf_token()];
        Mail::send('emails.signin', $data, function ($mg) use ($newEmail) {
            $mg->from('admin@getdeep.app')->to($newEmail)->subject('Sign in to Everpage');
        });

        if ($existingRecord->status === $status) {
            $req->session()->put('signin', $existingId);
            $req->session()->put('login', $existingId);
        } elseif ($existingRecord->status === $draft_status) {
            $req->session()->put('draft', $existingId);
            $req->session()->put('login', $existingId);
        }

        if ($editValue === '1') {
            $req->session()->put('edit', true);
        }
        return response()->json(['user_email' => $newEmail, 'success' => true]);
    }
    public function ReplaceSession(Request $req)
    {
        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
            $status = 'publish|Homepage';
            $profile = profile::findorfail($id);
            $profile->edit = '0';
            $existingname = $profile->name;
            $profile->status = $status;
            $profile->save();

            session()->forget('draft');
            session()->forget('edit');

            return redirect()->route('home');

        } else {
            $id = $req->session()->get('draft');
            $status = 'publish|Homepage';
            $profile = profile::findorfail($id);
            $profile->edit = '0';
            $existingname = $profile->name;
            $profile->status = $status;
            $profile->save();

            session()->forget('draft');
            $req->session()->put('signin', $id);
            session()->forget('edit');
            return redirect()->route('home');
        }


    }

    public function LikedUser(Request $req, $name)
    {
        if (session()->has('signin') || session()->has('draft')) {
            $data = Profile::where('link', '=', $name)->first();

            $id = $req->session()->get('signin');
            // $alldata = Profile::findorfail($id);

            $username = $data->name;
            $userid = $data->id;
            $link = $data->link;
            $user_img = $data->image;

            $liked_id = Like::where('user_id', $userid)->first();
            if ($liked_id) {
                return response()->json(['success' => false, 'message' => 'You have already marked this user as your favorite.']);
            }

            $like = new like();
            $like->profile_id = $id;
            $like->name = $username;
            $like->user_id = $userid;
            $like->user_image = $user_img;

            $like->save();
            // return redirect()->route('spirit');
            return response()->json(['success' => true, 'message' => 'Added as favorite kindred spirit.']);

        } else {

        }
    }

    public function Spirit(Request $req)
    {
        $id = $req->session()->get('signin');
        $alldata = Profile::with('likes')->where('id', $id)->first();
        return view('my-spirit', ['alldata' => $alldata]);
    }
    public function SectionList(Request $req)
    {
        $query = $req->input('query');
        $type = 'other';
        $type2 = 'image';
        $alldata = sectionlists::where('section', $query)->where('type', $type)->first();
        $data = sectionlists::where('section', $query)->where('type', $type2)->first();

        // dd($alldata);

        if ($alldata) {
            return response()->json(['success' => false, 'alldata' => $alldata->section]);
        }

        if ($data) {
            return response()->json(['success' => true, 'data' => $data->section]);
        }


    }

    public function SectionText(Request $req)
    {
        // dd("reached in the sectiontext controller");
        if (session()->has('signin') || session()->has('draft')) {

            $id = $req->session()->get('signin');
            // $id = $req->session()->get('draft');
            $description = $req->input('description');
            $title = $req->input('text-input');
            $data = new section_text();
            $data->title = $title;
            $data->description = $description;
            $data->profile_id = $id;
            $data->save();
            return redirect()->route('bio');
        }
    }
    public function SectionImage(Request $req)
    {

        if (session()->has('signin')) {
            $id = $req->session()->get('signin');
        }
        $title = $req->input('image-input');
        $item = new section_image();
        $item->title = $title;
        $item->profile_id = $id;
        $item->save();
        $imagePaths = [];

        if ($req->hasFile('img')) {
            foreach ($req->file('img') as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                // $file->storeAs('uploads', $filename); // You can customize the storage path
                $file->move('uploads', $filename);

                // $caption = $req->input('caption')[$key] ?? '';

                // dd($caption);
                $imagePaths[] = $filename;
            }
        }
        foreach ($imagePaths as $imagePath) {
            item_image::create([
                'section_id' => $item->id,
                'image_path' => $imagePath,
            ]);
        }
        return redirect()->route('test');
    }

    // public function SectionImage(Request $req)
    // {
    //     if (session()->has('signin')) {
    //         $id = $req->session()->get('signin');
    //     }
    //     $title = $req->input('image-input');

    //     // Initialize a counter for uploaded images
    //     $uploadedImageCount = 0;

    //     if ($req->hasFile('img')) {
    //         foreach ($req->file('img') as $key => $file) {
    //             if ($uploadedImageCount < 4) {
    //                 $extension = $file->getClientOriginalExtension();
    //                 $filename = time() . '_' . uniqid() . '.' . $extension;
    //                 $file->move('uploads', $filename);

    //                 $item = new section_image();
    //                 $item->title = $title;
    //                 $item->profile_id = $id;
    //                 $item->save();

    //                 item_image::create([
    //                     'section_id' => $item->id,
    //                     'image_path' => $filename,
    //                 ]);

    //                 $uploadedImageCount++;
    //             } else {
    //                 // If more than 4 images are uploaded, break the loop
    //                 break;
    //             }
    //         }
    //     }

    //     return redirect()->route('test');
    // }




    public function test(Request $req)
    {
        $id = $req->session()->get('signin');
        $data = section_image::where('profile_id', $id)->first();
        $pid = $data->id;
        // dd($pid);
        $alldata = section_image::with('images')->where('id', $pid)->get();
        return $alldata;
        // return view('new', ['alldata' => $alldata]);
    }
}