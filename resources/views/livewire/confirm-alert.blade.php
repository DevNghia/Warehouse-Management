<!-- resources/views/livewire/confirm-alert.blade.php -->
<div>
    <button class="btn btn-danger" wire:click="$emit('triggerDelete',{{ $product_type_id }})">
        Delete
    </button>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', product_type_id => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Conatct record will be deleted!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Delete!'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy',product_type_id)
             // success response
                    Swal.fire({title: 'Contact deleted successfully!', icon: 'success'});
                } else {
                    Swal.fire({
                        title: 'Operation Cancelled!',
                        icon: 'success'
                    });
                }
            });
        });
    })
</script>
@endpush