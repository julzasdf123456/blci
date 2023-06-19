@if($paymentOrder == null)
    <p class="text-center"><i>No payment transactions recorded!</i></p>
    @if (Auth::user()->hasAnyRole(['Administrator', 'Heads and Managers', 'Service Connection Assessor'])) 
        <a href="{{ route('serviceConnections.payment-order', [$serviceConnections->id]) }}" class="btn btn-primary btn-sm" title="Create Payment Order">
            <i class="fas fa-plus ico-tab"></i>
            Create Payment Order</a>
    @endif
@else
<div class="row p-3">
    {{-- MATERIAL ITEMS --}}
    @if ($whHead != null)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <span class="card-title">MIRS</span>

                <div class="card-tools">
                    <a href="{{ route('serviceConnections.update-payment-order', [$serviceConnections->id]) }}" class="btn btn-tool"><i class="fas fa-pen ico-tab"></i>Edit Payment Order</a>
                </div>
            </div>
            <div class="card-body p-3">
                {{-- HEADER --}}
                <table class="table table-borderless table-sm table-hover">
                    <tr>
                        <td>Order No :</td>
                        <td>
                            <input type="text" id="OrderNo" class="form-control form-control-xs text-right" value="{{ $whHead->orderno }}" readonly>
                        </td>
                        <td></td>
                        <td></td>
                        <td>Entry No : </td>
                        <td>
                            <input type="number" id="EntryNo" class="form-control form-control-xs text-right" value="{{ $whHead->ent_no }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Date :</td>
                        <td>
                            <input type="text" id="MIRSDate" class="form-control form-control-xs" value="{{ $whHead->tdate }}" readonly>
                        </td>
                        <td></td>
                        <td>Invoice No : </td>
                        <td>
                            <input type="text" id="InvoiceNo" class="form-control form-control-xs" value="{{ $whHead->invoice }}">
                        </td>
                        <td rowspan="2">
                            <textarea name="MIRSNo" id="MIRSNo" cols="30" rows="2" class="form-control form-control-xs" placeholder="MIRS No:">{{ $whHead->misno }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Requisition By :</td>
                        <td>
                            <input type="text" id="RequisitionById" class="form-control form-control-xs text-right" value="{{ $whHead->emp_id }}" readonly>
                        </td>
                        <td>
                            <input type="text" id="RequisitionByName" class="form-control form-control-xs" value="{{ strtoupper($whHead->chkby) }}" readonly>
                        </td>
                        <td>OR No : </td>
                        <td>
                            <input type="text" id="ORNo" value="{{ $paymentOrder->ORNumber }}" class="form-control form-control-xs">
                        </td>
                    </tr>
                    <tr>
                        <td>Cost Center :</td>
                        <td>
                            <input type="text" id="CostCenter" value="{{ $whHead->ccode }}"  class="form-control form-control-xs">
                        </td>
                        <td>
                            <input type="text" id="CostCenterDescription" class="form-control form-control-xs" readonly>
                        </td>
                        <td>Customer: </td>
                        <td>
                            <input type="text" id="CustomerId" class="form-control form-control-xs" value="{{ $serviceConnections->id }}" readonly>
                        </td>
                        <td>
                            <input type="text" id="CustomerName" class="form-control form-control-xs" value="{{ $serviceConnections->ServiceAccountName }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Charge To :</td>
                        <td>
                            <input type="text" id="ChargeTo" value="{{ $whHead->dept }}" class="form-control form-control-xs">
                        </td>
                        <td></td>
                        <td>Type Of Service: </td>
                        <td>
                            <input type="text" id="TypeOfService" class="form-control form-control-xs" value="NEW INSTALLATION" readonly>
                        </td>
                        <td>
                            <input type="text" id="TypeOfServiceId" class="form-control form-control-xs" value="{{ $whHead->serv_code }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Project Code :</td>
                        <td colspan="2">
                            <input type="text" id="ProjectCode" value="{{ $whHead->pcode }}" class="form-control form-control-xs">
                        </td>
                        <td>Remarks: </td>
                        <td colspan="2" rowspan="2">
                            <textarea name="Remarks" id="Remarks" cols="30" rows="2" class="form-control form-control-xs" placeholder="Remarks/Notes/Comments"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Requested By :</td>
                        <td colspan="2">
                            <input type="text" id="RequestedBy" class="form-control form-control-xs" value="{{ $whHead->chkby }}" readonly>
                        </td> 
                    </tr>
                </table>

                {{-- ITEMS LIST --}}
                <table id="items-list" class="table table-bordered table-sm table-hover">
                    <thead>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>Asset Code</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Unit Price</th>
                        <th>Total Cost</th>
                    </thead>
                    <tbody>
                        @php
                            $cst = 0;
                            $amt = 0;
                        @endphp
                        @foreach ($whItems as $item)
                            <tr>
                                <td>{{ $item->itemcd }}</td>
                                <td>{{ $item->itm_desc }}</td>
                                <td>{{ $item->ascode }}</td>
                                <td class="text-right">{{ $item->qty }}</td>
                                <td class="text-right">{{ $item->uom }}</td>
                                <td class="text-right">{{ is_numeric($item->cst) ? number_format($item->cst, 2) : $item->cst }}</td>
                                <td class="text-right">{{ is_numeric($item->amt) ? number_format($item->amt, 2) : $item->amt }}</td>
                            </tr>
                            @php
                                $cst += (is_numeric($item->cst) ? floatval($item->cst) : 0);
                                $amt += (is_numeric($item->amt) ? floatval($item->amt) : 0);
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="5"><strong>TOTAL</strong></td>
                            <td class="text-right"><strong>{{ number_format($cst, 2) }}</strong></td>
                            <td class="text-right"><strong>{{ number_format($amt, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    
    {{-- FEES --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
               <span class="card-title">Fees</span>
            </div>
            <div class="card-body table-responsive p-0">
               <table class="table table-sm table-borderless table-hover">
                  <tr>
                     <td>Material Deposit</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->MaterialDeposit) ? number_format($paymentOrder->MaterialDeposit, 2) : $paymentOrder->MaterialDeposit }}</strong></td>
                  </tr>
                  <tr>
                     <td>Over-head Expenses</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->OverheadExpenses) ? number_format($paymentOrder->OverheadExpenses, 2) : $paymentOrder->OverheadExpenses }}</strong></td>
                  </tr>
                  <tr>
                     <td>Transformer Rental Fees</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->TransformerRentalFees) ? number_format($paymentOrder->TransformerRentalFees, 2) : $paymentOrder->TransformerRentalFees }}</strong></td>
                  </tr>
                  <tr>
                     <td>Apprehension</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->Apprehension) ? number_format($paymentOrder->Apprehension, 2) : $paymentOrder->Apprehension }}</strong></td>
                  </tr>
                  <tr>
                     <td>Customer Deposit</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->CustomerDeposit) ? number_format($paymentOrder->CustomerDeposit, 2) : $paymentOrder->CustomerDeposit }}</strong></td>
                  </tr>
                  <tr>
                     <td>CIAC</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->CIAC) ? number_format($paymentOrder->CIAC, 2) : $paymentOrder->CIAC }}</strong></td>
                  </tr>
                  <tr>
                     <td>Service Fee</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->ServiceFee) ? number_format($paymentOrder->ServiceFee, 2) : $paymentOrder->ServiceFee }}</strong></td>
                  </tr>
                  <tr>
                     <td>Others</td>
                     <td class="text-right"><strong>P {{ is_numeric($paymentOrder->OthersTotal) ? number_format($paymentOrder->OthersTotal, 2) : $paymentOrder->OthersTotal }}</strong></td>
                  </tr>
               </table>
            </div>
        </div>
    </div>

    {{-- OVERALL TOTAL --}}
    <div class="col-lg-6">
        <div class="card {{ $serviceConnections->ORNumber != null ? 'card-success' : 'card-danger' }}">
            <div class="card-header">
               <span class="card-title">Summary</span>
            </div>
            <div class="card-body table-responsive">
               <table class="table table-hover table-borderless table-sm">
                  <tr>
                     <th>Local F. Tax</th>
                     <th class="text-right">P {{ is_numeric($paymentOrder->LocalFTax) ? number_format($paymentOrder->LocalFTax, 2) : $paymentOrder->LocalFTax }}</th>
                  </tr>
                  <tr>
                     <th>Sub-total w/o VAT</th>
                     <th class="text-right">P {{ is_numeric($paymentOrder->SubTotal) ? number_format($paymentOrder->SubTotal, 2) : $paymentOrder->SubTotal }}</th>
                  </tr>
                  <tr>
                     <th>VAT</th>
                     <th class="text-right">P {{ is_numeric($paymentOrder->VAT) ? number_format($paymentOrder->VAT, 2) : $paymentOrder->VAT }}</th>
                  </tr>
                  <tr>
                     <th><h4>OVERALL TOTAL</h4></th>
                     <th><h2 class="text-right  {{ $serviceConnections->ORNumber != null ? 'text-success' : 'text-danger' }}">P {{ is_numeric($paymentOrder->OverAllTotal) ? number_format($paymentOrder->OverAllTotal, 2) : $paymentOrder->OverAllTotal }}</h2></th>
                  </tr>
               </table>

               @if ($serviceConnections->ORNumber != null)
                    <div class="divider"></div>
                    <table class="table table-hover table-borderless table-sm">
                        <tr>
                            <td>OR Number: </td>
                            <td class="text-right"><strong>{{ $serviceConnections->ORNumber }}</strong></td>
                        </tr>
                        <tr>
                            <td>Payment Date: </td>
                            <td class="text-right"><strong>{{ $serviceConnections->ORDate != null ? date('F d, Y', strtotime($serviceConnections->ORDate)) : '-' }}</strong></td>
                        </tr>
                    </table>
               @endif
            </div>
        </div>
    </div>
</div>
@endif