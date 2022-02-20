@extends('layout.layout')
@section('content')

<div class="container">
    <div class="card mx-auto">
        <div class="card-body">
            <form id="consultationForm" name="consultationForm" enctype="multipart/form-data" >
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="clinicName">Clinic Name</label>
                        <input type="text" class="form-control form-control-sm" name="clinicName" id="clinicName"  placeholder="Enter Clinic Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="clinicName">Clinic Logo</label>
                        <input type="file" class="filestyle" name="logo" id="logo" data-buttonname="btn-secondary btn btn-md" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="physicianName">Physician Name</label>
                        <input type="text" class="form-control form-control-sm" name="physicianName" id="physicianName"  placeholder="Enter Physician Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="physicianContact">Physician Contact</label>
                        <input type="text" class="form-control form-control-sm" name="physicianContact" id="physicianContact"  placeholder="Enter Physician Contact" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="patientFirstName">Patient First Name</label>
                        <input type="text" class="form-control form-control-sm" name="patientFirstName" id="patientFirstName"  placeholder="Enter Patient First Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="patientLastName">Patient Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="patientLastName" id="patientLastName"  placeholder="Enter Patient Last Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="patientDob">Patient DOB</label>
                        <input type="date" class="form-control form-control-sm" name="patientDob" id="patientDob"  placeholder="Enter Patient DOB" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="patientContact">Patient Contact</label>
                        <input type="text" class="form-control form-control-sm" name="patientContact" id="patientContact"  placeholder="Enter Patient Contact" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="chiefComplaint">Chief Complaint</label>
                        <textarea class="form-control" name="chiefComplaint" id="chiefComplaint" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="consultationNote">Consultation Note</label>
                        <textarea class="form-control" name="consultationNote" id="consultationNote" rows="3"></textarea>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col text-center">
                        <button class="btn btn-primary btn-md " type="submit" id="saveBtn">Generate Report</button>
                    </div>
                </div><br>
                
            </form>

                <div class="row">
                    <div class="form-group text-right">
                        <button class="btn btn-link btn-sm" data-toggle="modal" id="view_consultation" data-target="#viewModal">View Previous Consultations </button>
                    </div>
                </div>
        </div>
        
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header  bg-primary text-white">
            <h5 class="modal-title " id="viewModalLabel">Previous Consultations</h5>
            <!-- <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <table id="viewTable" class="table table-bordered" style="width: 100%;font-size:15px">
                <thead>
                    <tr>
                        <th>
                            <p class="tx-12 mb-0">Patient Name</p>
                        </th>
                        <th>
                            <p class="tx-12 mb-0">Contact Number</p>
                        </th>
                        <th>
                            <p class="tx-12 mb-0">Date Of Birth</p>
                        </th>
                        
                    </tr>
                </thead>
                <tbody id="detail_view" style="font-size:12px">
                </tbody>
            </table> 
        </div>
        <div class="modal-footer">
            <span data-href="/exportCsv" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
<!-- End Modal -->

<!-- Modal -->
    <div class="modal fade" id="generateModel" tabindex="-1" role="dialog" aria-labelledby="generateModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header  bg-primary text-white">
            <h5 class="modal-title " id="generateModelLabel">Download Consultation </h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="consultationID" id="consultationID">
                <div class="col-md-6 text-center">
                <button type="button" class="btn btn-success" id="tiff_file"><i class="fa fa-download" aria-hidden="true"></i> .Tiff</button>
                </div>
                <div class="col-md-6 text-center">
                <button type="button" class="btn btn-danger" id="pdf_file"><i class="fa fa-download" aria-hidden="true"></i> .Pdf</button>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        </div>
    </div>
    </div>
<!-- End Modal -->

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#saveBtn").on('click', function(e){
            e.preventDefault();
            formData = new FormData(consultationForm);
          
            $.ajax({
                data:formData,
                url: "{{ URL('index') }}",
                type: "POST",
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    console.log(response); 
                    $('#consultationID').val(response.consultationID);
                    $('#generateModel').modal('show');
                },
                error: function (errors) {

                }
            });
        });
        $("#tiff_file").on('click', function(e){
            // var consultationID = $('#consultationID').val();
            location.reload();
        });
        $("#pdf_file").on('click', function(e){
            // var consultationID = $('#consultationID').val();
            location.reload();
            // $.ajax({
            //     url: "{{ URL('pdf_file') }}"+'/'+consultationID,
            //     type: "GET",
            //     contentType: false,
            //     cache: false,
            //     processData: false,
            //     success: function (response) {
            //         // console.log(response); 
            //         // $('#consultationID').val(response.consultationID);
            //         // $('#generateModel').modal('show');
            //     },
            //     error: function (errors) {

            //     }
            // });
        });
        $("#view_consultation").on('click',function(e){

            $.get("{{ URL('viewPrevious') }}", function (data) { 
                $.each(data.datas, function(index, value){
                    $('#detail_view').append('<tr><td>'+value.first_name+' '+value.last_name+'</td> <td>'+value.contact+'</td> <td>'+value.dob+'</td> </tr>');
                });
            });
        });
    });
    function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
    }
</script>