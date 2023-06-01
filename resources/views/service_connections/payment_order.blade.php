@extends('layouts.app')

@section('content')
<section class="content-header">
   <div class="container-fluid">
       <div class="row mb-2">
           <div class="col-sm-6">
               <h4 style="display: inline; margin-right: 15px;">Create Payment Order</h4>
           </div>

           <div class="col-sm-6">
               <button class="btn btn-primary float-right"><i class="fas fa-dollar-sign ico-tab"></i>Save Payment Order</button>
           </div>
       </div>
   </div>
</section>

<div class="row">

   {{-- FEES --}}
   <div class="col-lg-3">
      <div class="card shadow-none">
         <div class="card-header">
            <span class="card-title">Fees</span>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-sm table-hover">
               <tr>
                  <td>Material Deposit</td>
                  <td>
                     <input type="number" step="any" id="MaterialDeposit" name="MaterialDeposit" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Over-head Expenses</td>
                  <td>
                     <input type="number" step="any" id="OverheadExpenses" name="OverheadExpenses" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Transformer Rental Fees</td>
                  <td>
                     <input type="number" step="any" id="TransformerRentalFees" name="TransformerRentalFees" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Apprehension</td>
                  <td>
                     <input type="number" step="any" id="Apprehension" name="Apprehension" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Customer Deposit</td>
                  <td>
                     <input type="number" step="any" id="CustomerDeposit" name="CustomerDeposit" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>CIAC</td>
                  <td>
                     <input type="number" step="any" id="CIAC" name="CIAC" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
               <tr>
                  <td>Service Fee</td>
                  <td>
                     <input type="number" step="any" id="ServiceFee  " name="ServiceFee  " class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>

   {{-- SALE ITEMS --}}
   <div class="col-lg-6">
      <div class="card shadow-none">
         <div class="card-header">
            <span class="card-title">Sale Items</span>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-hover table-sm">
               <thead>
                  <th></th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Amount</th>
               </thead>
               <tbody>
                  <tr>
                     <td>Meter Box</td>
                     <td>
                        <input type="number" step="any" id="MeterQuantity" name="MeterQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="MeterUnitPrice" name="MeterUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="MeterAmount" name="MeterAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Twisted Wire #6</td>
                     <td>
                        <input type="number" step="any" id="TwistedWire6Quantity" name="TwistedWire6Quantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="TwistedWire6UnitPrice" name="TwistedWire6UnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="TwistedWire6Amount" name="TwistedWire6Amount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Stranded Wire #8</td>
                     <td>
                        <input type="number" step="any" id="StrandedWire8Quantity" name="StrandedWire8Quantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StrandedWire8UnitPrice" name="StrandedWire8UnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StrandedWire8Amount" name="StrandedWire8Amount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Sales of Items</td>
                     <td>
                        <input type="number" step="any" id="SaleOfItemsQuantity" name="SaleOfItemsQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="SaleOfItemsUnitPrice" name="SaleOfItemsUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="SaleOfItemsAmount" name="SaleOfItemsAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Compression Tap</td>
                     <td>
                        <input type="number" step="any" id="CompressionTapQuantity" name="CompressionTapQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="CompressionTapUnitPrice" name="CompressionTapUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="CompressionTapAmount" name="CompressionTapAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Plyboard</td>
                     <td>
                        <input type="number" step="any" id="PlyboardQuantity" name="PlyboardQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="PlyboardUnitPrice" name="PlyboardUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="PlyboardAmount" name="PlyboardAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Stainless Buckle</td>
                     <td>
                        <input type="number" step="any" id="StainlessBuckleQuantity" name="StainlessBuckleQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StainlessBuckleUnitPrice" name="StainlessBuckleUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StainlessBuckleAmount" name="StainlessBuckleAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Electrical Tape</td>
                     <td>
                        <input type="number" step="any" id="ElectricalTapeQuantity" name="ElectricalTapeQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="ElectricalTapeUnitPrice" name="ElectricalTapeUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="ElectricalTapeAmount" name="ElectricalTapeAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>Stainless Strap</td>
                     <td>
                        <input type="number" step="any" id="StainlessStrapQuantity" name="StainlessStrapQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StainlessStrapUnitPrice" name="StainlessStrapUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="StainlessStrapAmount" name="StainlessStrapAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr title="Metal Wood Screw 8mm x 1">
                     <td>Metal Wood Screw</td>
                     <td>
                        <input type="number" step="any" id="MetalWoodScrewQuantity" name="MetalWoodScrewQuantity" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="MetalWoodScrewUnitPrice" name="MetalWoodScrewUnitPrice" class="form-control form-control-sm text-right" autofocus>
                     </td>
                     <td>
                        <input type="number" step="any" id="MetalWoodScrewAmount" name="MetalWoodScrewAmount" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
                  <tr>
                     <td>TotalSales</td>
                     <td></td>
                     <td></td>
                     <td>
                        <input type="number" step="any" id="TotalSales" name="TotalSales" class="form-control form-control-sm text-right" autofocus>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   {{-- SUMMARY --}}
   <div class="col-lg-3">
      <div class="card shadow-none card-success">
         <div class="card-header">
            <span class="card-title">Summary</span>
         </div>
         <div class="card-body table-responsive">
            <table class="table table-hover table-sm">
               <tr>
                  <td>Others</td>
                  <td>
                     <input type="number" step="any" id="Others" name="Others" class="form-control form-control-sm text-right" autofocus>
                  </td>
               </tr>
            </table>

            <div class="divider"></div>

            <table class="table table-hover table-sm">
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
                     <input type="number" step="any" id="OthersTotal" name="OthersTotal" class="form-control form-control-sm text-right" autofocus>
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

   <div class="col-lg-12">
      <button class="btn btn-primary float-right"><i class="fas fa-dollar-sign ico-tab"></i>Save Payment Order</button>
  </div>
</div>
@endsection