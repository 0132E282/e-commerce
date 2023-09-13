@props(['title' , 'text'])

<div class="modal fade" id="modalMassage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <x-Button type="submit" name="form-delete" method="delete" class="btn btn-primary">oke delete</x-Button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    const myModal = document.getElementById('modalMassage')
    const btnModalMassage = document.getElementById('btnModalMassage')

    myModal.addEventListener('shown.bs.modal', () => {
        const value = btnModalMassage.dataset.value;
        const btnDelete = document.querySelector('form[name="form-delete"]');
        btnDelete.action = value;
    })
</script>