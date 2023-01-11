<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KeywordController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keyword.index', ['keywords' => Keyword::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keyword.create', ['keywords' => Keyword::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['keyword-text' => 'required']);
        $keywords = $request->input("keyword-text");
        $splitedKeywords = array();
        $splitedKeywords = explode(" ", $keywords);
        foreach ($splitedKeywords as $word) {
            // error_log( $word);
            $keyword = new Keyword();
        $keyword->word = strip_tags(rtrim($word, "."));
        $keyword->save();

           
        }




        // $keyword = new Keyword();
        // $keyword->word = strip_tags($request->input('keyword-text'));
        // $keyword->save();

        return redirect()->route('keyword.create', ['keywords' => Keyword::all()]);

        // return redirect()->route('keyword.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedKeyword = Keyword::findorFail($id);
        return view('keyword.edit', ['keyword' => $selectedKeyword, 'motCle' => Keyword::all()]);
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
        $request->validate(['keyword-text' => 'required']);

        $updateKeyword = Keyword::findorFail($id);
        $updateKeyword->word = strip_tags($request->input('keyword-text'));

        $updateKeyword->save();
        return redirect()->route('keyword.edit', $updateKeyword);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Keyword::findorFail($id);
        $to_delete->delete();
        return redirect()->route('keyword.index');
        // 
    }

    public function find()
    {
        return view('keyword.search',['keywords' => Keyword::all()]);
    }
    public function findSearch(Request $request)
    {
        $search = $request->input("keyword-text");
        $result = array();
        $splitedSearch = explode(" ", $search);
        foreach ($splitedSearch as $word) {
            // error_log( $word);
            $search = Keyword::where('word', strtolower(rtrim($word, ".")))->get();
            if (count($search) > 0)
            {
                array_push($result, $search[0]->word);

            }
        }
        return view('keyword.search', ['keywords' => $result,'query'=>$request->input("keyword-text")]);
    }
}
