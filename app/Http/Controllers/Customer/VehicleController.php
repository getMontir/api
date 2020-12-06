<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerVehicleResource;
use App\Models\CustomerVehicle;
use App\Repository\Eloquent\CustomerVehicleRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    protected $customerVehicleRepo;

    public function __construct(
        CustomerVehicleRepository $a
    ) {
        $this->customerVehicleRepo = $a;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerVehicleResource::collection(
            $this->customerVehicleRepo->all( Auth::user() )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|min:20|max:20',
            'type' => 'required|string|min:20|max:20',
            'transmission' => 'required|string|min:20|max:20',
            'year' => 'required|numeric|max:' . date('Y'),
            'police' => 'required|string',
            'default' => 'nullable|numeric|min:0|max:1'
        ]);

        $user = Auth::user();
        
        $data = $this->customerVehicleRepo->create([
            'user_id' => $user->id,
            'brand_id' => $request->input('brand'),
            'type_id' => $request->input('type'),
            'transmission_id' => $request->input('transmission'),
            'vehicle_year' => $request->input('year'),
            'police_number' => $request->input('police'),
            'is_default' => $request->input('default')
        ]);

        return new CustomerVehicleResource( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $find = $this->customerVehicleRepo->detail( $id );
            return new CustomerVehicleResource( $find );
        } catch( ModelNotFoundException $e ) {
            return abort(404);
        }
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
        $request->validate([
            'brand' => 'required|string|min:20|max:20',
            'type' => 'required|string|min:20|max:20',
            'transmission' => 'required|string|min:20|max:20',
            'year' => 'required|numeric|max:' . date('Y'),
            'police' => 'required|string',
            'default' => 'nullable|numeric|min:0|max:1'
        ]);

        $user = Auth::user();
        
        $data = $this->customerVehicleRepo->update( $id, [
            'user_id' => $user->id,
            'brand_id' => $request->input('brand'),
            'type_id' => $request->input('type'),
            'transmission_id' => $request->input('transmission'),
            'vehicle_year' => $request->input('year'),
            'police_number' => $request->input('police'),
            'is_default' => $request->input('default')
        ]);

        return new CustomerVehicleResource( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( Request $request)
    {
        $request->validate([
            'id' => 'required|string|min:20|max:20'
        ]);

        $id = $request->input('id');

        try {
            $find = $this->customerVehicleRepo->delete( $id );
            if( !$find ) {
                return abort(500);
            }

            return response()->json([
                'data' => true
            ]);
        } catch( ModelNotFoundException $e ) {
            return abort(404);
        }
    }

    public function setDefault( Request $request ) {
        $request->validate([
            'id' => 'required|string|min:20|max:20'
        ]);

        $id = $request->input('id');

        try {
            $find = $this->customerVehicleRepo->setDefault( $id );
            if( !$find ) {
                return abort(500);
            }

            return response()->json([
                'data' => true
            ]);
        } catch( ModelNotFoundException $e ) {
            return abort(404);
        }
    }
}
