<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function filter(Request $request) {
        $search = $request->input('term');
        $companies = Company::select('company_id', 'name')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->limit(10) 
            ->get();
        return response()->json($companies);
    }
}
