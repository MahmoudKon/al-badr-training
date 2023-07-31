@extends('layouts.dashboard')

@section('content')
<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Invoice
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-12 col-md-auto ms-auto d-print-none">
                <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                  <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                  Print Invoice
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card card-lg">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    @if($result->shop_name == 1)
                        <p class="h3">Company</p><!--Shop name-->
                    @endif

                    @if($result->shop_address == 1)
                        <address>
                        Street Address<br>
                        State, City<br>
                        Region, Postal Code<br>
                        ltd@example.com
                        </address>
                    @endif

                    @if($result->shop_email == 1)
                        <p>
                        ltd@example.com
                        </p>
                    @endif

                  </div>
                  <div class="col-6 text-end">
                    @if($result->client_name == 1)
                        <p class="h3">Client</p>
                    @endif
                    @if($result->client_address)
                    <address>
                      Street Address<br>
                      State, City<br>
                      Region, Postal Code<br>
                      ctr@example.com
                    </address>
                    @endif
                    @if($result->client_email == 1)
                        <p>
                        ctr@example.com
                        </p>
                    @endif
                  </div>
                  @if($result->invoice_date)
                    <div class="col-12 my-5">
                        <h1>Invoice INV/001/15</h1>
                    </div>
                  @endif
                </div>
                <table class="table table-transparent table-responsive">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 1%"></th>
                      <th>Item</th>
                      <th class="text-center" style="width: 1%">Quantity</th>
                      <th class="text-end" style="width: 1%">Price</th>
                      <th class="text-end" style="width: 1%">Total</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-center">1</td>
                    <td>
                      <p class="strong mb-1">Logo Creation</p>
                      <div class="text-muted">Logo and business cards design</div>
                    </td>
                    <td class="text-center">
                      1
                    </td>
                    <td class="text-end">$1.800,00</td>
                    <td class="text-end">$1.800,00</td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td>
                      <p class="strong mb-1">Online Store Design &amp; Development</p>
                      <div class="text-muted">Design/Development for all popular modern browsers</div>
                    </td>
                    <td class="text-center">
                      1
                    </td>
                    <td class="text-end">$20.000,00</td>
                    <td class="text-end">$20.000,00</td>
                  </tr>
                  <tr>
                    <td class="text-center">3</td>
                    <td>
                      <p class="strong mb-1">App Design</p>
                      <div class="text-muted">Promotional mobile application</div>
                    </td>
                    <td class="text-center">
                      1
                    </td>
                    <td class="text-end">$3.200,00</td>
                    <td class="text-end">$3.200,00</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Subtotal</td>
                    <td class="text-end">$25.000,00</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Vat Rate</td>
                    <td class="text-end">20%</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="strong text-end">Vat Due</td>
                    <td class="text-end">$5.000,00</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                    <td class="font-weight-bold text-end">$30.000,00</td>
                  </tr>
                </table>
                <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                  you again!</p>
              </div>
            </div>
          </div>
        </div>

      </div>
@endsection