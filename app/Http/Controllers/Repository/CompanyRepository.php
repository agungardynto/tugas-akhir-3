<?php

namespace App\Http\Controllers\Repository;

use App\Company;
use Illuminate\Support\Facades\Validator;

class CompanyRepository {
    public function store($request) {
        $validator = Validator::make($request->all(), [
            'city' => 'required',
            'address' => ''
        ])->validate();

        $company = new Company;
        $company = $request->all();

        $data = Company::create($company);

        return $data;
    }

    public function update($request, $id) {
        Validator::make($request->all(), [
            'city' => 'required',
            'address' => ''
        ])->validate();
        
        $company = $request->all();

        $data = $id->update($company);

        return $data;
    }
}