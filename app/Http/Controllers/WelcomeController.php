<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Course;

class WelcomeController extends Controller
{
    private $_dictionary;
    
    /**
     * @param  Request $request
     * @return Factory|View
     */
    public function index()//(Request $request)
    {
        return view(
            'welcome',
            [
                'subjects' => $this->_dictionary,
            ]
        );
    }

    /**
     * @param Request $request
     */
    public function cache(Request $request)
    {
        if ($cacheTime = Cache::get('profileCacheTime')) {
            return response()->json(
                [
                'time' => $cacheTime,
                ]
            );
        }

        $now = Carbon::now();
        Cache::set('profileCacheTime', $now, 60);

        return response()->json(
            [
            'time' => $now,
            ]
        );
    }

    public function __construct()
    {
        $this->_dictionary = Course::get(['id', 'name'])->toArray();
    }
}
