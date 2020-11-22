<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ActionNotCompletedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct(\App\Teams\Repository $teams)
    {
        $this->teams = $teams;
        //$this->authorizeResource(Team::class, 'team');
    }

    public function index()
    {
        // filter() to filter
        // reject() to reverse result of filter()
        // search() to search first record
        // mapSpread()->collapse() swap the result
        // chunk(int n) chunk the result
        // mapToGroups() maps into a groups
        // reduce()
        // sum() reducer, sums up the result
        // avg() reducer, return average result associated with team
        // max(), min(), median(), mode()
        // shuffle() shuffles elements in collection
        // sortBy() sorts collection
        // sortBy()->values() returns only values
        // take(int n) takes 2 elements and removes rest from the collection
        // pluck(string s) returns elements only with key s
        // transform() takes something modifies and returns back
        // collection->intersect(collection) INNER JOIN
        // collection->diff(collection) OUTER JOIN
        // collection->concat(collection)
        $collection1 = Team::all();
        $collection2 = $collection1->nth(2);
        return $collection1->concat($collection2)->unique('created_at');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(\App\Http\Requests\StoreTeam $request)
    {
        $team = new Team();
        $team->title = $request->input('title');
        $team->save();
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @throws ActionNotCompletedException
     */
    public function edit($id)
    {
        throw new ActionNotCompletedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function points(Team $team)
    {
        $this->authorize('view', $team);
        return response()->json($this->teams->points($team));
    }
}
