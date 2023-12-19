<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <h5 class=""><span class="badge badge-center bg-primary">I</span> Penghasilan</h5>
        <small class="text-muted float-end">I Penghasilan</small>
    </div>
    <div class="card-body">
        <form action="{{ route('update_gaji_employe', $gaji->id) }}" method="post">
        </form>
    </div>
</div>
