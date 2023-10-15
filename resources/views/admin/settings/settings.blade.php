<div class="tab-pane" id="settings">

    <button type="button" class="btn btn-outline-dark mr-2" data-toggle="modal" data-target="#modal-category-create">
        Додати нову категорію
    </button>
    <button type="button" class="btn btn-outline-dark mr-2" data-toggle="modal" data-target="#modal-article-create">
        Додати нову статтю
    </button>
    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="">
        Додатково
    </button>

</div>


@include('admin.settings.modals.categoryModal')
@include('admin.settings.modals.articleModal')
