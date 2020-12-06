<?php

function _capability_system_administrator() {
    return [
        'dashboard'
    ];
}

function _capability_administrator() {
    return [];
}

function _capability_operator() {
    return [];
}

function _capability_customer() {
    return [];
}

function _capability_station() {
    return [];
}

function _capability_mechanic() {
    return [];
}

function _api_headers(): array {
    return [
        'X-Requested-With' => 'XMLHttpRequest',
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json',
        'X-G-Access-Token' => 'bCtgjoy3gGQHAdoyzFbduGhAGr5hQND5Fbt7ggMWNgi10_dcPBmr9cHc5tK9v'
    ];
}