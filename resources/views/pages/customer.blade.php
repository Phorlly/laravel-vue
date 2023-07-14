@extends('layouts.app')
@section('customer','active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class = "content-header">
      <div class = "container-fluid">
        <div class = "row mb-2">
          <div class = "col-sm-6">
            <h1 class = "m-0 text-uppercase">ពត៌មានអតិថិជន</h1>
          </div><!-- /.col -->
          <div class = "col-sm-6">
            <ol class = "breadcrumb float-sm-right">
              <li class = "breadcrumb-item"><a href = "{{ route('home') }}">ទំព័រដើម</a></li>
              <li class = "breadcrumb-item active">ពត៌មានអតិថិជន</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class = "content">
      <div class = "container-fluid card">
        <!-- Small boxes (Stat box) -->
        <div class = "row card-body">
           <div class = "col-12">
              <!-- /.card-header -->
               <div class = "card-header">
                <div class = "card-title">
                    <button type="button" class="btn btn-sm btn-primary">
                     <i class="fas fa-plus"></i>   បន្ថែមថ្មី
                    </button>
                </div>

                <div class = "card-tools">
                  <div class = "input-group input-group-sm" style = "width: 150px;">
                    <input type = "text" name = "table_search" class = "form-control float-right"
                           placeholder = "Search">

                    <div class = "input-group-append">
                      <button type = "submit" class = "btn btn-outline-primary">
                        <i class = "fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class = "table-responsive">
                <table class = "table table-striped table-hover  w-100">
                  <thead>
                    <tr>
                      <th>សកម្មភាព</th>
                      <th>លេខរៀង</th>
                      <th>ឈ្មោះអតិថិជន</th>
                      <th>ភេទ</th>
                      <th>លេខទូរសព្ទ</th>
                      <th>អាសយដ្ឋាន</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>134</td>
                      <td>Jim Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>494</td>
                      <td>Victoria Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>832</td>
                      <td>Michael Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>982</td>
                      <td>Rocky Doe</td>
                      <td>11-7-2014</td>
                      <td><span class = "tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
           </div>
            <!-- ./col -->
        </div>
          <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

