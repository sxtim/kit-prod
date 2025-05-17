<?php

namespace App\Helpers;

use App\Traits\Singleton;
use Illuminate\Http\Request;

class ClickFilter
{
    use Singleton;

    protected array $requestFilter = [];

    private function __construct()
    {
        $request = request();
        $requestFilter = $request->get('data');

        if ($requestFilter) {
            $requestFilter = json_decode($requestFilter, true);

            if (is_array($requestFilter)) {
                foreach ($requestFilter as $key => $value) {
                    if (is_array($value)) {
                        foreach ($value as $subValue) {
                            if ($subValue === 'any') {
                                unset($requestFilter[$key]);
                            }
                        }
                    }
                }

                $this->requestFilter = $requestFilter;
            }
        }
    }

    public function getAll(): array
    {
        return $this->requestFilter;
    }
}
