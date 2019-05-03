<div class="container">
    <div class="card bg-light mt-3 col-md-10">
        <div class="card-header">
            <label for="">Thêm tập dữ liệu bằng tập tin Excel</label>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.book.postImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" >
                <br>
                <button class="btn btn-success">Import Book Data</button>
            </form>
        </div>
    </div>
</div>

