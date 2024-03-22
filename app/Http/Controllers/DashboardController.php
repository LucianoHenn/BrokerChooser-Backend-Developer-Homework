<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\TestType;
use App\Models\Test;
use App\Enums\StatusEnum;
use App\Models\Event;
use Illuminate\Support\Facades\Session;
use App\Models\Session as SessionModel;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tests = Test::all();

        return view('pages.ab-test.list', ['tests' => $tests, 'status' => StatusEnum::class]);
    }

    public function createTest(Request $request)
    {
        $types = TestType::all();

        return view('pages.ab-test.create', ['types' => $types]);
    }

    public function register(Request $request)
    {
        $sessionId = Session::get('db_session_id');

        $types = TestType::all();

        // Max amount of tests per session
        $maxAmountOfTest = $types->count();

        if (!is_null($sessionId)) {
            $session = SessionModel::find($sessionId);

            if ($session) {
                $sessionsTests = $session->events()->test()->get();

                if ($sessionsTests->count() < $maxAmountOfTest) {

                    foreach ($types as $type) {

                        $test = Test::active()->inRandomOrder()->where('type_id', $type->id)->first();

                        if (empty($test))
                            continue;

                        if ($test->variants->isEmpty())
                            continue;

                        $variants = $test->variants;

                        // Initialize an empty array to store variants based on their targeting ratios
                        $weightedVariants = [];

                        // Populate the array with variants according to their targeting ratios
                        foreach ($variants as $variant) {
                            // Add the variant to the array targeting_ratio times
                            for ($i = 0; $i < $variant->targeting_ratio; $i++) {
                                $weightedVariants[] = $variant->name;
                            }
                        }

                        // Pick one random variant from the weighted array
                        $randomVariant = $weightedVariants[array_rand($weightedVariants)];

                        // Check if there are no events of the same test type associated with the session
                        $existingEventWithType = $session->events()->test()->get()->first(function ($event) use ($test) {
                            return $event->data['test_type'] === $test->type->alias;
                        });

                        if (!$existingEventWithType) {
                            // Create a new event only if there is no existing event of the same type
                            $session->events()->create([
                                'url' => url($request->path()),
                                'type' => $test->id,
                                'data' => [
                                    'test_name' => $test->name,
                                    'test_type' => $test->type->alias,
                                    'test_value' => $randomVariant,
                                    'active' => true
                                ]
                            ]);
                        }

                        // Exit the loop if the maximum amount of tests per session is reached
                        if ($session->events()->test()->get()->count() == $maxAmountOfTest) {
                            break;
                        }
                    }
                }
            }
        }

        $abTests = [];

        foreach ($session->events()->test()->get() as $test) {
            $abTests[$test->data['test_type']] = $test->data['test_value'];
        }

        return view('auth.register', ['abTest' => $abTests]);
    }
}
