<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksTrashedController extends Controller
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
        $books = $this->repository->onlyTrashed()->paginate(15);
        return view('trashed.books.index', compact('books', 'search'));
    }

    public function show($id){
        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        return view('trashed.books.show', compact('book'));
    }


}
