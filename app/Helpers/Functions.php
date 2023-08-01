<?

/**
 * Api functions
*/
function returnError($errNum, $msg)
{
    return response()->json([
        'status' => false,
        'errNum' => $errNum,
        'msg' => $msg
    ]);
}


function returnSuccessMessage($msg = "", $errNum = "S000")
{
    return [
        'status' => true,
        'errNum' => $errNum,
        'msg' => $msg
    ];
}

function returnData($key, $value, $msg = "")
{
    return response()->json([
        'status' => true,
        'errNum' => "S000",
        'msg' => $msg,
        $key => $value
    ]);
}

/**
 * App functions
 */

if( !function_exists('shopId') ) {
    function shopId(?int $shop_id = null): ?int
    {
        return $shop_id ?? auth()->user()->shop_id ?? null;
    }
}

if( !function_exists('checkRoute') ) {
    function checkRoute(string $route, bool|string $returned = true): bool|string
    {
        $route = $route ? '.'.trim($route, '.') : '';
        return request()->routeIs("dashboard{$route}") ? $returned : false;
    }
}

if( !function_exists('routeHelper') ) {
    function routeHelper(string|null $route, object|array|string|int|null $options = null) :string
    {
        if (! $route || $route == '#') return '';
        return route("dashboard.$route", $options);
    }
}
