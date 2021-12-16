<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data Baru
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" >
          <div class="mb-3">
            <label for="mb-3">Custumer</label>
            <select name="costumer_id" id="costumer_id" class="form-control">

            </select>
          </div>
          <div class="mb-3">
            <label for="">Product</label>
            <select name="product_id" id="product_id" class="form-control"></select>
          </div>
          <div>
              <label for="">Qty</label>
              <input type="number" class="form-control" name="qty" id="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ url('/assets/pages/modalorder.js') }}"></script>
