<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPost;
use App\Models\Company;
use Carbon\Carbon;

class OpeningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $search = $request->input('search')['value'];

        $order = $request->input('order');
        $columnIndex = $order[0]['column'];
        $columnName = $request->input('columns')[$columnIndex]['name'];
        $columnSortOrder = $order[0]['dir'];
        $data = [];

        $jobPosts = JobPost::with('company');

        $totalRecords = $jobPosts->count();

        if ($length == -1) {
            $openings = $jobPosts->get();
        } else {
            $openings = $jobPosts->paginate($length, ['*'], 'page', ceil(($start + 1) / $length));
        }

        foreach ($openings as $index => $opening) {
            $currentPage = ($start / $length) + 1;
            $serial = ($currentPage - 1) * $length + $index + 1;
            
            $actions = '<a href="#" role="button" data-id="' . $opening->job_post_id . '" class="btn btn-sm btn-link p-0" data-toggle="modal" data-target="#modalView"><i class="fas fa-eye" title="View"></i></a>';
            $actions .= ' / <a href="#" role="button" data-id="' . $opening->job_post_id . '" class="btn btn-sm btn-link p-0" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit" title="Edit"></i></a>';
            $actions .= ' / <form action="' . route('openings.destroy', $opening->job_post_id) . '" method="post" style="display: inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-link text-danger p-0" onclick="return confirm(\'Are you sure you want to delete this record?\')"><i class="fas fa-trash" title="Delete"></i></button>
                </form>';

            $data[] = [
                'actions' => $actions,
                'serial' => $serial,
                'title' => $opening->title,
                'company_name' => $opening->company->name,
                'vacancy_count' => $opening->vacancy_count,
                'cost_to_company' => $opening->cost_to_company,
                'type' => $opening->type,
                'created_at' => '<span title="' . Carbon::parse($opening->created_at)->format('Y-m-d H:i A') . '">' . Carbon::parse($opening->created_at)->diffForHumans() . '</span>',
                'updated_at' => '<span title="' . Carbon::parse($opening->updated_at)->format('Y-m-d H:i A') . '">' . Carbon::parse($opening->updated_at)->diffForHumans() . '</span>',
            ];
        }
        
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $data,
        ];

        return response()->json($response);
    }

    public function destroy(JobPost $opening)
    {
        try {
            $opening->delete();
            return redirect()->route('openings')->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Error deleting record: ' . $e->getMessage());
            return redirect()->route('openings')->with('error', 'An error occurred while deleting the record');
        }
    }

    public function fetchCompanies()
    {
        $companies = Company::select('company_id', 'name')->get();
        return response()->json($companies);
    }


    public function add() {
        return view('app.openings.add');
    }

    public function storeOpening(Request $request)
    {
        
        $validatedData = $request->validate([
            'job_title'       => 'required|string|max:255',
            'company_id'      => 'required|exists:companies,company_id',
            'no_of_positions' => 'required|integer',
            'job_type'        => 'required|string',
            'cost_to_company' => 'required|numeric',
            'time_period'     => 'required|string',
            'currency'        => 'required|string',
            'reference'       => 'nullable|string',
            'experience'      => 'nullable|string',
            'job_location'    => 'nullable|string',
            'vacancy_count'   => 'required|integer',
            'expiry_date'     => 'required|date',
            'job_status'      => 'required|string',
            'job_description' => 'required|string',
        ]);

        $opening = Opening::create([
            'job_title'       => $validatedData['job_title'],
            'company_id'      => $validatedData['company_id'],
            'no_of_positions' => $validatedData['no_of_positions'],
            'job_type'        => $validatedData['job_type'],
            'cost_to_company' => $validatedData['cost_to_company'],
            'time_period'     => $validatedData['time_period'],
            'currency'        => $validatedData['currency'],
            'reference'       => $validatedData['reference'],
            'experience'      => $validatedData['experience'],
            'job_location'    => $validatedData['job_location'],
            'vacancy_count'   => $validatedData['vacancy_count'],
            'expiry_date'     => $validatedData['expiry_date'],
            'job_status'      => $validatedData['job_status'],
            'job_description' => $validatedData['job_description'],
        ]);

        return response()->json(['message' => 'Opening added successfully!', 'opening' => $opening], 200);
    }
}