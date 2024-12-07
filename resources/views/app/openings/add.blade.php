@extends('adminlte::page')

@section('title', 'Add New Opening')

@section('content_header')
<h1 class="d-inline-block">Add New Opening</h1>
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item active">Add New Opening</li>
</ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Fill Up Form</h3>
      </div>
      <div class="card-body">
        <form id="openingForm" action="{{ route('openings.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="textTitle">Job Title <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="textTitle" name="title" placeholder="Enter Job Title">
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Company</label>
                  <select class="form-control select2" id="companySelect" name="company_id" style="width: 100%;">
                    <option value="">Select Company</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jobPosition">No of Positions</label>
                  <input type="number" class="form-control" id="jobPosition" name="no_of_positions" placeholder="Enter No of Positions">
                </div>
                <div class="form-group col-md-4">
                  <label for="jobType">Type <sup class="text-danger">*</sup></label>
                  <select class="form-control select2" id="jobType" name="job_type" style="width: 100%;">
                    <option selected="selected">Work From Office</option>
                    <option>Hybrid</option>
                    <option>Remote</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="costToCompany">Cost to Company</label>
                  <input type="number" class="form-control" id="costToCompany" name="cost_to_company" placeholder="e.g 12-15Lakhs">
                </div>
                <div class="form-group col-md-4">
                  <label for="timePeriod">Payment Term</label>
                  <select class="form-control" id="timePeriod" name="time_period">
                  <option value="Yearly">Yearly</option>
                  <option value="Monthly" selected>Monthly</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Daily">Daily</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="currency">Currency</label>
                  <select class="form-control select2" id="currency" name="currency" style="width: 100%;">
                    <option selected="selected">INR</option>
                    <option>USD</option>
                    <option>EUR</option>
                    <option>GBP</option>
                    <option>AUD</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="reference">Reference</label>
                  <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter Reference Name or Details">
                </div>
                <div class="form-group col-md-4">
                  <label for="experience">Experience</label>
                  <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter Required Experience (e.g., 2-3 years)">
                </div>
                <div class="form-group col-md-4">
                  <label for="jobLocation">Location <sup class="text-danger">*</sup></label>
                  <input type="text" class="form-control" id="jobLocation" name="location" placeholder="Enter Job Location">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="jobType">Job Type</label>
                  <select name="job_type" id="jobType" class="form-control">
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Full-time, Contractual">Full-time, Contractual</option>
                    <option value="Full-time, Permanent" selected>Full-time, Permanent</option>
                    <option value="Part-time, Contractual">Part-time, Contractual</option>
                    <option value="Part-time, Permanent">Part-time, Permanent</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="expiryDate">Expiry Date</label>
                  <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                </div>
                <div class="form-group col-md-4">
                  <label for="jobStatus">Status</label>
                  <select class="form-control select2" id="jobStatus" name="status" style="width: 100%;">
                    <option selected="selected">Open</option>
                    <option>Closed</option>
                    <option>Expired</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-body">
                <div class="form-group">
                  <label for="jobDescription">Job Description</label>
                  <textarea id="jobDescription" name="job_description" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer text-right">
        <button class="btn btn-warning mr-2" id="saveDraftButton">Save as Draft</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
$(document).ready(function() {
  $('#companySelect').select2({
      placeholder: "Select a company",
      allowClear: true,
      ajax: {
          url: "{{ route('companies.fetch') }}",
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
              return {
                  results: data.map(company => ({
                      id: company.company_id,
                      text: company.name
                  }))
              };
          },
          cache: true
      },
      minimumInputLength: 3
  });

  $('#jobDescription').summernote({
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
    ]
  });



  $.get('{{ route('companies.fetch') }}', function(data) {
    let companySelect = $('#companySelect').empty().append('<option value="">Select Company</option>');
    if (data.length) {
      data.forEach(company => companySelect.append(
        `<option value="${company.company_id}">${company.name}</option>`
      ));
    } else {
      companySelect.append('<option value="">No companies available</option>');
    }
  });

  $('#submitButton, #saveDraftButton').click(function(e) {
    e.preventDefault();
    
    // Update Summernote content before form submission
    $('#jobDescription').val($('#jobDescription').summernote('code'));
    
    // Gather form data
    var formData = new FormData($('#openingForm')[0]);

    $.ajax({
      url: '{{ route('openings.store') }}',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        window.location.href = '{{ route('openings') }}';
      },
      error: function(xhr, status, error) {
        if (xhr.responseJSON && xhr.responseJSON.errors) {
          var errorMessages = Object.values(xhr.responseJSON.errors).flat();
          alert(errorMessages.join('\n'));
        } else {
          alert("Something went wrong. Please try again.");
        }
        console.error(xhr.responseText);
      }
    });
  });
});
</script>
@stop