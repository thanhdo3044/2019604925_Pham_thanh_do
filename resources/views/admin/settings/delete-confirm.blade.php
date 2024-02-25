<div class="container">
    <div class="card">
        <div class="card-header">
            Confirm Deletion
        
            Confirm Deletion
        </div

            Confirm Deletion
       
</div>
        <div class="card-body">
            <p>Are you sure you want to delete this setting?</p>
            <p><strong>{{ $setting->key }}</strong>: {{ $setting->value }}</p>
            <form method="POST" action="{{ route('settings.destroy', $setting->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm Delete</button>
                <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>