<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPost;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Str;


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
                'company_name' => $opening->company?$opening->company->name:'',
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

    public function add() {
        return view('app.openings.add');
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company_id' => 'nullable|exists:companies,company_id',
            'no_of_positions' => 'nullable|integer',
            'type' => 'required|string',
            'job_type' => 'required|string',
            'cost_to_company' => 'nullable|numeric',
            'time_period' => 'nullable|string',
            'currency' => 'nullable|string',
            'reference' => 'nullable|string',
            'experience' => 'nullable|string',
            'location' => 'required|string',
            'vacancy_count' => 'nullable|integer',
            'expiry_date' => 'nullable|date',
            'status' => 'required|string',
            'description' => 'required|string'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        
        $jobPost = JobPost::create($validatedData);
    
        return redirect()->route('openings')->with('success', 'Job opening created successfully');
    }
}