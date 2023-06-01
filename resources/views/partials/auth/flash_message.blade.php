
@if (session('status-success'))
<div class="alert alert-success alert-block d-flex align-items-center justify-content-between">
    <div class="text-success">
        {{ session('status-success') }}
    </div>
</div>
@elseif (session('status-danger'))
<div class="alert alert-danger alert-block d-flex align-items-center justify-content-between">
    <div class="text-white">
        {{ session('status-danger') }}
    </div>
</div>
@elseif (session('msg-success'))
<div class="alert alert-success alert-block d-flex align-items-center justify-content-between">
    <div class="text-white">
        {{ session('msg-success') }}
    </div>
</div>
@elseif (session('msg-danger'))
<div class="alert alert-danger alert-block d-flex align-items-center justify-content-between">
    <div class="text-white">
        {{ session('msg-danger') }}
    </div>
</div>
@else
{{session()->get('msg-success')}}
@endif