@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Thiết lập hiển thị các sản phẩm dựa trên danh mục ở trang chủ</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">

                    <div class="card-body">
                      <div class="row">
                        <div class="col-2">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Danh phục phổ biến</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Menu danh mục 1</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Menu danh mục 2</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-slider-three" role="tab">Mendu danh mục 3</a>
                          </div>
                        </div>
                        <div class="col-10">
                          <div class="tab-content" id="nav-tabContent">

                            @include('admin.home-page-setting.sections.popular-category-section')

                            @include('admin.home-page-setting.sections.product-slider-section-one')

                            @include('admin.home-page-setting.sections.product-slider-section-two')

                            @include('admin.home-page-setting.sections.product-slider-section-three')


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

          </div>
        </section>

@endsection
