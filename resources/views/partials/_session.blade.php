@if (session('success'))
<div class="alert alert-success alert-dismissible" style="text-align: center;" id="success-alert">
  <h5><i class="icon fas fa-check"></i><strong> {{session('success')}} </strong> </h5>
</div>
@endif

@if (session('sorry'))
<div class="alert alert-danger alert-dismissible" style="text-align: center;" id="danger-alert">
  <h5><i class="icon fas fa-ban"></i><strong> {{session('sorry')}} </strong> </h5>
</div>
@endif


