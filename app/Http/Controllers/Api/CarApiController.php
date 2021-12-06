<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Http\Requests\CarValidationRequest;
use App\Repositories\CarsRepositoryContract;

class CarApiController extends Controller
{
    private $carRepository;

    public function __construct(CarsRepositoryContract $carRepository)
    {
        $this->middleware('shield');

        $this->carRepository = $carRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarResource::collection($this->carRepository->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CarValidationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarValidationRequest $request)
    {
        $car = $this->carRepository->create($request->validated());
        return response()->json(['success' => true, 'car_id' => $car->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarValidationRequest $request, $id)
    {
        $car = $this->carRepository->update($id, $request->validated());
        return response()->json(['success' => true, 'car_id' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->carRepository->delete($id);
        return response()->json(['success' => true, 'car_id' => $id]);
    }
}
