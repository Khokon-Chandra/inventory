<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
          <div class="card p-4 d-flex flex-row align-items-center justify-content-between">
            <div>
              <p class="text-primary fw-semibold mb-1 font_17">
              Good Morning, William Castillo!
              </p>
              <p class="p-0 m-0 text-gray-600 font_14">
                Here’s what happening with your store today!
              </p>
              <div class="dashboard_today_purchases">
                <h4 class="fw-semibold fs-4 mb-1">
                   $ 1,040.00
                </h4>
                <p class="p-0 m-0 text-gray-600 font_14">
                  Today’s total Purchases
                </p>
              </div>
              <div>
                <h4 class="fw-semibold fs-4 mb-1">
                   $ 436.00
                </h4>
                <p class="p-0 m-0 text-gray-600 font_14">
                  Today’s total Sales
                </p>
              </div>
            </div>
            <img class="pe-lg-3" width="194" height="170" src="https://posly.getstocky.com/images/overview.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <a href="/sale/sales" class="card_dashboard">
                <div class="card card-icon-big mb-4">
                  <p class="text-gray-600">
                    Sales
                  </p>
                  <h4 class="fw-semibold fs-4 mb-1">
                   $ 436.00
                  </h4>
                 
                </div>
              </a>
            </div>
      
            <div class="col-md-6 col-sm-6">
              <a href="/purchase/purchases" class="card_dashboard">
                <div class="card card-icon-big mb-4">
                  <p class="text-gray-600">
                    Purchases
                  </p>
                  <h4 class="fw-semibold fs-4 mb-1">
                  $ 1,040.00
                  </h4>
                 
                </div>
              </a>
            </div>
      
            <div class="col-md-6 col-sm-6">
              <a href="/sales-return/returns_sale" class="card_dashboard">
                <div class="card card-icon-big mb-4">
                  <p class="text-gray-600">
                    Sales Return
                  </p>
                  <h4 class="fw-semibold fs-4 mb-1">
                   $ 0.00
                  </h4>
                
                </div>
              </a>
            </div>
      
            <div class="col-md-6 col-sm-6">
              <a href="/purchase-return/returns_purchase" class="card_dashboard">
                <div class="card card-icon-big mb-4">
                  <p class="text-gray-600">
                    Purchases Return
                  </p>
                  <h4 class="fw-semibold fs-4 mb-1">
                   $ 0.00
                  </h4>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
