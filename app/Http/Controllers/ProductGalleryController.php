<?php

namespace App\Http\Controllers;

use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = ProductGalleru::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <form class="inline-block" action="'. route('dashboard.product.destroy', $item->id) .'" method="POST">
                            <button class= "bg-green-500 text-white rounded-md px-2 py-1 m-2">
                                Hapus
                            </button>
                        '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })
                ->editColumn('url', function($item){
                    return '<img style="max-width: 150pxW" src="'. Storage::url($item->url) .'"/>';
                }) 
                ->editColumn('is_featured', function($item){
                    return $image->is_featured ? 'yes' :'no';
                }) 
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
}
