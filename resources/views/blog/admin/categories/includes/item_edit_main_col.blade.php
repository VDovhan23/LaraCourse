<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Main Data</a>
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
                            <label for="slug">Slug</label>
                            <input type="text" value=" {{old('slug', $item->slug)}}"
                                id="slug"
                                name="slug"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select type="text" value="{{$item->parent_id}}"
                                id="parent_id"
                                name="parent_id"
                                class="form-control"
                                placeholder="Select Category"
                                required>
                                @foreach ($categoryList as $categoryOption)
                            <option value="{{$categoryOption->id}}"
                                    @if ($categoryOption->id == $item->parent_id) selected @endif>
                                {{$categoryOption->id_title}}
                            </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text"
                                    id="description"
                                    name="description"
                                    class="form-control"
                                    rows="3">
                                    {{old('description', $item->description)}}
                                </textarea>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
