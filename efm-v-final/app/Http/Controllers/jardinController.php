<?php

namespace App\Http\Controllers;

use App\Models\jardin;
use App\Models\jardinier;
use App\Http\Requests\jardinRequest;
use Illuminate\Http\Request;
use App\Services\jardinServices;

class jardinController extends Controller
{

    protected $jardinService;
    public function __construct(jardinServices $jardinService){
        $this->jardinService = $jardinService;
    }

    public function index(Request $request)
    {
        // Get Latest Data
        $query = $this->jardinService->getlatest();

    
        // Filter By Category
        if( $request->has('jardinier_id')){
            $query = $this->jardinService->filterById($query, $request->jardinier_id);
        }

        // Get All Data Paginate
        $alljardins = $this->jardinService->getPagination($query, 2);

        // Get All jardiniers
        $alljardiniers = $this->jardinService->getAlljardiniers();

        // Redirection
        return view('jardins.index', compact('alljardins', 'alljardiniers'));
    }


    public function create()
    {
        // Get All jardiniers
        $alljardiniers = $this->jardinService->getAlljardiniers();

        // Redirection
        return view('jardins.create', compact('alljardiniers'));
    }


    public function store(jardinRequest $request)
    {
        // Store Data into DB
        $this->jardinService->createjardin($request->validated());

        // Redirection
        return redirect()->route('jardins.index')->with('success', 'The jardin Was Created Successfuly');
    }


    public function show(string $jardin)
    {
        // Get Exact jardin
        $exactjardin = $this->jardinService->getExactjardin($jardin);

        // Redirection
        return view('jardins.details', compact('exactjardin'));
    }


    public function edit(string $jardin)
    {
        // Get Exact jardin
        $exactjardin = $this->jardinService->getExactjardin($jardin);

        // Get All jardiniers
        $alljardiniers = $this->jardinService->getAlljardiniers();

        // Redirection
        return view('jardins.edit', compact('exactjardin', 'alljardiniers'));
    }


    public function update(jardinRequest $request, string $jardin)
    {
        // Update Data
        $this->jardinService->updatejardin( $request->validated(), $jardin);

        // Redirection
        return redirect()->route('jardins.index')->with('success', 'The jardin Was Updated Successfuly');
    }


    public function destroy(string $jardin)
    {
        // Update Data
        $this->jardinService->deletejardin($jardin);

        // Redirection
        return redirect()->route('jardins.index')->with('success', 'The jardin Was Deleted Successfuly');
    }
}
