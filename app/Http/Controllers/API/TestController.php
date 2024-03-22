<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Tests\CreateTestRequest;
use Illuminate\Http\Request;
use App\Models\Test as TestModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Session as SessionModel;
use Log;

class TestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestRequest $request)
    {
        $data = [
            'id' => Str::uuid(),
            'name' => $request->input('test_name'),
            'type_id' => $request->input('test_type'),
        ];

        $test = TestModel::createWithVariants($data, $request->input('variants'));

        return $this->sendResponse($test, 'Test created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Start the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function start($id)
    {

        if (TestModel::find($id)->run())
            return $this->sendResponse([], 'Test started successfully.');
        else
            return $this->sendError("Test has already started.", ["error" => "This test can not be re-started."], 500);
    }

    /**
     * Stop the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stop($id)
    {
        if (TestModel::find($id)->stop())

            return $this->sendResponse([], 'Test finished successfully.');

        else
            return $this->sendError("Test has already finished", ["error" => "This test can not be stopped"], 500);
    }

    public function saveConversion(Request $request)
    {
        $sessionId = Session::get('db_session_id');

        $session = SessionModel::find($sessionId);

        if (!$session)
            return $this->sendError("Internal error", ["error" => "Session not found"], 500);

        $sessionsTests = $session->events()->test()->get();

        $testUuids  = [];
        foreach ($sessionsTests as $test) {
            array_push($testUuids, $test->type);
        }

        $session->events()->create([
            'url' => url($request->path()),
            'type' => 'conversion',
            'data' => [
                'test_uuids' => $testUuids
            ]
        ]);

        return $this->sendResponse([], 'Registration was succesfully');
    }
}
