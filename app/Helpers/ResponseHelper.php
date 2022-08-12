<?php

function success($message, $data){
    return response()->json(
        [
            'type' => 1,
            'message' => $message,
            'data' => $data,
        ]
    );
}

function fail($message, $data){
    return response()->json(
        [
            'type' => 0,
            'message' => $message,
            'data' => $data,
        ]
    );
}