<div class="container vh-100 pt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form wire:submit="store">
        <div class="mb-3">
            <label for="createArticleTitle" class="form-label">{{__('ui.Title')}}</label>
            <input type="text" class="form-control" id="createArticleTitle" aria-describedby="emailHelp" wire:model.blur="title">
            @error('title')
                <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>
        
        <select class="form-select" aria-label="Default select example" wire:model.blur="category_id">
            <option value="" selected>{{__('ui.Chooseyourcategory')}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-danger fst-italic">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="createArticlePrice" class="form-label">{{__('ui.Price')}}</label>
            <input type="text" class="form-control" id="createArticlePrice" wire:model.blur="price">
            @error('price')
                <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="createArticleDescription" class="form-label">{{__('ui.Description')}}</label>
            <textarea class="form-control" id="createArticleDescription" rows="3" wire:model.blur="description"></textarea>
            @error('description')
                <p class="text-danger fst-italic">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">{{__('ui.upload')}}</label>
            <input class="form-control" type="file" id="formFileMultiple" multiple wire:model="temporary_images">
        </div>

        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Preview</p>
                    <div class="row">
                        @foreach ($images as $key=>$image)
                            <div class="col d-flex flex-column align-items-center my-2">
                                <div class="imgPreviewCustom mx-auto" style="background-image: url({{$image->temporaryUrl()}})"></div>
                                <button type="button" class="btn btn-danger" wire:click="removeImage({{$key}})">{{__('ui.delete')}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">{{__('ui.Createarticle')}}</button> 
    </form>
    <x-footer/>
</div>
