@extends("layouts.types")

@section("title", "add a new category")

@section("content")
<form action="{{ route('types.store')}}" method="POST" class="pt-4">
    <div class="row d-flex justify-content-start">
    <!-- Name -->
    <div class="col col-sm-12 col-lg-6 col-xl-4 d-flex flex-column">
        <label for="name" class="py-2">Name</label>
        <input type="text" id="name" name="name">
    </div>
    <!-- Description -->
        <div class="col col-sm-12 col-md-12 col-lg-12 d-flex flex-column">
            <label for="description" class="py-2">Description</label>
            <textarea id="description" name="description" rows="10" ></textarea>
        </div>    
    </div>
    <!-- submit btn -->
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>   
</form>

@endsection