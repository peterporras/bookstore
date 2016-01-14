<?php

class BooksController extends BaseController {

	
	public function __construct()
    {
    	$this->params = array(
    		'title' => '',
    	);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = DB::table('books')->paginate(5);
		
		$this->params['title'] = Lang::get('labels.books');
		$this->params['books'] = $books;
		return View::make('books.index',$this->params);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->params['title'] = Lang::get('labels.addbooks');
		return View::make('books.create',$this->params);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// check if method is post
		if( Request::isMethod('post') ) {
		    $input = Input::all();
		    $validator = Validator::make(
		    	$input, 
		    	array(
				    'title' => 'required',
				    'author' => 'required',
				    'genre' => 'required',
				)
			);

			// check if data is validated
		    if( $validator->fails() ) {
			    // redirect with errors if the given data did not pass validation
		    	return Redirect::to('create')->withErrors($validator);
			}

			$book = new Books;

			$book->title = Input::get('title');
		    $book->author = Input::get('author');
		    $book->genre = Input::get('genre');
		    $book->description = Input::get('description');
		    $book->published = Input::get('published');
		    $book->format = Input::get('format');

			// check if an image is added.
			if( Input::hasFile('image') ) {

				$destinationPath = public_path() . '/uploads/';
				$original_filename = Input::file('image')->getClientOriginalName();
	            $extension = Input::file('image')->getClientOriginalExtension();
	            $filename = md5( uniqid().$original_filename );

	            // save file
	            Input::file('image')->move( $destinationPath, $filename.'.'.$extension );
                $book->image = $filename.'.'.$extension;
			}

			$book->save();

			return Redirect::to('/')->with('success', Lang::get('labels.bookadded'));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// check if book exists
		$book = Books::find($id);
		if( !$book ){
			return Redirect::to('/')->with('error', Lang::get('labels.booknotfound'));
		}
		
		$this->params['title'] = 'Edit Book';
		$this->params['book'] = $book;
		return View::make('books.edit',$this->params);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// check if book exists
		$book = Books::find($id);
		if( !$book ){
			return Redirect::to('/')->with('error', Lang::get('labels.booknotfound'));
		}

		// check if method is post
		if( Request::isMethod('post') ) {
		    $input = Input::all();
		    $validator = Validator::make(
		    	$input, 
		    	array(
				    'title' => 'required',
				    'author' => 'required',
				    'genre' => 'required',
				)
			);

			// check if data is validated
		    if( $validator->fails() ) {
			    // redirect with errors if the given data did not pass validation
		    	return Redirect::to($id.'/edit')->withErrors($validator);
			}

			$book->title = Input::get('title');
		    $book->author = Input::get('author');
		    $book->genre = Input::get('genre');
		    $book->description = Input::get('description');
		    $book->published = Input::get('published');
		    $book->format = Input::get('format');

			// check if an image is added.
			if( Input::hasFile('image') ) {

				$destinationPath = public_path() . '/uploads/';
				$original_filename = Input::file('image')->getClientOriginalName();
	            $extension = Input::file('image')->getClientOriginalExtension();
	            $filename = md5( uniqid().$original_filename );

				// check if there's an image in the record.
				if( $book->image ){
					// delete image and replace
					unlink($destinationPath.$book->image);
				}

				// save file
	            Input::file('image')->move( $destinationPath, $filename.'.'.$extension );
                $book->image = $filename.'.'.$extension;

			}

			$book->save();

			return Redirect::to($id.'/edit')->with('success', Lang::get('labels.bookupdated'));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$book = Books::find($id);
		if( !$book ){
			return Redirect::to('/')->with('error', Lang::get('labels.booknotfound'));
		}

		$book->delete();
		return Redirect::to('/')->with('success', Lang::get('labels.bookremoved'));
	}


}
