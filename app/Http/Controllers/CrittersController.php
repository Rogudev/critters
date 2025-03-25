<?php

namespace App\Http\Controllers;

use App\Helpers\functions;
use Illuminate\Http\Request;
use App\Models\Critter;
use App\Models\User;
use Illuminate\Support\Arr;

class CrittersController extends Controller
{
    /**
     * Display a listing of the critters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $critters = Critter::all();
        return view('critters.index', compact('critters'));
    }

    /**
     * Show the form for creating a new critter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('critters.register');
    }

    /**
     * Store a newly created critter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_1' => 'required|string|max:255',
            'type_2' => 'nullable|string|max:255',
            'type_3' => 'nullable|string|max:255',
            'description' => 'required|string',
            'habitat' => 'required|string|max:255',
            'encounter_difficulty' => 'required|in:common,rare,ultra rare,legendary',
            'image' => 'required|file|mimes:png|max:1024', //10MB
            'sound' => 'required|file|mimes:mp3|max:4028', //2MB
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image'); //get the sound
            $imageFileName = $imageFile->getClientOriginalName(); //Get files' name

            $imageFile->move(public_path('media/images'), $imageFileName); //save the image
        }

        if ($request->hasFile('sound')) {
            $soundFile = $request->file('sound'); //get the sound
            $soundFileName = $soundFile->getClientOriginalName(); //Get files' name

            $soundFile->move(public_path('media/sounds'), $soundFileName); //save the sound
        }

        $critter = new Critter();

        $critter->name = $request->input('name');
        $critter->type_1 = $request->input('type_1');
        $critter->type_2 = $request->input('type_2');
        $critter->type_3 = $request->input('type_3');
        $critter->description = $request->input('description');
        $critter->region = $request->input('habitat');
        $critter->encounter_difficulty = $request->input('encounter_difficulty');
        $critter->image = $imageFileName ?? null;
        $critter->sound = $soundFileName ?? null;
        $critter->user_id = auth()->id();

        $critter->save();

        //Redirect to show method the new Critter
        return redirect()->route('critters.showById', ['id' => $critter->id]);
    }

    /**
     * Display the specified critter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        $critter = Critter::where('id', $id)->first();

        if (!$critter) {
            return redirect()->route('critters.all');
        }

        $investigatorName = User::where('id', $critter->user_id)->value('name');
        $investigatorID = User::where('id', $critter->user_id)->value('id');

        return view('critters.showById', compact('critter', 'investigatorName', 'investigatorID'));
    }

    /**
     * Display all the critters.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll($start = 0, $found = '')
    {
        $critters = Critter::skip($start)->take(30)->get();
        $totalNumber = Critter::count();

        $helper = new functions();
        $pagination = $helper->makePagination($start, 'show/all', $totalNumber);

        return view('critters.crittopedia', compact('critters', 'pagination', 'found'));
    }

    /**
     * Display all the critters.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $nameId = $request->query('nameId');
        $found = '';

        if ($nameId == null) {
            $found = 'Nothing to search';
            $critters = Critter::orderBy('id')->get();

        } else {

            if (is_numeric($nameId)){
                $exists = Critter::where('id', $nameId)->exists();
                $searchby = 'id';

            } else {
                $exists = Critter::where('name', $nameId)->exists();
                $searchby = 'name';
            }

            if (!$exists) {
                $found = "Critter with $searchby '$nameId' not found";
                $critters = Critter::skip(0)->take(30)->get();

                return view('critters.crittopedia', compact('critters', 'found'));
            
            }

            $critters = Critter::where($searchby, $nameId)->get();
        }


        return view('critters.crittopedia', compact('critters', 'found'));
    }

    /**
     * Display all the critters.
     *
     * @return \Illuminate\Http\Response
     */
    public function myRegisters($start = 0)
    {
        
        $critters = Critter::skip($start)->take(30)->where('user_id', auth()->id())->get();
        $totalNumber = Critter::count();

        $helper = new functions();
        $pagination = $helper->makePagination($start, 'show/all', $totalNumber);

        return view('critters.myRegisters', compact('critters', 'pagination'));
    }

    /**
     * Show the form for editing the specified critter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $critter = Critter::where('id', $id)->first();

        return view('critters.edit', compact('critter'));
    }

    /**
     * Update the specified critter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'type_1' => 'nullable|string|max:255',
            'type_2' => 'nullable|string|max:255',
            'type_3' => 'nullable|string|max:255',
            'description' => 'required|string',
            'habitat' => 'nullable|string|max:255',
            'encounter_difficulty' => 'nullable|in:common,rare,ultra rare,legendary',
            'image' => 'nullable|file|mimes:png|max:5120', // 5MB
            'sound' => 'nullable|file|mimes:mp3|max:2048', // 2MB
        ]);

        $critter = Critter::findOrFail($id);

        if ($request->has('name')) {
            $critter->name = $request->input('name');
        }
        if ($request->has('type_1')) {
            $critter->type_1 = $request->input('type_1');
        }
        if ($request->has('type_2')) {
            $critter->type_2 = $request->input('type_2');
        }
        if ($request->has('type_3')) {
            $critter->type_3 = $request->input('type_3');
        }
        if ($request->has('description')) {
            $critter->description = $request->input('description');
        }
        if ($request->has('habitat')) {
            $critter->region = $request->input('habitat');
        }
        if ($request->has('encounter_difficulty')) {
            $critter->encounter_difficulty = $request->input('encounter_difficulty');
        }

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName();
            $imageFile->move(public_path('media/images'), $imageFileName);
            $critter->image = $imageFileName;
        }

        if ($request->hasFile('sound')) {
            $soundFile = $request->file('sound');
            $soundFileName = $soundFile->getClientOriginalName();
            $soundFile->move(public_path('media/sounds'), $soundFileName);
            $critter->sound = $soundFileName;
        }

        $critter->save();

        return redirect()->route('critters.showById', ['id' => $critter->id]);
    }


    /**
     * Remove the specified critter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $critter = Critter::findOrFail($id);
        $critter->delete();

        return redirect()->route('critters.myRegisters');
    }
}
