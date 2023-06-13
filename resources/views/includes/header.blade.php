<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ substr(Route::currentRouteName(),12)}}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ substr(Route::currentRouteName(),12)}}</li>
        </ol>
      </div>
    </div>
  </div>
 </section>
