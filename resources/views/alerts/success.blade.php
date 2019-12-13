@if (session($key ?? 'status.success'))
    <div class="alert alert-success" role="alert">
        {{ session($key ?? 'status.success') }}
    </div>
@endif

@if (session($key ?? 'status.error'))
    <div class="alert alert-error" role="alert">
        {{ session($key ?? 'status.error') }}
    </div>
@endif

@if (session($key ?? 'status.info'))
    <div class="alert alert-info" role="alert">
        {{ session($key ?? 'status.info') }}
    </div>
@endif
