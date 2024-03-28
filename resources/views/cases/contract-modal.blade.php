<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('generate.contract') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="case" value="{{ $case->id }}">
                    <div class="form-group">
                        <label for="content">Предмет договору</label>
                        <textarea class="form-control" name="content" id="content" cols="20" rows="10" minlength="40"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-success">Створити</button>
                </div>
            </form>
        </div>
    </div>
</div>
