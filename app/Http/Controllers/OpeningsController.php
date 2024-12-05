<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPost;
use App\Models\Company;

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
                'created_at' => $opening->created_at,
                'updated_at' => $opening->updated_at,
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
        if ( Gate::allows('admin', Auth::user()) || Gate::allows('delete-raw-material', Auth::user())) {
            try {
                $opening->delete();
                return redirect()->route('openings')->with('success', 'Record deleted successfully');
            } catch (\Exception $e) {
                \Log::error('Error deleting record: ' . $e->getMessage());
                return redirect()->route('openings')->with('error', 'An error occurred while deleting the record');
            }
        } else {
            abort(403);
        }
    }
}
