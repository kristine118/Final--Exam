<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// ვალიდაციები გასატანია ცალე ფაილში Request კლასში.
// მაგ. :   php artisan make:request Dashboard/TeamMemberStoreRequest 
// როცა ცაკლე რექვესტში გაქვს შენი $data და $request->validate() ზუსტად იგივე საქმეს აკეთებს
// კონტროლერში უნდა ვეცადოთ რომ ლოგიკა არ იყოს!
// compact - ს არ ვიყენებდ view-ში ინფორმაციის გადასაცემათ
// გამოყენე მასივი

// სხვა კობნტროლერებშიც იგივე შენიშვნებია ყველგან აღარ დავწერ.

// ვერ დავამატე წევრი, ვალიდაცაია არ მიშვებს.
// ანუ ვალიდაციის მესიჯები არ ჩანს და ვერ ვხვდები რა ვალიდაცია ვერ გავიარე
// გამოსაჩენია მესიჯები !!!
// ასევე ვალიდაცაი უკან რრომ მაბრუნებს ჩაწერილი ტექსტები მიქრება


class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::latest()->get();
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'photo' => 'required|image',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'photo' => 'nullable|image',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($request->hasFile('photo')) {

            // ძველი ფოტოს წაშლა
            // ეს მომეწონა მხოლოდ შენ გაქვს გაკეთებული კარგია
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }

            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        // არასდორს გამოიყენო back() რადგან შეიძლება რედირექტი არასწორი იყოს და 404-ით დაგიბრუნოს,
        // return back();

        return redirect()->route('admin.team.index');
    }
}
