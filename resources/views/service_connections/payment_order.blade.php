@extends('layouts.app')

@section('content')
<section class="content-header">
   <div class="container-fluid">
       <div class="row mb-2">
           <div class="col-sm-6">
               <h4 style="display: inline; margin-right: 15px;">Create Payment Order</h4>
           </div>

           <div class="col-sm-6">
               <button class="btn btn-primary float-right" onclick="savePaymentOrder()"><i class="fas fa-dollar-sign ico-tab"></i>Save Payment Order</button>
               <div id="loader" class="spinner-border text-danger float-right gone" style="margin-right: 10px;" role="status">
                   <span class="sr-only">Loading...</span>
               </div>
           </div>
       </div>
   </div>
</section>

<div class="row">

   <div class="col-lg-9">
      {{-- MATERIAL INQUISITION REQUEST --}}
      <div class="card shadow-none">
         <div class="card-body p-3">
            {{-- HEADER --}}
            <table class="table table-borderless table-sm table-hover">
               <tr>
                  <td>Order No :</td>
                  <td>
                     <input type="text" id="OrderNo" class="form-control form-control-xs text-right" value="{{ date('Y-m-d') }}T{{ date('H:i:s') }}" readonly>
                  </td>
                  <td></td>
                  <td></td>
                  <td>Entry No : </td>
                  <td>
                     <input type="number" id="EntryNo" class="form-control form-control-xs text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Date :</td>
                  <td>
                     <input type="text" id="MIRSDate" class="form-control form-control-xs" value="{{ date('Y-m-d') }}" readonly>
                  </td>
                  <td></td>
                  <td>Invoice No : </td>
                  <td>
                     <input type="text" id="InvoiceNo" class="form-control form-control-xs">
                  </td>
                  <td rowspan="2">
                     <textarea name="MIRSNo" id="MIRSNo" cols="30" rows="2" class="form-control form-control-xs" placeholder="MIRS No:"></textarea>
                  </td>
               </tr>
               <tr>
                  <td>Requisition By :</td>
                  <td>
                     <input type="text" id="RequisitionById" class="form-control form-control-xs text-right" value="{{ Auth::id() }}" readonly>
                  </td>
                  <td>
                     <input type="text" id="RequisitionByName" class="form-control form-control-xs" value="{{ strtoupper(Auth::user()->name) }}" readonly>
                  </td>
                  <td>OR No : </td>
                  <td>
                     <input type="text" id="ORNo" class="form-control form-control-xs">
                  </td>
               </tr>
               <tr>
                  <td>Cost Center :</td>
                  <td>
                     <input type="text" id="CostCenter" class="form-control form-control-xs">
                  </td>
                  <td>
                     <input type="text" id="CostCenterDescription" class="form-control form-control-xs" readonly>
                  </td>
                  <td>Customer: </td>
                  <td>
                     <input type="text" id="CustomerId" class="form-control form-control-xs" value="{{ $serviceConnection->id }}" readonly>
                  </td>
                  <td>
                     <input type="text" id="CustomerName" class="form-control form-control-xs" value="{{ $serviceConnection->ServiceAccountName }}" readonly>
                  </td>
               </tr>
               <tr>
                  <td>Charge To :</td>
                  <td>
                     <input type="text" id="ChargeTo" class="form-control form-control-xs">
                  </td>
                  <td></td>
                  <td>Type Of Service: </td>
                  <td>
                     <input type="text" id="TypeOfService" class="form-control form-control-xs" value="NEW INSTALLATION" readonly>
                  </td>
                  <td>
                     <input type="text" id="TypeOfServiceId" class="form-control form-control-xs" value="7" readonly>
                  </td>
               </tr>
               <tr>
                  <td>Project Code :</td>
                  <td colspan="2">
                     <input type="text" id="ProjectCode" class="form-control form-control-xs">
                  </td>
                  <td>Remarks: </td>
                  <td colspan="2" rowspan="2">
                     <textarea name="Remarks" id="Remarks" cols="30" rows="2" class="form-control form-control-xs" placeholder="Remarks/Notes/Comments"></textarea>
                  </td>
               </tr>
               <tr>
                  <td>Requested By :</td>
                  <td colspan="2">
                     <input type="text" id="RequestedBy" class="form-control form-control-xs" value="{{ strtoupper(Auth::user()->name) }}" readonly>
                  </td> 
               </tr>
            </table>

            <div class="divider"></div>

            {{-- ITEMS SELECTION --}}
            <table class="table table-borderless table-sm table-hover">
               <tr>
                  <td>Item Code : </td>
                  <td>
                     <input type="text" id="ItemCode" class="form-control form-control-xs" value="" readonly>
                  </td>
                  <td>
                     <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-add-items"><i class="fas fa-plus-circle ico-tab-mini"></i>Add Items</button>
                  </td>
                  <td>Quantity : </td>
                  <td>
                     <input type="number" step="any" id="ItemQuantity" class="form-control form-control-xs text-right" value="">
                  </td>
                  <td rowspan="2" class="text-right">
                     <button onclick="addToList()" class="btn btn-lg btn-primary"><i class="fas fa-check-circle ico-tab"></i>Add to List</button>
                  </td>
               </tr>
               <tr>
                  <td>Description : </td>
                  <td colspan="2">
                     <input type="text" id="ItemDescription" class="form-control form-control-xs" value="" readonly>
                  </td>
                  <td>Total Cost : </td>
                  <td>
                     <input type="number" id="ItemTotalCost" class="form-control form-control-xs text-right" value="" readonly>
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

               </tbody>
            </table>
         </div>
      </div>
   </div>

   <div class="col-lg-3">
      {{-- FEES --}}
     <div class="card shadow-none">
        <div class="card-header">
           <span class="card-title">Fees</span>
        </div>
        <div class="card-body table-responsive p-0">
           <table class="table table-sm table-borderless table-hover">
              <tr>
                 <td>Material Deposit</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="MaterialDeposit" name="MaterialDeposit" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>Over-head Expenses</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="OverheadExpenses" name="OverheadExpenses" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>Transformer Rental Fees</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="TransformerRentalFees" name="TransformerRentalFees" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>Apprehension</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="Apprehension" name="Apprehension" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>Customer Deposit</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="CustomerDeposit" name="CustomerDeposit" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>CIAC</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="CIAC" name="CIAC" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
                 <td>Service Fee</td>
                 <td>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="ServiceFee" name="ServiceFee" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
           </table>
        </div>
     </div>

     {{-- SUMMARY --}}
     <div class="card shadow-none card-success">
        <div class="card-header">
           <span class="card-title">Summary</span>
        </div>
        <div class="card-body table-responsive">
           <table class="table table-hover table-borderless table-sm">
              <tr>
                 <td>Others</td>
                 <td>
                    <input type="number" step="any" id="Others" name="Others" class="form-control form-control-sm text-right" autofocus>
                 </td>
              </tr>
              <tr>
               <td>Materials Total</td>
               <td>
                  <input type="number" step="any" onchange="validateTotalInputs()" onkeyup="validateTotalInputs()" id="MaterialsTotal" name="MaterialsTotal" class="form-control form-control-sm text-right" autofocus>
               </td>
            </tr>
           </table>

           <div class="divider"></div>

           <table class="table table-hover table-borderless table-sm">
              <tr>
                 <th>Local F. Tax</th>
                 <th>
                    <input type="number" step="any" id="LocalFTax" name="LocalFTax" class="form-control form-control-sm text-right" autofocus>
                 </th>
              </tr>
              <tr>
                 <th>Sub-total w/o VAT</th>
                 <th>
                    <input type="number" step="any" id="SubTotal" name="SubTotal" class="form-control form-control-sm text-right" autofocus>
                 </th>
              </tr>
              <tr>
                 <th>VAT</th>
                 <th>
                    <input type="number" step="any" id="VAT" name="VAT" class="form-control form-control-sm text-right" autofocus>
                 </th>
              </tr>
              <tr>
                 <th>Others</th>
                 <th>
                    <input type="number" step="any" onkeyup="validateTotalInputs()" id="OthersTotal" name="OthersTotal" class="form-control form-control-sm text-right" autofocus>
                 </th>
              </tr>
              <tr>
                 <th><h4>TOTAL</h4></th>
                 <th>
                    <input type="number" step="any" style="font-size: 1.3em;" id="OverAllTotal" name="OverAllTotal" class="form-control form-control-sm text-right" autofocus>
                 </th>
              </tr>
           </table>
        </div>
     </div>
  </div>

   <div class="col-lg-12" style="margin-bottom: 15px;">
      <button class="btn btn-primary float-right" onclick="savePaymentOrder()"><i class="fas fa-dollar-sign ico-tab"></i>Save Payment Order</button>
      <div id="loader" class="spinner-border text-danger float-right gone" style="margin-right: 10px;" role="status">
         <span class="sr-only">Loading...</span>
     </div>
  </div>
