<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @var BookRepository
     */
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $books = $this->repository->paginate(15);
        return view('books.index', compact('books', 'search'));
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
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $this->repository->create($data);
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso.');
        return redirect()->to($url);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->repository->find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $data = $request->except(['user_id']);
        $this->repository->update($data, $id);
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro alterado com sucesso.');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Livro excluído com sucesso.');
        return redirect()->to(\URL::previous());
    }
}
