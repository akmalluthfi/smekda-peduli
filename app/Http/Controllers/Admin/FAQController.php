<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sections.faqs.index', [
            'faqs' => FAQ::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFAQRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFAQRequest $request)
    {
        $validatedData = $request->validated();

        FAQ::create($validatedData);

        return redirect('/admin/faqs')->with('success', 'Pertanyaan berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('admin.sections.faqs.edit', [
            'faq' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreFAQRequest  $request
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFAQRequest $request, FAQ $faq)
    {
        $validatedData = $request->validated();

        $faq->update($validatedData);

        return redirect('/admin/faqs')->with('success', 'Pertanyaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect('/admin/faqs')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