</div>

{{-- MODAL FOR ADDING ITEMS --}}
@include('service_connections.modal_payment_order_items')
@endsection

@push('page_scripts')
    <script>
      /**
       * GLOBAL VARIABLES
       * ===================================
       **/
      var selectedItemCost = 0 // initialized in modal_payment_order_items
      var selectedUOM = '' // initialized in modal_payment_order_items

      $(document).ready(function() {

         $('#modal-add-items').on('hidden.bs.modal', function() {
            $('#ItemQuantity').focus()
         });

         $('#ItemQuantity').keyup(function() {
            var qty = 0
            if(jQuery.isEmptyObject(this.value)) {
               qty = 0
            } else {
               qty = parseFloat(this.value)
            }

            var total = getTotalItemCost(qty, selectedItemCost)

            $('#ItemTotalCost').val(Math.round((total + Number.EPSILON) * 100) / 100)
         })

         /** 
          * FEES AREA
          * =================================
          */
      })

      /**
       *  MATERIAL ITEMS
       * ======================================
       */
      function getTotalItemCost(qty, cost) {
         var total = qty * cost

         return total
      }

      function addToList() {
         if (jQuery.isEmptyObject($('#ItemQuantity').val()) | jQuery.isEmptyObject($('#ItemCode').val()) | jQuery.isEmptyObject($('#ItemDescription').val())) {
            Toast.fire({
               icon : 'warning',
               text : 'please select item first!'
            })
         } else {
            $('#items-list tbody').append(addRowItem($('#ItemCode').val(), $('#ItemDescription').val(), $('#ItemQuantity').val(), selectedUOM, selectedItemCost, $('#ItemTotalCost').val()))
            $('#MaterialsTotal').val(getItemTotal())
            $('#MaterialsTotal').change()
            clearSelection()
         }         
      }

      function addRowItem(itmcode, desc, qty, uom, uprice, tcost) {
         const d = new Date()
         var id = d.getTime()
         return "<tr id='" + id + "'>" +
                  "<td>" + itmcode + "</td>" +
                  "<td>" + desc + "</td>" +
                  "<td></td>" +                  
                  "<td class='text-right'>" + qty + "</td>" +
                  "<td>" + uom + "</td>" +
                  "<td class='text-right'>" + Math.round((parseFloat(uprice) + Number.EPSILON) * 100) / 100 + "</td>" +
                  "<td class='text-right text-primary'>" +
                     "<strong>" + tcost + "</strong>" + 
                     "<button onclick='removeItem(`" + id + "`)' class='btn btn-xs btn-link text-danger' style='margin-left: 10px;'><i class='fas fa-trash'></i></button>" +
                  "</td>" +
               "<tr>"
      }

      function getItemTotal() {
         var total = 0
         $('#items-list tr').each(function() {
            var obj = $('td', this).eq(6).text() // get 6th index which is the total cost
            if (!jQuery.isEmptyObject(obj)) {
               try {
                  total += parseFloat(obj)
               } catch (err) {
                  total += 0
               }
            } else {
               total += 0
            }            
         })

         return total
      }

      function clearSelection() {
         selectedItemCost = 0
         selectedUOM = ''
         $('#ItemCode').val('')
         $('#ItemDescription').val('')
         $('#ItemQuantity').val('')
         $('#ItemTotalCost').val('')
      }

      function getMaterialItemsForPosting() {
         var data = []

         $('#items-list tbody tr').each(function(index, element) {    
            if (!jQuery.isEmptyObject($('td', this).eq(0).text())) {
               data.push({
                  ReqNo : $('#OrderNo').val(),
                  EntryNo : $('#EntryNo').val(),
                  ItemCode : $('td', this).eq(0).text(),
                  ItemQuantity : $('td', this).eq(3).text(),
                  ItemUOM : $('td', this).eq(4).text(),
                  ItemUnitPrice : $('td', this).eq(5).text(),
                  ItemTotalCost : $('td', this).eq(6).text(),
                  ItemNo : (index + 1),
               })
            }            
         })

         return data
      }

      /**
       * FEES AND SUMMARY
       * ======================================
       */
      function getLocalFTax(amount) {
         if (jQuery.isEmptyObject(amount)) {
            return 0
         } else {
            amount = parseFloat(amount)
            return amount * .0075
         }
      }

      function getInputAmount(amount) {
         if (jQuery.isEmptyObject(amount)) {
            return 0
         } else {
            amount = parseFloat(amount)
            return amount
         }
      }

      function getTotalFTax() {
         var overheadExpenses = getLocalFTax($('#OverheadExpenses').val())
         var transformerRentalFees = getLocalFTax($('#TransformerRentalFees').val())
         var apprehension = getLocalFTax($('#Apprehension').val())
         var serviceFee = getLocalFTax($('#ServiceFee').val())
         var materialsTotal = getLocalFTax($('#MaterialsTotal').val())

         var total = overheadExpenses + transformerRentalFees + apprehension + serviceFee + materialsTotal       

         return Math.round((parseFloat(total) + Number.EPSILON) * 100) / 100
      }

      function getSubTotal() {
         var materialDeposit = getInputAmount($('#MaterialDeposit').val())
         var overheadExpenses = getInputAmount($('#OverheadExpenses').val())
         var transformerRentalFees = getInputAmount($('#TransformerRentalFees').val())
         var apprehension = getInputAmount($('#Apprehension').val())
         var customerDeposit = getInputAmount($('#CustomerDeposit').val())
         var ciac = getInputAmount($('#CIAC').val())
         var serviceFee = getInputAmount($('#ServiceFee').val())
         var others = getInputAmount($('#OthersTotal').val())
         var materialsTotal = getInputAmount($('#MaterialsTotal').val())

         var total = materialDeposit + overheadExpenses + transformerRentalFees + apprehension + customerDeposit + ciac + serviceFee + others + materialsTotal  

         return Math.round((parseFloat(total) + Number.EPSILON) * 100) / 100
      }

      function getTotalVat() {
         var overheadExpenses = (getInputAmount($('#OverheadExpenses').val()) + getLocalFTax($('#OverheadExpenses').val())) * .12
         var transformerRentalFees = (getInputAmount($('#TransformerRentalFees').val()) + getLocalFTax($('#TransformerRentalFees').val())) * .12
         var apprehension = (getInputAmount($('#Apprehension').val()) + getLocalFTax($('#Apprehension').val())) * .12
         var serviceFee = (getInputAmount($('#ServiceFee').val()) + getLocalFTax($('#ServiceFee').val())) * .12
         var materialsTotal = (getInputAmount($('#MaterialsTotal').val()) + getLocalFTax($('#MaterialsTotal').val())) * .12

         var total = overheadExpenses + transformerRentalFees + apprehension + serviceFee + materialsTotal     

         return Math.round((parseFloat(total) + Number.EPSILON) * 100) / 100
      }

      function getOverAllTotal() {
         var fTax = getInputAmount($('#LocalFTax').val())
         var subTotal = getInputAmount($('#SubTotal').val())
         var vat = getInputAmount($('#VAT').val())

         return fTax + subTotal + vat
      }

      function validateTotalInputs() {
         $('#LocalFTax').val(getTotalFTax())
         $('#VAT').val(getTotalVat())
         $('#SubTotal').val(getSubTotal())
         $('#OverAllTotal').val(getOverAllTotal())
      }
      /**
       * SAVE ORDER
       * ========================
       */
      function savePaymentOrder() {
         $('#loader').removeClass('gone')
         $.ajax({
            url : "{{ route('serviceConnections.save-payment-order') }}",
            type : 'POST',
            data : {
               _token : "{{ csrf_token() }}",
               MaterialItems : JSON.stringify(getMaterialItemsForPosting()),
               ServiceConnectionId : "{{ $serviceConnection->id }}",
               MaterialDeposit : getInputAmount($('#MaterialDeposit').val()),
               TransformerRentalFees : getInputAmount($('#TransformerRentalFees').val()),
               Apprehension : getInputAmount($('#Apprehension').val()),
               OverheadExpenses : getInputAmount($('#OverheadExpenses').val()),
               CIAC : getInputAmount($('#CIAC').val()),
               ServiceFee : getInputAmount($('#ServiceFee').val()),
               CustomerDeposit : getInputAmount($('#CustomerDeposit').val()),
               Others : getInputAmount($('#Others').val()),
               LocalFTax : getInputAmount($('#LocalFTax').val()),
               SubTotal : getInputAmount($('#SubTotal').val()),
               VAT : getInputAmount($('#VAT').val()),
               OthersTotal : getInputAmount($('#OthersTotal').val()),
               OverAllTotal : getInputAmount($('#OverAllTotal').val()),
               ORNumber : getInputAmount($('#ORNo').val()),
               MaterialTotal : getInputAmount($('#MaterialsTotal').val()),
               ReqNo : $('#OrderNo').val(),
               MIRSNo : $('#MIRSNo').val(),
               CostCenter : $('#CostCenter').val(),
               ChargeTo : $('#ChargeTo').val(),
               ProjectCode : $('#ProjectCode').val(),
               RequestedBy : $('#RequestedBy').val(),
               InvoiceNo : $('#InvoiceNo').val(),
               CustomerName : $('#CustomerName').val(),
               TypeOfServiceId : $('#TypeOfServiceId').val(),
               EntryNo : $('#EntryNo').val(),
            },
            success : function(res) {
               Toast.fire({
                  icon : 'success',
                  text : 'payment saved!'
               })
               $('#loader').removeClass('gone')
               window.location.href = "{{ url('/serviceConnections') }}/{{ $serviceConnection->id }}"
            },
            error : function(err) {
               Toast.fire({
                  icon : 'error',
                  text : 'error saving payment order'
               })
               console.log(err)
               $('#loader').removeClass('gone')
            }
         })
      }

      function removeItem(id) {
         Swal.fire({
            title: 'Do you want to delete this item?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
         }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
               $('#' + id).remove()
               $('#MaterialsTotal').val(getItemTotal())
               $('#MaterialsTotal').change()
               validateTotalInputs()
               clearSelection()
               Toast.fire({
                  icon : 'success',
                  text : 'item removed!'
               })
            }
         })
         
      }
    </script>
@endpush