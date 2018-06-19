<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        //$books = $this->repository->paginate(15);
        $books = Book::onlyTrashed()->paginate(15);
        return view('trashed.books.index', compact('books', 'search'));
    }


}
