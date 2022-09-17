<?php

namespace App\Http\Facades;

class FeegowApi {

    public static function getPath() {
        return config('feegow.api_path');
    }

    public static function getToken() {
        return config('feegow.api_token');
    }

    public static function listSpecialties() {
        return 'specialties/list';
    }

    public static function listProfessionals() {
        return 'professional/list';
    }
    
    public static function getProfessional() {
        return 'professional/search';
    }

    public static function listSource() {
        return 'patient/list-sources';
    }

}
