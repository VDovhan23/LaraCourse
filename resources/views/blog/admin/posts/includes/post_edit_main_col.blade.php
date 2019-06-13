<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if ($item->is_published)
                        Published
                    @else
                        Not Published
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Main Data</a>
                        </li>
                        <li class="nav-item">
                            <a href="#adddata" class="nav-link" data-toggle="tab" role="tab">Additional Data</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value=" {{old('title', $item->title)}}"
                                    id="title"
                                    name="title"
                                    class="form-control"
                                    minlength="3"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="content_raw">Post</label>
                                <textarea type="text"
                                        id="content_raw"
                                        name="content_raw"
                                        class="form-control"
                                        rows="20">
                                        {{old('content_raw', $item->content_raw)}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="adddata" role="tabpanel">
                             <div class="form-group">
                                 <label for="category_id">Category</label>
                                 <select name="category_id"
                                 id="category_id"
                                 class="form-control"
                                 placeholder="Select Category"
                                 required>
                                    @foreach ($categoryList as $categoryOption)
                                        <option value="{{$categoryOption->id}}"
                                                @if ($categoryOption->id == $item->category_id) selected @endif>
                                            {{$categoryOption->id_title}}
                                        </option>
                                    @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" value=" {{old('slug', $item->slug)}}"
                                        id="slug"
                                        name="slug"
                                        class="form-control"
                                       >
                                </div>
                             <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <input type="text" value=" {{old('excerpt', $item->excerpt)}}"
                                        id="excerpt"
                                        name="excerpt"
                                        class="form-control">
                                </div>
                             <div class="form-group">
                                    <input type="hidden"
                                    name="is_published"
                                    value="0">

                                    <input type="checkbox"
                                    name="is_published"
                                    class="form-input-check"
                                    value="1"
                                    @if ($item->is_published)
                                        checked="checked"
                                    @endif>
                                <label for="is_published" class="form-check-label">Published</label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
