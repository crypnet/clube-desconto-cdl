<?php

/**
 * cashFormat
 *
 * @param $value
 * @param  int  $decimals
 * @param  string  $p
 * @param  string  $p2
 *
 * @return string
 */
function cashFormat(
    $value,
    $decimals = 2,
    $p = ',',
    $p2 = '.'
) {
    return number_format($value, $decimals, $p, $p2);
}


/**
 * formatMask
 *
 * @param $val
 * @param $mask
 *
 * @return string
 */
function formatMask(
    $val,
    $mask
) {
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] === '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } elseif (isset($mask[$i])) {
            $maskared .= $mask[$i];
        }
    }
    return $maskared;
}


/**
 * @param $data
 * @return array
 */
function pagination($data)
{
    $pagination = [
        'currentPage'     => $data->currentPage(),
        'previousPageUrl' => $data->previousPageUrl(),
        'nextPageUrl'     => $data->nextPageUrl(),
        'lastPage'        => $data->lastPage(),
        'firstItem'       => $data->firstItem(),
        'lastItem'        => $data->lastItem(),
        'total'           => $data->total(),
    ];
    if ($pagination['previousPageUrl'] && $_SERVER['QUERY_STRING']) {
        $queryString = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($queryString as $key => $value) {
            $p = explode('=', $value);
            if ($p[0] !== 'page') {
                $pagination['previousPageUrl'] .= '&'.$value;
            }
        }
    }
    if ($pagination['nextPageUrl'] && $_SERVER['QUERY_STRING']) {
        $queryString = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($queryString as $key => $value) {
            $p = explode('=', $value);
            if ($p[0] !== 'page') {
                $pagination['nextPageUrl'] .= '&'.$value;
            }
        }
    }
    return $pagination;
}

/**
 * onlyUsers
 *
 * @return array
 * @author Luan Magalhães
 */
function onlyUsers()
{
    return [
        'seller',
        'dealer',
    ];
}

/**
 * led
 *
 * @return array
 * @author Luan Magalhães
 */
function led()
{
    $where[] = auth()->user()->id;
    $where = recursiveWhere(auth()->user(), $where);
    return $where;
}

/**
 * isHelperNull()
 *
 * @param $parameter
 *
 * @return string
 * @author André Luis
 */
function isHelperNull($parameter)
{
    if ($parameter == null) {
        return '';
    }
    return $parameter;
}


function hierarchy()
{
    $user = config('roles.models.defaultUser')::find(Auth()->user()->id);

    if($user->hasRole('admin')){
        $not_in = [
            'root',
        ];
    }else if($user->hasRole('user')){
        $not_in = [
            'root',
            'admin'
        ];
    }else if($user->hasRole('unverified')){
        $not_in = [
            'root',
            'admin',
            'user'
        ];
    }else{
        $not_in = [];
    }
    return $not_in;
}


