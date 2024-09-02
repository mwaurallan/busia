<?php

namespace Modules\Fuel\Http\Controllers;

use Modules\Fuel\DataTables\PumpDataTable;
use Modules\Fuel\Http\Requests;
use Modules\Fuel\Http\Requests\CreatePumpRequest;
use Modules\Fuel\Http\Requests\UpdatePumpRequest;
use Modules\Fuel\Repositories\PumpRepository;
use Flash;
use Illuminate\Routing\Controller;
use Response;

class PumpController extends Controller
{
    /** @var  PumpRepository */
    private $pumpRepository;

    public function __construct(PumpRepository $pumpRepo)
    {
        $this->pumpRepository = $pumpRepo;
    }

    /**
     * Display a listing of the Pump.
     *
     * @param PumpDataTable $pumpDataTable
     * @return Response
     */
    public function index(PumpDataTable $pumpDataTable)
    {
        return $pumpDataTable->render('fuel::pumps.index');
    }

    /**
     * Show the form for creating a new Pump.
     *
     * @return Response
     */
    public function create()
    {
        return view('fuel::pumps.create');
    }

    /**
     * Store a newly created Pump in storage.
     *
     * @param CreatePumpRequest $request
     *
     * @return Response
     */
    public function store(CreatePumpRequest $request)
    {
        $input = $request->all();

        $pump = $this->pumpRepository->create($input);

        Flash::success('Pump saved successfully.');

        return redirect(route('pumps.index'));
    }

    /**
     * Display the specified Pump.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pump = $this->pumpRepository->find($id);

        if (empty($pump)) {
            Flash::error('Pump not found');

            return redirect(route('pumps.index'));
        }

        return view('fuel::pumps.show')->with('pump', $pump);
    }

    /**
     * Show the form for editing the specified Pump.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pump = $this->pumpRepository->find($id);

        if (empty($pump)) {
            Flash::error('Pump not found');

            return redirect(route('pumps.index'));
        }

        return view('fuel::pumps.edit')->with('pump', $pump);
    }

    /**
     * Update the specified Pump in storage.
     *
     * @param  int              $id
     * @param UpdatePumpRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePumpRequest $request)
    {
        $pump = $this->pumpRepository->find($id);

        if (empty($pump)) {
            Flash::error('Pump not found');

            return redirect(route('pumps.index'));
        }

        $pump = $this->pumpRepository->update($request->all(), $id);

        Flash::success('Pump updated successfully.');

        return redirect(route('pumps.index'));
    }

    /**
     * Remove the specified Pump from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pump = $this->pumpRepository->find($id);

        if (empty($pump)) {
            Flash::error('Pump not found');

            return redirect(route('pumps.index'));
        }

        $this->pumpRepository->delete($id);

        Flash::success('Pump deleted successfully.');

        return redirect(route('pumps.index'));
    }
}
