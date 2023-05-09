@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\IDGenerator;
@endphp

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <span class="text-muted"><strong>New Application</strong></span>
    </section>
    
    {!! Form::open(['route' => 'serviceConnections.store']) !!}
    <div class="row">

        {{-- HIDDEN FIELDS --}}
        <input type="hidden" name="Status" value="For Inspection">
        <input type="hidden" name="Town" value="01" id="Town">
        <input type="hidden" name="UserId" value="{{ Auth::id() }}">
        <input type="hidden" name="DateOfApplication" value="{{ date('Y-m-d') }}">
        <input type="hidden" name="TimeOfApplication" value="{{ date('H:i:s') }}">
        <input type="hidden" name="Office" value="{{ env("APP_LOCATION") }}">

        <p id="Def_Brgy" style="display: none;">01</p>

        <div class="col-lg-12">
            <div class="card shadow-none">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Customer Name: <strong class="text-danger">*</strong></td>
                            <td>
                                <input type="text" class="form-control form-control-sm uc-text-smooth" required autofocus name="ServiceAccountName" id="ServiceAccountName" value="">
                            </td>
                            <td>District/Barangay:  <strong class="text-danger">*</strong></td>
                            <td>
                                <select name="Barangay" id="Barangay" class="form-control form-control-sm">
                                    {{-- @foreach ($barangays as $item)
                                        <option value="{{ $item->id }}">{{ $item->Barangay }}</option>
                                    @endforeach --}}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Application No: </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" readonly name="id" id="id" value="{{ IDGenerator::generateID() }}">
                            </td>
                            <td>Sitio/Purok:  <strong class="text-danger">*</strong></td>
                            <td>
                                <input type="text" class="form-control form-control-sm uc-text-smooth" name="Sitio" id="Sitio" value="" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="EmailAddress" id="EmailAddress" value="">
                            </td>
                            <td>Contact/Tel. No:  <strong class="text-danger">*</strong></td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="ContactNumber" id="ContactNumber" value="">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card shadow-none">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-borderless">
                        {{-- ROW 1 --}}
                        <tr>
                            <td>Classification of Service: </td>
                            <td>
                                <select name="AccountType" id="AccountType" class="form-control form-control-sm">
                                    @foreach ($accountTypes as $item)
                                        <option value="{{ $item->AccountType }}">{{ $item->AccountType }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>Inspector: <strong class="text-danger">*</strong></td>
                            <td>
                                <select name="Inspector" id="Inspector" class="form-control form-control-sm">
                                    @foreach ($inspectors as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        {{-- ROW 2 --}}
                        <tr>
                            <td>Service Applied For: </td>
                            <td>
                                <select name="AccountApplicationType" id="AccountApplicationType" class="form-control form-control-sm">
                                    @foreach ($serviceAppliedFor as $item)
                                        <option value="{{ $item->ServiceAppliedFor }}">{{ $item->ServiceAppliedFor }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>Inspection Schedule: <strong class="text-danger">*</strong></td>
                            <td style="position: relative;">
                                <input type="text" class="form-control form-control-sm" required name="InspectionSchedule" id="InspectionSchedule">
                            </td>
                        </tr>
                        {{-- ROW 3 --}}
                        <tr>
                            <td>Service Number: </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="ServiceNumber" id="ServiceNumber">
                            </td>
                            <td>Connection Schedule: </td>
                            <td style="position: relative;">
                                <input type="text" class="form-control form-control-sm" name="ConnectionSchedule" id="ConnectionSchedule">
                            </td>
                        </tr>
                        {{-- ROW 4 --}}
                        <tr>
                            <td>Cert. Of Conn. Issued On: </td>
                            <td style="position: relative;">
                                <input type="text" class="form-control form-control-sm" name="CertificateOfConnectionIssuedOn" id="CertificateOfConnectionIssuedOn">
                            </td>
                            <td>Remarks: </td>
                            <td>
                                <textarea type="text" class="form-control form-control-sm" rows="3" name="Notes" id="Notes"></textarea>
                            </td>
                        </tr>
                        {{-- ROW 5 --}}
                        <tr>
                            <td>Load Type: </td>
                            <td>
                                <select name="LoadType" id="LoadType" class="form-control form-control-sm">
                                    <option value="">-- Select --</option>
                                    <option value="DEDICATED">DEDICATED</option>
                                    <option value="COMMON">COMMON</option>
                                </select>
                            </td>
                            <td>Load in kVa (Trans. kVa): </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="LoadInKva" id="LoadInKva">
                            </td>
                        </tr>
                        {{-- ROW 6 --}}
                        <tr>
                            <td>Zone and Block: </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="ZoneAndBlock" id="ZoneAndBlock">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- ROW 7 --}}
                        <tr>
                            <td>Transformer ID: </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="TransformerID" id="TransformerID">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- ROW 8 --}}
                        <tr>
                            <td>Pole Number: </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="PoleNumber" id="PoleNumber">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- ROW 9 --}}
                        <tr>
                            <td>Feeder: </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="Feeder" id="Feeder">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- ROW 10 --}}
                        <tr>
                            <td>Charge To: </td>
                            <td>
                                <input type="number" step="any" class="form-control form-control-sm" name="ChargeTo" id="ChargeTo">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Next', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('page_scripts')
    <script>
        $('#InspectionSchedule').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        })

        $('#ConnectionSchedule').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        })

        $('#CertificateOfConnectionIssuedOn').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        })

        $(document).ready(function() {
            const forceKeyPressUppercase = (e) => {
                let el = e.target;
                let charInput = e.keyCode;
                if((charInput >= 97) && (charInput <= 122)) { // lowercase
                if(!e.ctrlKey && !e.metaKey && !e.altKey) { // no modifier key
                    let newChar = charInput - 32;
                    let start = el.selectionStart;
                    let end = el.selectionEnd;
                    el.value = el.value.substring(0, start) + String.fromCharCode(newChar) + el.value.substring(end);
                    el.setSelectionRange(start+1, start+1);
                    e.preventDefault();
                }
                }
            };

            document.querySelectorAll(".uc-text-smooth").forEach(function(current) {
                current.addEventListener("keypress", forceKeyPressUppercase);
            });
        })
    </script>
@endpush
