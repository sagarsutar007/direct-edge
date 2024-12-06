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
      <!-- /.card-header -->
      <!-- form start -->
      <div class="card-body">
        <form id="openingForm">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="textTitle">Job Title</label>
                <input type="text" class="form-control" id="textTitle" placeholder="Enter Job Title">
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Company</label>
                  <select class="form-control select2" id="companySelect" style="width: 100%;">
                    <option value="">Select Company</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jobPosition">No of Positions</label>
                  <input type="number" class="form-control" id="jobPosition" placeholder="Enter No of Positions">
                </div>
                <div class="form-group col-md-4">
                  <label for="jobPosition">Type</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Work From Office</option>
                    <option>Hybrid</option>
                    <option>Remote</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="costToCompany">Cost to Company</label>
                  <input type="number" class="form-control" id="costToCompany" placeholder="Enter CTC (e.g., 500000)">
                </div>
                <div class="form-group col-md-4">
                  <label for="timePeriod">Time Period</label>
                  <input type="text" class="form-control" id="timePeriod" placeholder="Enter Time Period (e.g., 1 year)">
                </div>
                <div class="form-group col-md-4">
                  <label for="currency">Currency</label>
                  <select class="form-control select2" id="currency" style="width: 100%;">
                    <option selected="selected">USD</option>
                    <option>INR</option>
                    <option>EUR</option>
                    <option>GBP</option>
                    <option>AUD</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="reference">Reference</label>
                  <input type="text" class="form-control" id="reference" placeholder="Enter Reference Name or Details">
                </div>

                <div class="form-group col-md-4">
                  <label for="experience">Experience</label>
                  <input type="text" class="form-control" id="experience"
                    placeholder="Enter Required Experience (e.g., 2-3 years)">
                </div>
                <div class="form-group col-md-4">
                  <label for="jobLocation">Location</label>
                  <input type="text" class="form-control" id="jobLocation" placeholder="Enter Job Location">
                </div>
              </div>
              <div class="row">

                <div class="form-group col-md-4">
                  <label for="vacancyCount">Vacancy Count</label>
                  <input type="number" class="form-control" id="vacancyCount" placeholder="Enter Vacancy Count">
                </div>

                <div class="form-group col-md-4">
                  <label for="expiryDate">Expiry Date</label>
                  <input type="date" class="form-control" id="expiryDate">
                </div>

                <div class="form-group col-md-4">
                  <label for="jobStatus">Status</label>
                  <select class="form-control select2" id="jobStatus" style="width: 100%;">
                    <option selected="selected">Active</option>
                    <option>Inactive</option>
                    <option>Closed</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-body">
                <div class="form-group">
                  <label for="jobDescription">Job Description</label>
                  <textarea id="jobDescription" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->

      <div class="card-footer text-right">
        <button type="submit" class="btn btn-warning mr-2" id="saveDraftButton">Save as Draft</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
      </div>

    </div>
  </div>
</div>

@stop

@section('js')
<script>
$(document).ready(function() {
  $('#jobDescription').summernote({
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['view', ['fullscreen', 'codeview', 'help']]
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

  $('#openingForm').submit(function(e) {
      e.preventDefault();
      console.log("Form submitted");
      alert("Submit button clicked!");

      var formData = $(this).serialize();
      console.log(formData);

      $.ajax({
          url: '{{ route('openings.store') }}',
          type: 'POST',
          data: formData,
          success: function(response) {

              console.log(response);
              alert(response.message);

              $('#openingForm')[0].reset();
              $('#companySelect').val('').trigger('change');
          },
          error: function(xhr, status, error) {

            alert("Something went wrong. Please try again.");
              console.log(error);
          }
      });
  });


});
</script>

@stop