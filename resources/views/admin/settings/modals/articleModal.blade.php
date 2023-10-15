<div class="modal fade" id="modal-article-create" data-backdrop="static">
    <div class="modal-dialog">
        <form id="category-form" class="modal-content" action="{{ route('article.store') }}" method="POST">

            <div class="modal-header bg-custom-yellow">
                <h5 class="modal-title">Додати статтю</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Введить назву статті</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name"
                           placeholder="Назва статті" value="{{ old('name') }}" maxlength="25">
                    <span class="invalid-feedback" id="name-error"></span>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Відміна</button>
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category-form').submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#modal-article-create').modal('hide');
                        $('#name').val('');
                        $('#name-error').empty();
                        $('#name').removeClass('is-invalid');

                        toastr.success(response.success);
                    }
                },
                error: function (response) {
                    if (response.responseJSON && response.responseJSON.errors) {
                        var errors = response.responseJSON.errors;
                        for (var key in errors) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '-error').html(errors[key]);
                        }
                    }
                }
            });
        });
    });
</script>



