<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;

class FeedbacksController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFeedbackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        Feedback::create($request->validated());
        flash('Сообщение успешно отправленно.');
        return redirect(route('main'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('contacts.show');
    }
}
