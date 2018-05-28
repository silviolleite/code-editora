<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::query()->paginate(15);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso.');
        return redirect()->to($url);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->all();
        $book->fill($data);
        $book->save();

        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro alterado com sucesso.');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        \Session::flash('message', 'Livro excluído com sucesso.');
        return redirect()->to(\URL::previous());
    }
}
