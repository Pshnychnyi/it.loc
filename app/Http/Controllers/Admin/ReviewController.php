<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Repositories\ReviewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ReviewController extends AdminController
{
    public function __construct(ReviewsRepository $rev_rep) {
		parent::__construct();
		$this->template = 'admin.review.review';

		$this->rev_rep = $rev_rep;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	if(Gate::denies('VIEW_ADMIN')) {
    		abort(403);
    	}
    	$this->title = 'Список клиентов';
    	$reviews = $this->getClient();

    	$this->content = view('admin.review.review_content')->with(['reviews' => $reviews])->render();

    	return $this->renderOutput();
    }

    public function getClient() {
    	return $this->rev_rep->get(['id', 'name', 'position', 'desc', 'img'], 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
    	if(Gate::denies('create', new Review)) {
    		abort(403);
    	}

    	$this->title = 'Создание отзыва';

    	$this->content = view('admin.review.create_content')->render();

    	return $this->renderOutput();    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {

    	if(Gate::denies('create', new Review)) {
    		abort(403);
    	}

    	$data = $request->validated();

    	$data['img'] = $request->file('img')->store('img');

    	if(Review::firstOrCreate($data)) {
    		return redirect()->route('review.index')->with('status', 'Запись добавлена');
    	}

    	return redirect()->back();
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
    public function edit(Review $review)
    {	

    	if(Gate::denies('update', new Review)) {
    		abort(403);
    	}

    	$this->title = 'Редактирование отзыва ' . $review->name;

    	$this->content = view('admin.review.create_content')->with(['review' => $review])->render();

    	return $this->renderOutput();    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, Review $review)
    {	
    	if(Gate::denies('update', new Review)) {
    		abort(403);
    	}
    	$data = $request->validated();

    	if($request->hasFile('img')) {

    		$data['img'] = $request->file('img')->store('img');

    		if (!empty($data['img'])) {
    			if(Storage::disk('public')->exists($review->img)) {
    				Storage::disk('public')->delete($review->img);
    			}
    		}

    	}

    	if($review->update($data)) {
    		return redirect()->route('review.index')->with('status', 'Изменения сохранены');
    	}

    	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {	
    	if(Gate::denies('delete', new Review)) {
    		abort(403);
    	}
    	if($review) {
    		if(Storage::disk('public')->exists($review->img)) {
    			Storage::disk('public')->delete($review->img);
    		}

    		if($review->delete()) {
    			return redirect()->route('review.index')->with('status', 'Запись успешно удалена');
    		}

    		return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
