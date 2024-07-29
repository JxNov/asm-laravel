<div class="toast-container position-fixed top-0 end-0 p-3" id="toastPlacement">
    <div id="liveToast" class="toast show bg-white" role="alert" aria-live="assertive"
         aria-atomic="true">
        <div class="toast-header">
            <img src="{{ Vite::asset('resources/images/favicon.ico') }}" class="rounded me-2" alt="...">
            <strong class="me-auto">Notification</strong>
            <small>{{ now()->diffForHumans() }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

        <div class="toast-body">
            <span class="text-danger">{{ $message }}</span>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const toast = document.getElementById('toastPlacement');

        if (toast) {
            setTimeout(() => {
                toast.remove();
            }, 5000);
        }
    </script>
@endpush
